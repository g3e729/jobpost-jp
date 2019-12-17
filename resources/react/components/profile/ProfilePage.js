import React from 'react';
import { connect } from 'react-redux';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Profile from './Profile';

const ProfilePage = (props) => {
  const { user } = props;
  const accountType = (user.userData && user.userData.accountType) || '';
  var data = user.userData;

  return (
    accountType === 'student' ? (
      <Page>
        <Heading type="user"
          style={{ backgroundImage: `url("${data.profile.cover_photo}")` }}
          data-avatar={data.profile.avatar}
          title={data.profile.display_name}
          subTitle={<span><i className="icon icon-book text-dark-yellow"></i>{data.profile.course}</span>}
        />
        <div className="l-section l-section--profile section">
          <div className="l-container">
            <Profile user={user} accountType={accountType} />
          </div>
        </div>
      </Page>
    ) : accountType === 'company' ? (
      <Page>
        <Heading type="user"
          style={{ backgroundImage: `url("${data.profile.cover_photo}")` }}
          data-avatar={data.profile.avatar}
          title={data.profile.display_name}
          subTitle={data.profile.homepage}
        />
        <div className="l-section l-section--profile section">
          <div className="l-container">
            <Profile user={user} accountType={accountType} />
          </div>
        </div>
      </Page>
    ) : null
  );
}

const mapStateToProps = (state) => ({
  user: state.user
});

export default connect(mapStateToProps)(ProfilePage);
