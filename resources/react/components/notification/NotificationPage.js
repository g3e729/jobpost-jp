import React from 'react';

import Page from '../common/Page';
import Heading from '../common/Heading';
import NotificationSection from './NotificationSection';

const NotificationPage = _ => (
  <Page>
    <Heading type={null}
      title="NOTIFICATIONS"
      subTitle="お知らせ"
    />
    <div className="l-section l-section--notification section">
      <div className="l-container">
        <NotificationSection />
      </div>
    </div>
  </Page>
);

export default NotificationPage;
