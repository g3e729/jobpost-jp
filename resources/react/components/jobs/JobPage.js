import React, { useState, useEffect } from 'react';
import _ from 'lodash';
import { connect } from 'react-redux';

import Page from '../common/Page';
import Four0FourPage from '../common/404';
import Heading from '../common/Heading';
import Loading from '../common/Loading';
import Job from './Job';
import JobAPI from '../../utils/job';

import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const JobPage = (props) => {
  const [job, setJob] = useState({});
  const [jobData, setJobData] = useState({});
  const [hasLiked, setHasLiked] = useState(false);
  const [isLoading, setIsLoading] = useState(true);
  const { user } = props;
  const accountType = (user.userData && user.userData.account_type) || '';

  async function getJob() {
    const jobId = props.match.params.id;
    const request = await JobAPI.getJob(jobId);

    return request.data;
  }

  useEffect(_ => {
    getJob()
      .then(res => {
        setJob(res);
        setIsLoading(false);

        const programming_language = res.programming_language ? { programming_language: res.programming_language} : null;
        const prefecture = res.prefecture ? { prefecture: res.prefecture } : null;

        setJobData({
          companyAvatar: res.company.avatar,
          companyName: res.company.company_name,
          time: res.created_at,
          pills: {
            ...programming_language,
            ...prefecture
            // ...TODO date ago from registration?
          }
        })
      })
      .catch(error => {
        setIsLoading(false);

        console.log('[Job detail ERROR]', error);
      });
  }, []);

  useEffect(() => {
    if (user.isLogged && !_.isEmpty(job)) {
      const { userData } = user;

      setHasLiked(job.likes.some(like => {
        return like.liker_id == userData.api_token
      }));
    }
  }, [user, job])

  return (
    <Page>
      { isLoading ? (
        <Loading className="loading--full" />
      ) : (
        !_.isEmpty(job) ? (
          <>
            <Heading type="job"
              style={{ backgroundImage: `url("${job.cover_photo || ecPlaceholder}")` }}
              isOwner="false"
              isLogged={user.isLogged}
              accountType={accountType}
              passedFunction={_ => getJob().then(res => setJob(res))}
              hasLiked={hasLiked}
              jobData={jobData}
              title={job.title}
              subTitle={job.homepage}
              data-likes={job.likes_count}
            />
            <div className="l-section l-section--job section">
              <div className="l-container">
                <Job job={job} />
              </div>
            </div>
          </>
        ) : (
          <Four0FourPage />
        )
      )}
    </Page>
  );
}

const mapStateToProps = (state) => ({
  user: state.user
});

export default connect(mapStateToProps)(JobPage);
