import React from 'react';

import Page from '../common/Page';
import Heading from '../common/Heading';
import NotificationsSection from './NotificationsSection';
import PageUp from '../common/PageUp';

const NotificationsPage = _ => (
  <Page>
    <Heading type={null}
      title="NOTIFICATIONS"
      subTitle="お知らせ"
    />
    <div className="l-section l-section--notifications section">
      <div className="l-container">
        <NotificationsSection />
      </div>
    </div>
    <PageUp />
  </Page>
);

export default NotificationsPage;
