import React, { useEffect, useState } from 'react';
import { useDispatch, connect } from 'react-redux';

import Page from '../common/Page';
import RecruitmentSection from './RecruitmentSection';
import CompanySidebar from './CompanySidebar';
import { getFilteredJobs } from '../../actions/myjobs';

const RecruitmentPage = (props) => {
  const [isLoading, setIsLoading] = useState(true);
  const dispatch = useDispatch();
  const { user } = props;

  useEffect(_ => {
    const companyId = user.userData && user.userData.profile.id;
    dispatch(getFilteredJobs({
      company_profile_id: companyId,
      sort: 'desc'
    }))
      .then(_ => setIsLoading(false))
      .catch(_ => setIsLoading(false));
  }, [])

  return (
    <Page>
      <div className="l-section l-section--full section">
        <div className="l-container l-container--main l-container--full">
          <CompanySidebar />
          <RecruitmentSection isLoading={isLoading} />
        </div>
      </div>
    </Page>
  );
}

const mapStateToProps = (state) => ({
  user: state.user
});

export default connect(mapStateToProps)(RecruitmentPage);
