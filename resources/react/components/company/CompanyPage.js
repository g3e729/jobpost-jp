import React, { useState, useEffect } from 'react';
import axios from 'axios';
import _ from 'lodash';
import { connect } from 'react-redux';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Profile from '../profile/Profile';
import { endpoints } from '../../constants/routes';
import { config } from '../../constants/config';
import generateRoute from '../../utils/generateRoute';

import avatarPlaceholder from '../../../img/avatar-default.png';
import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const CompanyPage = (props) => {
  const [company, setCompany] = useState({});
  const { user } = props;

  async function getCompany() {
    const apiToken = document.querySelector('meta[name="api-token"]').content || localStorage.getItem('api_token');

    const companyId = props.match.params.id;
    const request = await axios.request({
      url: generateRoute(endpoints.COMPANY_DETAIL, { id: companyId }),
      baseURL: config.api.url,
      method: 'get',
      headers: {
        'app-auth-token': apiToken
      }
    });

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
            data-likes={company.total_likes}
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
