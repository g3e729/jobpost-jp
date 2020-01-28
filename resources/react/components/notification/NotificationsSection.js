import React from 'react';

import Pagination from '../common/Pagination';
import NotificationsList from './NotificationsList';

const NotificationsSection = ({data}) => {

  return (
    <div className="notifications-section">
      <div className="notifications-section__content">
        <NotificationsList notifications={data} />
      </div>
      <div className="notifications-section__footer">
        <Pagination
          current={data.current_page}
          prevPage={data.prev_page_url}
          nextPage={data.next_page_url}
          lastPage={data.last_page}
        />
      </div>
    </div>
  );
}

export default NotificationsSection;
