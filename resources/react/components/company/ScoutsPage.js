import React, { useEffect, useState } from 'react';
import { useHistory, useLocation } from 'react-router-dom';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Loading from '../common/Loading';
import Nada from '../common/Nada';
import ScoutsSection from './ScoutsSection';
import Apply from '../../utils/apply';
import Job from '../../utils/job';
import { prefix } from '../../constants/routes';

const ScoutsPage = _ => {
  const history = useHistory();
  const location = useLocation();
  const urlParams = new URLSearchParams(location.search);
  const [isLoading, setIsLoading] = useState(true);
  const [jobs, setJobs] = useState([]);

  async function getMyJobs() {
    const page = urlParams.get('page');
    const request = await Job.getMyJobs({page, status: 1});

    return request.data;
  }

  useEffect(_ => {
    if (!localStorage.getItem('seeker_id')) {
      history.push(`${prefix}dashboard/scout`);
    }
  }, [])

  useEffect(_ => {
    getMyJobs()
      .then(res => {
        setJobs(res);
        setIsLoading(false);
      })
      .catch(error => {
        setIsLoading(false);

        console.log('[Scouts ERROR]', error);
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
            subTitle="スカウト"
          />
          { jobs.data && jobs.data.length ? (
            <div className="l-section l-section--main section">
              <div className="l-container">
                <ScoutsSection data={jobs} />
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

export default ScoutsPage;
