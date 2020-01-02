import React from 'react';
import { connect } from 'react-redux';

import Pagination from '../common/Pagination';
import Button from '../common/Button';
import Fraction from '../common/Fraction';
import { state } from '../../constants/state';
import JobsList from './JobsList';

const JobsSection = (props) => {
  const { jobs } = props;
  const data = jobs.jobsData || {};
  const jobsData = data.data || {};

  return (
    <div className="jobs-section">
      { jobsData.length ? (
        <>
          <div className="jobs-section__top">
            <Fraction numerator={jobsData.length}
              denominator={data.total}
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
            <JobsList jobs={jobsData} />
          </div>
          <div className="jobs-section__footer">
            <Pagination
              current={data.current_page}
              prevPage={data.prev_page_url}
              nextPage={data.next_page_url}
              lastPage={data.last_page}
            />
          </div>
        </>
      ) : null }
    </div>
  );
}

const mapStateToProps = (state) => ({
  jobs: state.jobs
});

export default connect(mapStateToProps)(JobsSection);
