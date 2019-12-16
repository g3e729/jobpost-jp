import React from 'react';

import Page from '../common/Page';
import RecruitmentSection from './RecruitmentSection';
import CompanySidebar from './CompanySidebar';

const RecruitmentPage = _ => (
  <Page>
    <div className="l-section l-section--full section">
      <div className="l-container l-container--main l-container--full">
        <CompanySidebar />
        <RecruitmentSection />
      </div>
    </div>
  </Page>
);

export default RecruitmentPage;
