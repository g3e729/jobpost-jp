import React from 'react';

import Page from '../common/Page';
import Heading from '../common/Heading';
import FavoritesSection from './FavoritesSection';
import PageUp from '../common/PageUp';

const ApplyPage = _ => {
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
      <PageUp />
    </Page>
  );
}

export default ApplyPage;
