import React from 'react';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Settings from './Settings';

const SettingsPage = _ => (
  <Page>
    <Heading type={null}
      title="ACCOUNT SETTINGS"
      subTitle="アカウント設定"
    />
    <div className="l-section l-section--notifications section">
      <div className="l-container">
        <Settings />
      </div>
    </div>
  </Page>
);

export default SettingsPage;
