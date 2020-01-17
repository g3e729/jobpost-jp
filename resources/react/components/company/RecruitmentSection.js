import React from 'react';

import RecruitmentList from './RecruitmentList';

const RecruitmentSection = ({isLoading}) => {
  return (
    <div className="dashboard-section">
      <div className="dashboard-section__content">
        <RecruitmentList isLoading={isLoading} />
      </div>
    </div>
  );
}

export default RecruitmentSection;
