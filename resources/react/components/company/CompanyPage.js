import React, { useState, useEffect } from 'react';
import _ from 'lodash';
import { connect } from 'react-redux';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Profile from '../profile/Profile';
import CompanyAPI from '../../utils/company';

import avatarPlaceholder from '../../../img/avatar-default.png';
import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const CompanyPage = (props) => {
  const [company, setCompany] = useState({});
  const { user } = props;

  async function getCompany() {
    const companyId = props.match.params.id;
    const request = await CompanyAPI.getCompany(companyId);

    return request.data;
  }

  useEffect(_ => {
    getCompany()
      .then(res => setCompany(res))
      .catch(error => console.log('[Company detail ERROR]', error));
  }, []);

  return (
    <Page>
      { !_.isEmpty(company) ? (
        <>
          <Heading type="user"
            style={{ backgroundImage: `url("${company.cover_photo || ecPlaceholder}")` }}
            isOwner="false"
            isLogged={user.isLogged}
            accountType="company"
            title={company.display_name}
            subTitle={company.homepage}
            passedFunction={_ => getCompany().then(res => setCompany(res))}
            data-avatar={company.avatar || avatarPlaceholder}
            data-likes={company.likes_count}
          />
          <div className="l-section l-section--profile section">
            <div className="l-container">
              <Profile user={company} accountType="company" isOwner="false" />
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

export default connect(mapStateToProps)(CompanyPage);
