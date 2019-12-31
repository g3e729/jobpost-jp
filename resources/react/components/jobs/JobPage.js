import React, { useState, useEffect } from 'react';
import _ from 'lodash';
import { connect } from 'react-redux';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Job from './Job';
import JobAPI from '../../utils/job';

import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const JobPage = (props) => {
  const [job, setJob] = useState({});
  const { user } = props;
  const accountType = (user.userData && user.userData.account_type) || '';

  async function getJob() {
    const jobId = props.match.params.id;
    const request = await JobAPI.getJob(jobId);

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
            isLogged={user.isLogged}
            accountType={accountType}
            passedFunction={_ => getJob().then(res => setJob(res))}
            title={job.display_name}
            subTitle={job.homepage}
            data-likes={job.total_likes}
          />
          <div className="l-section l-section--job section">
            <div className="l-container">
              <Job />
            </div>
          </div>
        </>
      ) : (
        null
      )}
    </Page>
  );
}

const mapStateToProps = (state) => ({
  user: state.user
});

export default connect(mapStateToProps)(JobPage);