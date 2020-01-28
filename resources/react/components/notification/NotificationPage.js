 import React, { useState, useEffect } from 'react';
 import _ from 'lodash';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Loading from '../common/Loading';
import Four0FourPage from '../common/404';
import Notification from './Notification';
import PageUp from '../common/PageUp';

const NotificationPage = () => {
  const [isLoading, setIsLoading] = useState(true);
  const [notification, setNotification] = useState({});

  useEffect(_ => {
    setNotification({ ... history.state ? history.state.state.notification : null});

    setTimeout(_ => {
      setIsLoading(false);
    }, 400);
  }, [])

  return (
    <Page>
      { isLoading ? (
        <Loading className="loading--full" />
      ) : (
        !_.isEmpty(notification) ? (
          <>
            <Heading type={null}
              title="NOTIFICATIONS"
              subTitle="お知らせ"
            />
            <div className="l-section l-section--notifications section">
              <div className="l-container">
                <Notification data={notification} />
              </div>
            </div>
            <PageUp />
          </>
        ) : <Four0FourPage />
      )}
    </Page>
   );
}

 export default NotificationPage;
