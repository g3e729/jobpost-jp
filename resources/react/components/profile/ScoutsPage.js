import React from 'react';

import Page from '../common/Page';
import Heading from '../common/Heading';
import FavoritesSection from './FavoritesSection';

const ScoutsPage = _ => {
  return (
    <Page>
      <Heading type={null}
        title="SCOUT"
        subTitle="スカウト一覧"
      />
      <div className="l-section l-section--main section">
        <div className="l-container">
          <FavoritesSection />
        </div>
      </div>
    </Page>
  );
}

export default ScoutsPage;
