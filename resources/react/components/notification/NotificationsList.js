import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import faker from 'faker';
faker.locale = "ja";
import moment from 'moment';

import Button from '../common/Button';
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
            <time className="notifications-list__item-main-schedule" dateTime={ moment(item.schedule).format('YYYY-MM-DD') }>{ moment(item.schedule).format('YYYY/MM/DD') }</time>
            { item.isNew ? <span className="pill">New</span> : null }
            <Link to={generateRoute(routes.NOTIFICATIONS_DETAIL, { id: item.id })}>
              <h4 className="notifications-list__item-main-title">{item.title}</h4>
            </Link>

            <div className={`notifications-list__item-main-action ${currentItem === item.id ? state.ACTIVE : ''}`}>
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
