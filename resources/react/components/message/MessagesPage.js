import React from 'react';

import Page from '../common/Page';
import MessagesSidebar from './MessagesSidebar';
import MessagesSection from './MessagesSection';

const MessagesPage = _ => (
  <Page>
    <div className="l-section l-section--full section">
      <div className="l-container l-container--main l-container--full">
        <MessagesSidebar />
        <MessagesSection />
      </div>
    </div>
  </Page>
);

export default MessagesPage;
