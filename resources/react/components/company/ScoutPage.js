import React from 'react';

import Page from '../common/Page';
import ScoutSection from './ScoutSection';
import CompanySidebar from './CompanySidebar';

const ScoutPage = _ => (
  <Page>
    <div className="l-section l-section--full section">
      <div className="l-container l-container--main l-container--full">
        <CompanySidebar />
        <ScoutSection />
      </div>
    </div>
  </Page>
);

export default ScoutPage;
