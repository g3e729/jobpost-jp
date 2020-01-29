import React from 'react';
import moment from 'moment';
import { useHistory } from 'react-router-dom';
import { useDispatch } from 'react-redux';

import Button from '../common/Button';
import Pill from '../common/Pill';
import NotificationAPI from '../../utils/notification';
import generateRoute from '../../utils/generateRoute';
import { routes } from '../../constants/routes';
import { getNotifications } from '../../actions/notifications';

const notificationType = {
  CHAT: 'ChatChannel',
  COMPANY: 'CompanyProfile',
  JOB: 'JobPost',
  SEEKER: 'SeekerProfile',
}

const NotificationsList = ({notifications}) => {
  const history = useHistory();
  const dispatch = useDispatch();

  const handleRedirect = (item) => {
    const {
      id,
      about_id,
      about_type
    } = item;

    if (item.seen === 0) {
      NotificationAPI.seenNotification(id)
        .then(_ => dispatch(getNotifications()))
        .catch(error => {
          console.log('Notication ERROR:', error);
        })
    }

    switch(about_type) {
      case notificationType.CHAT:
        history.push({
          pathname: routes.MESSAGES,
          state: { activeChannel: about_id }
        });
        break;
      case notificationType.COMPANY:
        history.push(generateRoute(routes.COMPANY_DETAIL, { id: about_id }));
        break;
      case notificationType.JOB:
        history.push(generateRoute(routes.JOB_DETAIL, { id: about_id }));
        break;
      case notificationType.SEEKER:
        history.push(generateRoute(routes.STUDENT_DETAIL, { id: about_id }));
        break;
      default:
        history.push({
          pathname: generateRoute(routes.NOTIFICATIONS_DETAIL, { id: about_id }),
          state: { notification: item }
        })
    }
  }

  return (
    <ul className="notifications-list">
      { notifications.map(item => (
        <li className="notifications-list__item" key={item.id}>
          <div className="notifications-list__item-main">
            <time className="notifications-list__item-schedule" dateTime={moment(item.published_at).format('YYYY-MM-DD HH:mm')}>{ moment(item.published_at).format('YYYY/MM/DD HH:mm') }</time>
            { !item.seen ? <Pill className="pill--button">New</Pill> : null }
            <Button className="button--link notifications-list__item-button" onClick={_ => handleRedirect(item)}>
              <h4 className="notifications-list__item-title">{item.title}</h4>
            </Button>
          </div>
        </li>
      )) }
    </ul>
  );
}

export default NotificationsList;
