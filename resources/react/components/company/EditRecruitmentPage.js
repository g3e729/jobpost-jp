import React from 'react';

import Page from '../common/Page';
import CompanySidebar from './CompanySidebar';

const EditRecruitmentPage = _ => (
  <Page>
    <div className="l-section l-section--full section">
      <div className="l-container l-container--main l-container--full">
        <CompanySidebar />
        Edit
      </div>
    </div>
  </Page>
);

export default EditRecruitmentPage;
