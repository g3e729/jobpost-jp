import React from 'react';

import Page from '../common/Page';
import Slider from '../common/Slider';
import PageScroll from '../common/PageScroll';
import JobsFilter from './JobsFilter';
import JobsSection from './JobsSection';

const JobsPage = _ => (
  <>
    <PageScroll />
    <Page>
      <Slider />
      <div className="l-section l-section--main section">
        <div className="l-container l-container--main">
          <JobsFilter />
          <JobsSection />
        </div>
      </div>
    </Page>
  </>
);

export default JobsPage;
