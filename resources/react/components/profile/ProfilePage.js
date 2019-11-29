import React from 'react';

import Page from '../common/Page';
import Heading from  '../common/Heading';
import ProfileContent from './ProfileContent';

const ProfilePage = () => (
  <Page>
    <Heading type="student"
      style={{ backgroundImage: 'url("https://lorempixel.com/1800/600/people/")' }}
      data-avatar="https://lorempixel.com/1800/600/people/"
      title="田中義人"
      subTitle={<span><i className="icon icon-book text-dark-yellow"></i>PHPコース</span>}
    />
    <ProfileContent />
  </Page>
)

export default ProfilePage;
