import React from 'react';

import Pagination from '../common/Pagination';
import Button from '../common/Button';
import Fraction from '../common/Fraction';
import { state } from '../../constants/state';

import JobsList from './JobsList';

const JobsSection = _ => (
  <div className="jobs-section">
    <div className="jobs-section__top">
      <Fraction numerator="10"
        denominator="75"
      />
      <div className="jobs-section__actions">
        <Button className={`button--link jobs-section__actions-button ${state.ACTIVE}`}>
          新着順
        </Button>
        <Button className="button--link jobs-section__actions-button">
          人気順
        </Button>
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
