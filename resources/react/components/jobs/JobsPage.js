import React, { useEffect, useState } from 'react';
import { useDispatch } from 'react-redux';
import { useLocation } from 'react-router-dom';

import Page from '../common/Page';
import Loading from '../common/Loading';
import Slider from '../common/Slider';
import PageScroll from '../common/PageScroll';
import JobsFilter from './JobsFilter';
import JobsSection from './JobsSection';
import Job from '../../utils/job';
import { getJobs, getFilteredJobs } from '../../actions/jobs';

const JobsPage = _ => {
  const [isPageLoading, setIsPageLoading] = useState(true);
  const [isLoading, setIsLoading] = useState(true);
  const [sliderJobs, setSliderJobs] = useState([]);
  const dispatch = useDispatch();
  const location = useLocation();
  const urlParams = new URLSearchParams(location.search);

  useEffect(_ => {
    async function getSliderJobs() {
      const apiToken = localStorage.getItem('api_token');
      const response = await Job.getFilteredJobs({
        sort: 'desc',
        per_page: 5
      });

      if (response.statusText === 'OK') {
        setSliderJobs(response.data.data.map(job => {
          return {
            ...job,
            hasUserLiked : job.likes.some(like => {
              return like.liker_id == apiToken
            })
          }
        }))
      }
    }

    getSliderJobs();
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
        .then(_ => {
          setIsLoading(false);
          setIsPageLoading(false);
        })
        .catch(_ => {
          setIsLoading(false);
          setIsPageLoading(false);
        });
    }
    else {
      dispatch(getJobs())
        .then(_ => {
          setIsLoading(false);
          setIsPageLoading(false);
        })
        .catch(_ => {
          setIsLoading(false);
          setIsPageLoading(false);
        });
    }
  }, [location]);

  return (
    isPageLoading ? (
      <Loading className="loading--full" />
    ) :  (
      <>
        <PageScroll />
        <Page>
          { isPageLoading ? null : (
            <Slider jobs={sliderJobs} isLoading={isPageLoading} />
          )}
          <div className="l-section l-section--main section">
            <div className="l-container l-container--main">
              <JobsFilter />
              <JobsSection isLoading={isLoading} />
            </div>
          </div>
        </Page>
      </>
    )
  );
}

export default JobsPage;
