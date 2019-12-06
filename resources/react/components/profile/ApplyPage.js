import React from 'react';

import Page from '../common/Page';
import Heading from '../common/Heading';
import FavoritesSection from './FavoritesSection';

const ApplyPage = () => {
  return (
    <Page>
      <Heading type={null}
        title="APPLICATION"
        subTitle="応募した募集一覧"
      />
      <div className="l-section l-section--main section">
        <div className="l-container">
          <FavoritesSection />
        </div>
      </div>
    </Page>
  );
}

export default ApplyPage;
