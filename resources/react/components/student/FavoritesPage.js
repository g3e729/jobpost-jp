import React from 'react';

import Page from '../common/Page';
import Heading from '../common/Heading';
import FavoritesSection from './FavoritesSection';
import PageUp from '../common/PageUp';

const FavoritesPage = _ => {
  return (
    <Page>
      <Heading type={null}
        title="FAVORITES"
        subTitle="お気に入りの募集"
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

export default FavoritesPage;
