import React, { useState, useEffect } from 'react';
import axios from 'axios';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Profile from '../profile/Profile';
import { endpoints } from '../../constants/routes';
import { config } from '../../constants/config';
import generateRoute from '../../utils/generateRoute';

import avatarPlaceholder from '../../../img/avatar-default.png';
import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const StudentPage = (props) => {
  const [student, setStudent] = useState({});

  useEffect(_ => {
    (async function getStudent() {
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
      <Heading type="user"
        style={{ backgroundImage: `url("${student.cover_photo || ecPlaceholder}")` }}
        isOwner="false"
        accountType="student"
        data-avatar={student.avatar || avatarPlaceholder}
        title={student.display_name}
        subTitle={<span><i className="icon icon-book text-dark-yellow"></i>{student.course}</span>}
      />
      <div className="l-section l-section--profile section">
        <div className="l-container">
          <Profile user={student} accountType="student" isOwner="false" />
        </div>
      </div>
    </Page>
  );
}

export default StudentPage;
