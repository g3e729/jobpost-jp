import React from 'react';

import Page from '../common/Page';
import Dashboard from './Dashboard';

const DashboardPage = _ => (
  <Page>
    <div className="l-section l-section--full section">
      <div className="l-container l-container--full">
        <Dashboard />
      </div>
    </div>
  </Page>
);

export default DashboardPage;
