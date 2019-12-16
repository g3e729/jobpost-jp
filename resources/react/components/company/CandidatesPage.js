import React from 'react';

import Page from '../common/Page';
import Candidates from './Candidates';

const CandidatesPage = _ => (
  <Page>
    <div className="l-section l-section--full section">
      <div className="l-container l-container--full">
        <Candidates />
      </div>
    </div>
  </Page>
);

export default CandidatesPage;
