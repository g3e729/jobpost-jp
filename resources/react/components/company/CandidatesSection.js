import React from 'react';

import SeekerList from './SeekerList';

const CandidatesSection = _ => (
  <div className="dashboard-section">
    <div className="dashboard-section__content">
      <SeekerList type="full" title="候補者一覧" />
    </div>
  </div>
);

export default CandidatesSection;
