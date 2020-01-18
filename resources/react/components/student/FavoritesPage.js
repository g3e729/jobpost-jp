import React, { useState } from 'react';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Loading from '../common/Loading';
import Nada from '../common/Nada';
import FavoritesSection from './FavoritesSection';

const FavoritesPage = _ => {
  const [isLoading, setIsLoading] = useState(true);
  const [jobs, setJobs] = useState([]);

  return (
    <Page>
      { isLoading ? (
        <Loading className="loading--full" />
      ) : (
        <>
          <Heading type={null}
            title="FAVORITES"
            subTitle="お気に入りの募集"
          />
          { jobs.data && jobs.data.length ? (
            <div className="l-section l-section--main section">
              <div className="l-container">
                <FavoritesSection data={jobs} />
              </div>
            </div>
          ) : (
            <Nada className="nada--full">
              <span className="nada__emphasize">
                No results found.
              </span>
            </Nada>
          )}
        </>
      )}
    </Page>
  );
}

export default FavoritesPage;
