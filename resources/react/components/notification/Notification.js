import React from 'react';
import moment from 'moment';

import { Link } from 'react-router-dom';

import { routes } from '../../constants/routes';

const Notification = ({data}) => {
  return (
    <div className="notification">
      <div className="notification__top">
        <h2 className="notification__title">{data.title}</h2>
        <time className="notification__schedule" dateTime={moment(data.published_at).format('YYYY-MM-DD')}>
          {moment(data.published_at).format('YYYY/MM/DD')}
        </time>
      </div>
      <p className="notification__desc">{data.description}
      </p>

      <Link className="button button--pill notification__button" to={routes.NOTIFICATIONS}>
        <span><i className="icon icon-back-curve text-dark-yellow"></i>通知リストに戻る</span>
      </Link>
    </div>
  );
}

export default Notification;
