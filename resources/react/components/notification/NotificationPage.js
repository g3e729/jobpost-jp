 import React from 'react';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Notification from './Notification';

const NotificationPage = _ => (
  <Page>
    <Heading type={null}
      title="NOTIFICATIONS"
      subTitle="お知らせ"
    />
    <div className="l-section l-section--notifications section">
      <div className="l-container">
        <Notification />
      </div>
    </div>
  </Page>
 );

 export default NotificationPage;
