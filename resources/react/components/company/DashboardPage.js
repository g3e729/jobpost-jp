import React from 'react';

import Page from '../common/Page';
import DashboardSection from './DashboardSection';
import CompanySidebar from './CompanySidebar';

const DashboardPage = _ => (
  <Page>
    <div className="l-section l-section--full section">
      <div className="l-container l-container--main l-container--full">
        <CompanySidebar />
        <DashboardSection />
      </div>
    </div>
  </Page>
);

export default DashboardPage;
