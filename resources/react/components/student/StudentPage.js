import React, { useState, useEffect } from 'react';
import _ from 'lodash';
import { connect } from 'react-redux';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Profile from '../profile/Profile';
import StudentAPI from '../../utils/student';

import avatarPlaceholder from '../../../img/avatar-default.png';
import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const StudentPage = (props) => {
  const [student, setStudent] = useState({});
  const [hasLiked, setHasLiked] = useState(false);
  const { user } = props;

  async function getStudent() {
    const studentId = props.match.params.id;
    const request = await StudentAPI.getStudent(studentId);

    return request.data;
  }

  useEffect(_ => {
    getStudent()
      .then(res => setStudent(res))
      .catch(error => console.log('[Student detail ERROR]', error));
  }, []);

  useEffect(() => {
    if (user.isLogged && !_.isEmpty(student)) {
      const { userData } = user;

      setHasLiked(student.likes.some(like => {
        return like.liker_id == userData.api_token
      }));
    }
  }, [user, student])

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
            hasLiked={hasLiked}
            data-avatar={student.avatar || avatarPlaceholder}
            data-likes={student.likes_count}
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
