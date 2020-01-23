import React, { useEffect, useState } from 'react';
import { useLocation } from 'react-router-dom';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Loading from '../common/Loading';
import Nada from '../common/Nada';
import PageUp from '../common/PageUp';
import FavoritesSection from './FavoritesSection';
import Apply from '../../utils/apply';

const ScoutsPage = _ => {
  const location = useLocation();
  const urlParams = new URLSearchParams(location.search);
  const [isLoading, setIsLoading] = useState(true);
  const [jobs, setJobs] = useState([]);

  async function getFilteredApplications() {
    const page = urlParams.get('page');
    const request = await Apply.getFilteredApplications({page, scouted: 1});

    return request.data;
  }

  useEffect(_ => {
    getFilteredApplications()
      .then(res => {
        setJobs(res);
        setIsLoading(false);
      })
      .catch(error => {
        setIsLoading(false);

        console.log('[Scouted Applications ERROR]', error);
      });
  }, [location])

  return (
    <Page>
      { isLoading ? (
        <Loading className="loading--full" />
      ) : (
        <>
          <Heading type={null}
            title="SCOUT"
            subTitle="スカウト一覧"
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
          <PageUp />
        </>
      )}
    </Page>
  );
}

export default ScoutsPage;
