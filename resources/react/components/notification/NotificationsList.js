import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import faker from 'faker';
faker.locale = "ja";
import moment from 'moment';

import Button from '../common/Button';
import Pill from '../common/Pill';
import { routes } from '../../constants/routes';
import { state } from '../../constants/state';
import generateRoute from '../../utils/generateRoute';

const dummyNotifications = new Array(10)
  .fill(null)
  .map(e => {
    e = {};
    e.id = faker.random.uuid();
    e.isNew = faker.random.boolean();
    e.title = faker.random.words();
    e.schedule = faker.date.recent(5);

    return e;
  })

const NotificationsList = _ => {
  const [currentItem, setCurrentItem] = useState(null);

  return (
    <ul className="notifications-list">
      { dummyNotifications.map((item) => (
        <li className="notifications-list__item" onMouseOver={_ => setCurrentItem(item.id)} onMouseOut={_ => setCurrentItem(null)} key={item.id}>
          <div className="notifications-list__item-main">
            <time className="notifications-list__item-schedule" dateTime={ moment(item.schedule).format('YYYY-MM-DD') }>{ moment(item.schedule).format('YYYY/MM/DD') }</time>
            { item.isNew ? <Pill>New</Pill> : null }
            <Link to={generateRoute(routes.NOTIFICATIONS_DETAIL, { id: item.id })}
              className="button button--link notifications-list__item-button">
              <h4 className="notifications-list__item-title">{item.title}</h4>
            </Link>

            <div className={`notifications-list__item-action ${currentItem === item.id ? state.ACTIVE : ''}`}>
              <Button className="button--link" onClick={_ => console.log(currentItem)}>
                <i className="icon icon-cross text-dark-gray"></i>
              </Button>
            </div>
          </div>
        </li>
      )) }
    </ul>
  );
}

export default NotificationsList;
