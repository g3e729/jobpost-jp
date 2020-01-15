import React, { useState, useEffect } from 'react';
import { connect } from 'react-redux';
import { useHistory } from 'react-router-dom';

import Button from '../common/Button';
import Fraction from '../common/Fraction';
import Loading from '../common/Loading';
import Nada from '../common/Nada';
import Pagination from '../common/Pagination';
import JobsList from './JobsList';
import { state } from '../../constants/state';

const JobsSection = (props) => {
  const history = useHistory();
  const urlParams = new URLSearchParams(history.location.search);
  const [sortTab, setSortTab] = useState();
  const { jobs, isLoading } = props;
  const data = jobs.jobsData || {};
  const jobsData = data.data || {};
  const handleSortNew = _ => {
    setSortTab(1);

    history.push(history.location.pathname);
  }

  const handleSortPopular = _ => {
    setSortTab(2);

    history.push(`${history.location.pathname}?sort=popular`);
  }

  useEffect(_ => {
    const sort = urlParams.get('sort');
    setSortTab(1);

    if (sort === 'popular') {
      setSortTab(2);
    }
  }, [sortTab, history.location]);

  return (
    <div className="jobs-section">
      { isLoading ? (
        <Loading />
      ) : (
        jobsData.length ? (
          <>
            <div className="jobs-section__top">
              <Fraction numerator={jobsData.length}
                denominator={data.total}
              />
              <div className="jobs-section__actions">
                <Button className={`button--link jobs-section__actions-button ${sortTab === 1 || !sortTab ? state.ACTIVE : ''}`} onClick={e => handleSortNew(e)}>
                  新着順
                </Button>
                <Button className={`button--link jobs-section__actions-button ${sortTab === 2 ? state.ACTIVE : ''}`} onClick={e => handleSortPopular(e)}>
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
        ) : (
          <Nada className="nada--center">
            <span className="nada__emphasize">
              募集が見つかりませんでした
            </span>
            条件を変えて探してみましょう。
          </Nada>
        )
      )}
    </div>
  );
}

const mapStateToProps = (state) => ({
  jobs: state.jobs
});

export default connect(mapStateToProps)(JobsSection);
