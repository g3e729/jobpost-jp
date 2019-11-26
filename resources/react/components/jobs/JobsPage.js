import React from 'react';

import Page from '../common/Page';
import Slider from '../common/Slider';
import Filter from '../common/Filter';

import JobsList from './JobsList';

const JobsPage = () => (
  <Page>
    <Slider />
    <div className="l-section l-section--main section">
      <div className="l-container l-container--main">
        <Filter />
        <JobsList />
      </div>
    </div>
  </Page>
);

export default JobsPage;
