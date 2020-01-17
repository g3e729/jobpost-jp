import React from 'react';

import Page from '../common/Page';
import CompanySidebar from './CompanySidebar';
import RecruitmentForm from './RecruitmentForm';

const EditRecruitmentPage = _ => (
  <Page>
    <div className="l-section l-section--full section">
      <div className="l-container l-container--main l-container--full">
        <CompanySidebar />
        <RecruitmentForm />
      </div>
    </div>
  </Page>
);

export default EditRecruitmentPage;
