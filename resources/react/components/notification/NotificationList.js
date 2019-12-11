import React, { useState } from 'react';

import Button from '../common/Button';
import { state } from '../../constants/state';

const NotificationList = _ => {
  const [currentItem, setCurrentItem] = useState(null);

  return (
    <ul className="notification-list">
      { [...Array(10)].map((_, idx) => (
        <li className="notification-list__item" onMouseOver={_ => setCurrentItem(idx)} onMouseOut={_ => setCurrentItem(null)} key={idx}>
          <div className="notification">
            <time className="notification__schedule" dateTime="2019-07-24">2019/07/24</time>
            <h4 className="notification__title">Kredoブログを更新しました。</h4>

            <div className={`notification__action ${currentItem === idx ? state.ACTIVE : ''}`}>
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

export default NotificationList;
