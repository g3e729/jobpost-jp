import React, { useState, useEffect } from 'react';
import axios from 'axios';
import _ from 'lodash';

import Page from '../common/Page';
import Heading from '../common/Heading';
import { endpoints } from '../../constants/routes';
import { config } from '../../constants/config';
import generateRoute from '../../utils/generateRoute';

import avatarPlaceholder from '../../../img/avatar-default.png';
import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const JobPage = (props) => {
  const [job, setJob] = useState({});

  async function getJob() {
    const apiToken = document.querySelector('meta[name="api-token"]').content || localStorage.getItem('api_token');

    const jobId = props.match.params.id;
    const request = await axios.request({
      url: generateRoute(endpoints.JOB_DETAIL, { id: jobId }),
      baseURL: config.api.url,
      method: 'get',
      headers: {
        'app-auth-token': apiToken
      }
    });

    return request.data;
  }

  useEffect(_ => {
    getJob()
      .then(res => setJob(res))
      .catch(error => console.log('[Job detail ERROR]', error));
  }, []);

  return (
    <Page>
      { !_.isEmpty(job) ? (
        <>
          <Heading type="job"
            style={{ backgroundImage: `url("${job.cover_photo || ecPlaceholder}")` }}
            isOwner="false"
            data-avatar={job.avatar || avatarPlaceholder}
            passedFunction={_ => getJob().then(res => setJob(res))}
            title={job.display_name}
            subTitle={job.homepage}
          />
          <div className="l-section l-section--job section">
            <div className="l-container">
              Job
            </div>
          </div>
        </>
      ) : (
        null
      )}
    </Page>
  );
}

export default JobPage;
