import React from 'react';
import moment from 'moment';
import { Link } from 'react-router-dom';

import Button from '../common/Button';
import Pill from '../common/Pill';
import generateRoute from '../../utils/generateRoute';
import { routes } from '../../constants/routes';

const NotificationsList = ({notifications}) => {

  return (
    <ul className="notifications-list">
      { notifications.map(item => (
        <li className="notifications-list__item" key={item.id}>
          <div className="notifications-list__item-main">
            <time className="notifications-list__item-schedule" dateTime={moment(item.published_at).format('YYYY-MM-DD HH:mm')}>{ moment(item.published_at).format('YYYY/MM/DD HH:mm') }</time>
            { !item.seen ? <Pill>New</Pill> : null }
            <Link
              to={{
                pathname: generateRoute(routes.NOTIFICATIONS_DETAIL, { id: item.id }),
                state: { notification: item }
              }}
              className="button button--link notifications-list__item-button">
              <h4 className="notifications-list__item-title">{item.title}</h4>
            </Link>
          </div>
        </li>
      )) }
    </ul>
  );
}

export default NotificationsList;
