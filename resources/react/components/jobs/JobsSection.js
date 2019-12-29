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
  const innerData = data.data || {};

  return (
    <div className="jobs-section">
      { innerData.length ? (
        <>
          <div className="jobs-section__top">
            <Fraction numerator="10"
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
            <JobsList />
          </div>
          <div className="jobs-section__footer">
            <Pagination
              first={data.from}
              last={data.last_page}
              current={data.current_page}
              prevPage={data.prev_page_url}
              nextPage={data.next_page_url}
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
