import React, { useState } from 'react';

import Page from '../common/Page';
import Heading from '../common/Heading';

import avatarPlaceholder from '../../../img/avatar-default.png';
import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const JobPage = (props) => {
  const [job, setJob] = useState({});

  return (
    <Page>
      <Heading type="job"
        style={{ backgroundImage: `url("${job.cover_photo || ecPlaceholder}")` }}
        isOwner="false"
        data-avatar={job.avatar || avatarPlaceholder}
        title={job.display_name}
        subTitle={job.homepage}
      />
      <div className="l-section l-section--profile section">
        <div className="l-container">
          Job
        </div>
      </div>
    </Page>
  );
}

export default JobPage;
