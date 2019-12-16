import React from 'react';

import Page from '../common/Page';
import CandidatesSection from './CandidatesSection';
import CompanySidebar from './CompanySidebar';

const CandidatesPage = _ => (
  <Page>
    <div className="l-section l-section--full section">
      <div className="l-container l-container--main l-container--full">
        <CompanySidebar />
        <CandidatesSection />
      </div>
    </div>
  </Page>
);

export default CandidatesPage;
