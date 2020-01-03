import React from 'react';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Search from './Search';

const SearchPage = _ => (
  <Page>
    <Heading type={null}
      title="SEARCH RESULTS"
      subTitle="の検索結果"
    />
    <div className="l-section l-section--notifications section">
      <div className="l-container">
        <Search />
      </div>
    </div>
  </Page>
);

export default SearchPage;
