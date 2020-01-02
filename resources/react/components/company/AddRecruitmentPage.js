import React from 'react';

import Page from '../common/Page';
import CompanySidebar from './CompanySidebar';
import AddRecruitmentSection from './AddRecruitmentSection';

const AddRecruitmentPage = _ => (
  <Page>
    <div className="l-section l-section--full section">
      <div className="l-container l-container--main l-container--full">
        <CompanySidebar />
        <AddRecruitmentSection />
      </div>
    </div>
  </Page>
);

export default AddRecruitmentPage;
