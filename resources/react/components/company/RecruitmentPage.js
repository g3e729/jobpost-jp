import React, { useEffect, useState } from 'react';
import { useDispatch } from 'react-redux';
import { useLocation } from 'react-router-dom';

import Page from '../common/Page';
import RecruitmentSection from './RecruitmentSection';
import CompanySidebar from './CompanySidebar';
import { getMyJobs } from '../../actions/myjobs';

const RecruitmentPage = _ => {
  const dispatch = useDispatch();
  const location = useLocation();
  const urlParams = new URLSearchParams(location.search);
  const [isLoading, setIsLoading] = useState(true);

  useEffect(_ => {
    setIsLoading(true);

    const page = urlParams.get('page');
    const status = urlParams.get('status');

    dispatch(getMyJobs({page, status}))
      .then(_ => setIsLoading(false))
      .catch(_ => setIsLoading(false));

  }, [location]);

  return (
    <Page>
      <div className="l-section l-section--full section">
        <div className="l-container l-container--main l-container--full">
          <CompanySidebar />
          <RecruitmentSection isLoading={isLoading} />
        </div>
      </div>
    </Page>
  );
}

export default RecruitmentPage;
