import React, { useState, useEffect } from 'react';
import _ from 'lodash';
import { connect } from 'react-redux';
import { Link } from 'react-router-dom';

import Button from '../common/Button';
import Pill from '../common/Pill';
import Like from '../../utils/like';
import generateRoute from '../../utils/generateRoute';
import { state } from '../../constants/state';
import { routes } from '../../constants/routes';

import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const JobsList = (props) => {
  const {
    jobs = [],
    user,
    hasTitle
  } = props;
  const [isLogged, setIsLogged] = useState(false);
  const [jobsTmp, setJobsTmp] = useState(jobs);

  const handleLike = _.debounce((type, id) => {
    Like.toggleLike(type, id)
      .then(result => {
        setJobsTmp(jobsTmp.map(job => {
          if (job.id == id) {
            return { ...job,
              likes_count: result.data.total,
              hasUserLiked: !job.hasUserLiked
            }
          }

          return job;
        }));

        console.log('[Like SUCCESS]', result);
      }).catch(error => console.log('[Like ERROR]', error));
  }, 400);

  useEffect(() => {
    if (user.isLogged && !_.isEmpty(jobs)) {
      const { userData } = user;

      setIsLogged(true);
      setJobsTmp(jobs.map(job => {
        return {
          ...job,
          hasUserLiked : job.likes.some(like => {
            return like.liker_id == userData.api_token
          })
        }
      }))
    }
  }, [user, jobs])

  return (
    <>
      { hasTitle ? <h3 className="jobs-list__title">募集</h3> : null }
      { jobsTmp.length ? (
        <ul className={`jobs-list ${hasTitle ? 'jobs-list--titled' : ''}`}>
          { jobsTmp.map(job => (
            <li className="jobs-list__item" key={job.id}>
              <div className="job-list__item-top">
                <div className="job-list__item-top-left">
                  <div className="job-list__item-eyecatch">
                    <div className="job-list__item-eyecatch-img" style={{ backgroundImage: `url("${job.cover_photo || ecPlaceholder}")` }}></div>
                  </div>
                </div>
                <div className="job-list__item-top-right">
                  <div className="job-list__item-company">
                    <img src="https://lorempixel.com/240/240/city/" alt=""/>
                    <div className="job-list__item-company-name">
                      ジーコム株式会社
                    </div>
                  </div>
                  <Link to={generateRoute(routes.JOB_DETAIL, { id: job.id })}
                    className="button button--link">
                    <h4 className="job-list__item-title">
                      {job.title}
                    </h4>
                  </Link>
                </div>
              </div>
              <div className="job-list__item-content">
                <p className="job-list__item-description">
                  {job.description}
                </p>
              </div>
              <div className="job-list__item-footer">
                <ul className="job-list__item-pills">
                  <li className="job-list__item-pills-item pill">PHP</li>
                  <li className="job-list__item-pills-item pill">東京</li>
                  <li className="job-list__item-pills-item pill">3日前</li>
                </ul>
                <div className="job-list__item-fav">
                  { isLogged ? (
                    <Button className="button--link" onClick={e => handleLike('job', job.id)}>
                      <Pill className={`pill--icon text-medium-black ${job.hasUserLiked ? state.ACTIVE : ''}`}>
                        <i className="icon icon-star"></i>{job.likes_count}
                      </Pill>
                    </Button>
                  ) : (
                    <Pill className="pill--icon">
                      <i className="icon icon-star"></i>{job.likes_count}
                    </Pill>
                  )}
                </div>
              </div>
            </li>
          )) }
        </ul>
      ) : null }
    </>
  );
};

const mapStateToProps = (state) => ({
  user: state.user
});

export default connect(mapStateToProps)(JobsList);
