import React from 'react';

import Pagination from '../common/Pagination';
import NotificationsList from './NotificationsList';

const NotificationsSection = ({data}) => {
  const notificationsData = data.notifications || {};

  return (
    <div className="notifications-section">
      <div className="notifications-section__content">
        <NotificationsList notifications={notificationsData.data} />
      </div>
      <div className="notifications-section__footer">
        <Pagination
          current={notificationsData.current_page}
          prevPage={notificationsData.prev_page_url}
          nextPage={notificationsData.next_page_url}
          lastPage={notificationsData.last_page}
        />
      </div>
    </div>
  );
}

export default NotificationsSection;
