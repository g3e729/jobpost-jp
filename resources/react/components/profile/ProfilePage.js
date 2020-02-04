import React from 'react';
import { connect } from 'react-redux';

import Page from '../common/Page';
import Heading from '../common/Heading';
import PageUp from '../common/PageUp';
import Profile from './Profile';
import isValidUrl from '../../utils/isvalidurl';

import avatarPlaceholder from '../../../img/avatar-default.png';
import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const ProfilePage = (props) => {
  const { user } = props;
  const accountType = (user.userData && user.userData.account_type) || '';
  const data = user.userData;

  return (
    <Page>
      <Heading type="user"
        style={{ backgroundImage: `url("${data.profile.cover_photo || ecPlaceholder}")` }}
        title={data.profile.display_name}
        subTitle={
          accountType === 'student' ? (
            <span><i className="icon icon-book text-dark-yellow"></i>{data.profile.course}</span>
          ) : accountType === 'company' ? (
            isValidUrl(data.profile.homepage) ? (
              <a className="button button--profile" href={data.profile.homepage} target="_blank">{data.profile.homepage}</a>
            ) : data.profile.homepage
          ) : null
        }
        data-avatar={data.profile.avatar || avatarPlaceholder}
      />
      <div className="l-section l-section--profile section">
        <div className="l-container">
          <Profile user={user} accountType={accountType} />
        </div>
      </div>
      <PageUp />
    </Page>
  );
}

const mapStateToProps = (state) => ({
  user: state.user
});

export default connect(mapStateToProps)(ProfilePage);
