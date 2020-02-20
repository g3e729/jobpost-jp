import React from 'react';

import Page from '../common/Page';
import DashboardProfileForm from './DashboardProfileForm';
import CompanySidebar from './CompanySidebar';

const DashboardProfilePage = _ => (
  <Page>
    <div className="l-section l-section--full section">
      <div className="l-container l-container--main l-container--full">
        <CompanySidebar />
        <DashboardProfileForm />
      </div>
    </div>
  </Page>
);

export default DashboardProfilePage;
