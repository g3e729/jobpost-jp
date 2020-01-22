import React, { useEffect, useState } from 'react';
import { useLocation } from 'react-router-dom';

import Page from '../common/Page';
import CandidatesSection from './CandidatesSection';
import CompanySidebar from './CompanySidebar';
import Apply from '../../utils/apply';

const CandidatesPage = _ => {
  const location = useLocation();
  const urlParams = new URLSearchParams(location.search);
  const [isLoading, setIsLoading] = useState(true);
  const [students, setStudents] = useState([]);

  async function getApplicationsCompany() {
    const page = urlParams.get('page') || null;
    const request = await Apply.getApplicationsCompany({page});

    return request.data;
  }

  useEffect(_ => {
    getApplicationsCompany()
      .then(res => {
        setStudents(res);
        setIsLoading(false);
      })
      .catch(error => {
        setIsLoading(false);

        console.log('[Applications ERROR]', error);
      });
  }, [location])

  return (
    <Page>
      <div className="l-section l-section--full section">
        <div className="l-container l-container--main l-container--full">
          <CompanySidebar />
          <CandidatesSection students={students} isLoading={isLoading} />
        </div>
      </div>
    </Page>
  );
}

export default CandidatesPage;
