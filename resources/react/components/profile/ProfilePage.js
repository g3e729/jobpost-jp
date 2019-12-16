import React from 'react';
import { connect } from 'react-redux';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Profile from './Profile';

const ProfilePage = (props) => {
  const { user } = props;
  const accountType = (user.userData && user.userData.accountType) || '';

  return (
    accountType === 'student' ? (
      <Page>
        <Heading type="user"
          style={{ backgroundImage: 'url("https://lorempixel.com/1800/600/people/")' }}
          data-avatar="https://lorempixel.com/1800/600/people/"
          title="田中義人"
          subTitle={<span><i className="icon icon-book text-dark-yellow"></i>PHPコース</span>}
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
          style={{ backgroundImage: 'url("https://lorempixel.com/1800/600/people/")' }}
          data-avatar="https://lorempixel.com/1800/600/people/"
          title="株式会社アクターリアリティ"
          subTitle={<span><span className="heading-content__position-location">東京</span>https://hogehoge.com</span>}
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
