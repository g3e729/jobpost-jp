import React from 'react';
import { Link } from 'react-router-dom';

import Pill from '../common/Pill';
import generateRoute from '../../utils/generateRoute';
import { routes } from '../../constants/routes';

import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const JobsList = (props) => {
  const { jobs = {}, hasTitle } = props;

  return (
    <>
      { hasTitle ? <h3 className="jobs-list__title">募集</h3> : null }
      { jobs.length ? (
        <ul className={`jobs-list ${hasTitle ? 'jobs-list--titled' : ''}`}>
          { jobs.map(job => (
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
                  <Pill className="pill--icon">
                    <i className="icon icon-star"></i>{job.likes_count}
                  </Pill>
                </div>
              </div>
            </li>
          )) }
        </ul>
      ) : null }
    </>
  );
};

export default JobsList;
