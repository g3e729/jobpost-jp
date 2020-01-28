 import React, { useState, useEffect } from 'react';
 import _ from 'lodash';
import { useDispatch } from 'react-redux';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Loading from '../common/Loading';
import Four0FourPage from '../common/404';
import PageUp from '../common/PageUp';
import Notification from './Notification';
import NotificationAPI from '../../utils/notification';
import { getNotifications } from '../../actions/notifications';

const NotificationPage = () => {
  const dispatch = useDispatch();
  const [isLoading, setIsLoading] = useState(true);
  const [notification, setNotification] = useState({});

  useEffect(_ => {
    setTimeout(_ => {
      setNotification({ ... history.state ? history.state.state.notification : null});
      setIsLoading(false);
    }, 400);
  }, [])

  useEffect(() => {
    if (!_.isEmpty(notification) && notification.seen === 0) {
      NotificationAPI.seenNotification(notification.id)
        .then(_ => dispatch(getNotifications()))
        .catch(error => {
          console.log('Notication ERROR:', error);
        })
    }
  }, [notification])

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
