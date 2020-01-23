import React, { useEffect, useState } from 'react';
import { useLocation } from 'react-router-dom';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Loading from '../common/Loading';
import Nada from '../common/Nada';
import PageUp from '../common/PageUp';
import FavoritesSection from './FavoritesSection';
import Job from '../../utils/job';

const FavoritesPage = _ => {
  const location = useLocation();
  const urlParams = new URLSearchParams(location.search);
  const [isLoading, setIsLoading] = useState(true);
  const [jobs, setJobs] = useState([]);

  async function getLikedJobs() {
    const page = urlParams.get('page');
    const request = await Job.getLikedJobs({page});

    return request.data;
  }

  useEffect(_ => {
    getLikedJobs()
      .then(res => {
        setJobs(res);
        setIsLoading(false);
      })
      .catch(error => {
        setIsLoading(false);

        console.log('[Favorites ERROR]', error);
      });
  }, [location])

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
                <FavoritesSection data={jobs} type="job" />
              </div>
            </div>
          ) : (
            <Nada className="nada--full">
              <span className="nada__emphasize">
                No results found.
              </span>
            </Nada>
          )}
          <PageUp />
        </>
      )}
    </Page>
  );
}

export default FavoritesPage;
