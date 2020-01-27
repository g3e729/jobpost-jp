import React, { useState, useEffect } from 'react';
import _ from 'lodash';
import { connect } from 'react-redux';

import Page from '../common/Page';
import Four0FourPage from '../common/404';
import Heading from '../common/Heading';
import Loading from '../common/Loading';
import Profile from '../profile/Profile';
import StudentAPI from '../../utils/student';

import avatarPlaceholder from '../../../img/avatar-default.png';
import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const StudentPage = (props) => {
  const [student, setStudent] = useState({});
  const [hasLiked, setHasLiked] = useState(false);
  const [hasScouted, setHasScouted] = useState(false);
  const [isLoading, setIsLoading] = useState(true);
  const { user } = props;

  async function getStudent() {
    const studentId = props.match.params.id;
    const request = await StudentAPI.getStudent(studentId);

    return request.data;
  }

  useEffect(_ => {
    getStudent()
      .then(res => {
        setStudent(res);
        setIsLoading(false);
        setHasScouted(!!res.applications_count);
      })
      .catch(error => {
        setIsLoading(false);

        console.log('[Student detail ERROR]', error);
      });
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
      { isLoading ? (
        <Loading className="loading--full" />
      ) : (
        student.code != 404 ? (
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
              hasScouted={hasScouted}
              viewerType={user.userData && user.userData.account_type}
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
          <Four0FourPage />
        )
      )}
    </Page>
  );
}

const mapStateToProps = (state) => ({
  user: state.user
});

export default connect(mapStateToProps)(StudentPage);
