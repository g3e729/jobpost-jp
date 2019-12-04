import React from 'react';

import Pagination from '../common/Pagination';
import Button from '../common/Button';
import { state } from '../constants/state';

import JobsList from './JobsList';

const JobsSection = () => (
  <div className="jobs-section">
    <div className="jobs-section__top">
      <div className="jobs-section__fraction">
        <span className="jobs-section__fraction-numeration">10</span> / 75
      </div>
      <div className="jobs-section__actions">
        <Button className={`button--link jobs-section__actions-button ${state.ACTIVE}`}
          value={`新着順`}
        />
        <Button className="button--link jobs-section__actions-button"
          value={`人気順`}
        />
      </div>
    </div>
    <div className="jobs-section__content">
      <JobsList />
    </div>
    <div className="jobs-section__footer">
      <Pagination />
    </div>
  </div>
);

export default JobsSection;
