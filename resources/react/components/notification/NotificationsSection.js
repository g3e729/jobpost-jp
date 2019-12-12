import React from 'react';

import Pagination from '../common/Pagination';
import NotificationsList from './NotificationsList';

const NotificationsSection = _ => (
  <div className="notifications-section">
    <div className="notifications-section__content">
      <NotificationsList />
    </div>
    <div className="notifications-section__footer">
      <Pagination />
    </div>
  </div>
);

export default NotificationsSection;
