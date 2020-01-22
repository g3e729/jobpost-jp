import React, { useState, useEffect } from 'react';
import moment from 'moment';
moment.locale('ja');
import _ from 'lodash';
import { connect } from 'react-redux';
import { Link } from 'react-router-dom';

import Button from '../common/Button';
import Pill from '../common/Pill';
import Like from '../../utils/like';
import generateRoute from '../../utils/generateRoute';
import { state } from '../../constants/state';
import { routes } from '../../constants/routes';

import avatarPlaceholder from '../../../img/avatar-default.png';
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
                    <img src={job.company.avatar || avatarPlaceholder} alt=""/>
                    <div className="job-list__item-company-name">
                      {job.company.company_name}
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
                  { job.programming_language ? <li className="job-list__item-pills-item pill">{job.programming_language}</li> : null }
                  { job.display_prefecture ? <li className="job-list__item-pills-item pill">{job.display_prefecture}</li> : null }
                  { job.created_at ? <li className="job-list__item-pills-item pill">{moment(job.created_at).fromNow()}</li> : null }
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
