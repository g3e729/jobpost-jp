import React, { useEffect } from 'react';
import { useDispatch } from 'react-redux';

import Page from '../common/Page';
import Slider from '../common/Slider';
import PageScroll from '../common/PageScroll';
import JobsFilter from './JobsFilter';
import JobsSection from './JobsSection';

import { getJobs } from '../../actions/jobs';

const JobsPage = _ => {
  const dispatch = useDispatch();

  useEffect(_ => {
    dispatch(getJobs());
  }, []);

  return (
    <>
      <PageScroll />
      <Page>
        <Slider />
        <div className="l-section l-section--main section">
          <div className="l-container l-container--main">
            <JobsFilter />
            <JobsSection />
          </div>
        </div>
      </Page>
    </>
  );
}

export default JobsPage;
