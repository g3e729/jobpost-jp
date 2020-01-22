import React from 'react';

import ScoutList from './ScoutList';

const ScoutSection = ({students, isLoading})  => (
  <div className="dashboard-section">
    <div className="dashboard-section__content">
      <ScoutList students={students} isLoading={isLoading} />
    </div>
  </div>
);

export default ScoutSection;
