import React from 'react';

import Page from '../common/Page';
import Heading from '../common/Heading';
import ScoutsSection from './ScoutsSection';

const ScoutsPage = _ => (
  <Page>
    <Heading type={null}
      title="SCOUT"
      subTitle="スカウト"
    />
    <div className="l-section l-section--main section">
      <div className="l-container">
        <ScoutsSection />
      </div>
    </div>
  </Page>
);

export default ScoutsPage;
