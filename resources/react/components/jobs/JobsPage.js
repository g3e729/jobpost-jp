import React, { useEffect } from 'react';
import { useDispatch } from 'react-redux';
import { useLocation } from 'react-router-dom';

import Page from '../common/Page';
import Slider from '../common/Slider';
import PageScroll from '../common/PageScroll';
import JobsFilter from './JobsFilter';
import JobsSection from './JobsSection';
import { getJobs, getFilteredJobs  } from '../../actions/jobs';

const JobsPage = _ => {
  const dispatch = useDispatch();
  const location = useLocation();
  const urlParams = new URLSearchParams(location.search);

  useEffect(_ => {
    // By Page
    const page = urlParams.get('page');

    // By Filter
    const position = urlParams.get('position');
    const status = urlParams.get('status'); // TODO: not working on via api
    const programming_language = urlParams.get('programming_language'); // TODO: not working on via api
    const framework = urlParams.get('framework');
    const prefecture = urlParams.get('prefecture'); // TODO: not working on via api

    if (page || position || status || programming_language || framework || prefecture) {
      dispatch(getFilteredJobs({
        page,
        position,
        status,
        programming_language,
        framework,
        prefecture
      }));
    }
    else {
      dispatch(getJobs());
    }

  }, [location]);

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
