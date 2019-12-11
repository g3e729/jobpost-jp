import React from 'react';

import Pagination from '../common/Pagination';

import NotificationList from './NotificationList';

const NotificationSection = _ => (
  <div className="notification-section">
    <div className="notification-section__content">
      <NotificationList />
    </div>
    <div className="notification-section__footer">
      <Pagination />
    </div>
  </div>
);

export default NotificationSection;
