import React, { useState, useEffect } from 'react';
import axios from 'axios';

import Page from '../common/Page';
import { endpoints } from '../../constants/routes';
import { config } from '../../constants/config';
import generateRoute from '../../utils/generateRoute';

const StudentPage = (props) => {
  const [student, setStudent] = useState({});

  useEffect(_ => {
    (async function getCompany() {
      const apiToken = document.querySelector('meta[name="api-token"]').content || localStorage.getItem('api_token');

      const studentId = props.match.params.id;
      const request = await axios.request({
        url: generateRoute(endpoints.STUDENTS_DETAIL, { id: studentId }),
        baseURL: config.api.url,
        method: 'get',
        headers: {
          'app-auth-token': apiToken
        }
      });

      return request.data;
    })()
    .then(res => setStudent(res));
  }, []);

  return (
    <Page>
      <div className="l-section l-section--profile section">
        <div className="l-container">
          Student content
        </div>
      </div>
    </Page>
  );
}

export default StudentPage;
