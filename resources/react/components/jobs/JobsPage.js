import React, { useEffect, useState } from 'react';
import { useDispatch } from 'react-redux';
import { useLocation } from 'react-router-dom';

import Page from '../common/Page';
import Slider from '../common/Slider';
import PageScroll from '../common/PageScroll';
import JobsFilter from './JobsFilter';
import JobsSection from './JobsSection';
import { getJobs, getFilteredJobs  } from '../../actions/jobs';

const JobsPage = _ => {
  const [isLoading, setIsLoading] = useState(true);
  const dispatch = useDispatch();
  const location = useLocation();
  const urlParams = new URLSearchParams(location.search);

  useEffect(_ => {
    setIsLoading(true);

    const page = urlParams.get('page');
    const position = urlParams.get('position');
    const employment_type = urlParams.get('employment_type');
    const programming_language = urlParams.get('programming_language');
    const prefecture = urlParams.get('prefecture');
    const sort = urlParams.get('sort');

    if (page || position || employment_type || programming_language || prefecture || sort) {
      dispatch(getFilteredJobs({
        page,
        position,
        employment_type,
        programming_language,
        prefecture,
        sort
      }))
        .then(_ => setIsLoading(false))
        .catch(_ => setIsLoading(false));
    }
    else {
      dispatch(getJobs())
        .then(_ => setIsLoading(false))
        .catch(_ => setIsLoading(false));
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
            <JobsSection isLoading={isLoading} />
          </div>
        </div>
      </Page>
    </>
  );
}

export default JobsPage;
