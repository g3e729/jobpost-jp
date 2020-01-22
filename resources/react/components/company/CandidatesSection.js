import React from 'react';

import SeekerList from './SeekerList';

const CandidatesSection = ({students, isLoading}) => (
  <div className="dashboard-section">
    <div className="dashboard-section__content">
      <SeekerList
        type="full"
        title="候補者一覧"
        students={students}
        isLoading={isLoading}
      />
    </div>
  </div>
);

export default CandidatesSection;
