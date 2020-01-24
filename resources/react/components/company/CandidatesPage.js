import React, { useEffect, useState } from 'react';
import { useLocation } from 'react-router-dom';

import Page from '../common/Page';
import CandidatesSection from './CandidatesSection';
import CompanySidebar from './CompanySidebar';
import Student from '../../utils/student';

const CandidatesPage = _ => {
  const location = useLocation();
  const urlParams = new URLSearchParams(location.search);
  const [isLoading, setIsLoading] = useState(true);
  const [students, setStudents] = useState([]);

  async function getFilteredStudents() {
    const page = urlParams.get('page');
    const scouted = urlParams.get('scouted');
    const applied = urlParams.get('applied');
    const liked = urlParams.get('liked');

    const request = await Student.getFilteredStudents({
      scouted,
      applied,
      liked,
      page, per_page: 10
    });

    return request.data;
  }

  useEffect(_ => {
    getFilteredStudents()
      .then(res => {
        setStudents(res);
        setIsLoading(false);
      })
      .catch(error => {
        setIsLoading(false);

        console.log('[Students filter ERROR]', error);
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
