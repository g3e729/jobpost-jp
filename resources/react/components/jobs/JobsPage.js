import React from 'react';

import Page from '../common/Page';
import Slider from '../common/Slider';
import Filter from '../common/Filter';
import PageScroll from '../common/PageScroll';
import JobsList from './JobsList';

const JobsPage = () => (
  <React.Fragment>
    <PageScroll />
    <Page>
      <Slider />
      <div className="l-section l-section--main section">
        <div className="l-container l-container--main">
          <Filter />
          <JobsList />
        </div>
      </div>
    </Page>
  </React.Fragment>
);

export default JobsPage;
