import React, { useState, useEffect } from 'react';
import axios from 'axios';
import _ from 'lodash';
import { connect } from 'react-redux';

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
  const { user } = props;

  async function getStudent() {
    const apiToken = document.querySelector('meta[name="api-token"]').content || localStorage.getItem('api_token');

    const studentId = props.match.params.id;
    const request = await axios.request({
      url: generateRoute(endpoints.STUDENT_DETAIL, { id: studentId }),
      baseURL: config.api.url,
      method: 'get',
      headers: {
        'app-auth-token': apiToken
      }
    });

    return request.data;
  }

  useEffect(_ => {
    getStudent()
      .then(res => setStudent(res))
      .catch(error => console.log('[Student detail ERROR]', error));
  }, []);

  return (
    <Page>
      { !_.isEmpty(student) ? (
        <>
          <Heading type="user"
            style={{ backgroundImage: `url("${student.cover_photo || ecPlaceholder}")` }}
            isOwner="false"
            isLogged={user.isLogged}
            accountType="student"
            title={student.display_name}
            subTitle={<span><i className="icon icon-book text-dark-yellow"></i>{student.course}</span>}
            passedFunction={_ => getStudent().then(res => setStudent(res))}
            data-avatar={student.avatar || avatarPlaceholder}
            data-likes={student.total_likes}
          />
          <div className="l-section l-section--profile section">
            <div className="l-container">
              <Profile user={student} accountType="student" isOwner="false" />
            </div>
          </div>
        </>
      ) : (
        null
      )}
    </Page>
  );
}


const mapStateToProps = (state) => ({
  user: state.user
});

export default connect(mapStateToProps)(StudentPage);
