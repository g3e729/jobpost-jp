import React from 'react';
import _ from 'lodash';
import { Link } from 'react-router-dom';

import generateRoute from '../../utils/generateRoute';
import { routes } from '../../constants/routes';

import avatarPlaceholder from '../../../img/avatar-default.png';
import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const FavoritesList = ({jobs, type = ''}) => {

  return (
    <ul className="favorites-list">
      { jobs.map(job => (
        <li className="favorites-list__item" key={job.id}>
          <div className="favorites">
            <div className="favorites__top">
              <div className="favorites__eyecatch">
                <div className="favorites__eyecatch-img" style={{ backgroundImage: `url("${(type === 'job' ? job.cover_photo : job.job_post.cover_photo) || ecPlaceholder}")` }}></div>
              </div>
              <Link to={generateRoute(routes.JOB_DETAIL, { id: (type === 'job' ? job.id : job.job_post.id) })}
                className="button button--link">
                <h4 className="favorites__title">
                  {type === 'job' ? job.title : job.job_post.title}
                </h4>
              </Link>
            </div>
            <div className="favorites__content">
              <div className="favorites__company">
                <img src={ (type === 'job' ? job.company.avatar : job.employer.avatar) || avatarPlaceholder} alt=""/>
                <Link to={generateRoute(routes.COMPANY_DETAIL, { id: type === 'job' ? job.company.id : job.employer.id })}
                  className="button button--link favorites__company-name">
                    { type === 'job' ? job.company.company_name : job.employer.company_name}
                </Link>
              </div>
              <p className="favorites__description">
                {_.truncate(((type === 'job' ? job.description : job.job_post.description)), { 'length': 125, 'separator': '...'})}
              </p>
            </div>
          </div>
        </li>
      )) }
    </ul>
  );
}

export default FavoritesList;
