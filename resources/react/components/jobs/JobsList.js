import React from 'react';

import Pagination from '../common/Pagination';

const JobsList = () => {
  return (
    <div className="jobs-list">
      <div className="jobs-list__top">1</div>
      <div className="jobs-list__content">2</div>
      <div className="jobs-list__footer">
        <Pagination />
      </div>
    </div>
  );
}

export default JobsList;
