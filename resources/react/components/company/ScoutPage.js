import React, { useEffect, useState } from 'react';
import { useLocation } from 'react-router-dom';

import Page from '../common/Page';
import ScoutSection from './ScoutSection';
import CompanySidebar from './CompanySidebar';
import Student from '../../utils/student';

const ScoutPage = _ => {
  const location = useLocation();
  const urlParams = new URLSearchParams(location.search);
  const [isLoading, setIsLoading] = useState(true);
  const [students, setStudents] = useState([]);

  async function getFilteredStudents() {
    const page = urlParams.get('page');
    const course_id = urlParams.get('course_id');
    const age = urlParams.get('age');
    const prefecture = urlParams.get('prefecture');
    const study_abroad_fee = urlParams.get('study_abroad_fee');

    const request = await Student.getFilteredStudents({
      page,
      course_id,
      age,
      prefecture,
      study_abroad_fee
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

        console.log('[Scouts ERROR]', error);
      });
  }, [location])

  return (
    <Page>
      <div className="l-section l-section--full section">
        <div className="l-container l-container--main l-container--full">
          <CompanySidebar />
          <ScoutSection students={students} isLoading={isLoading} />
        </div>
      </div>
    </Page>
  );
}

export default ScoutPage;
