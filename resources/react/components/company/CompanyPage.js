import React, { useState, useEffect } from 'react';
import axios from 'axios';

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

  useEffect(_ => {
    (async function getCompany() {
      const apiToken = document.querySelector('meta[name="api-token"]').content || localStorage.getItem('api_token');

      const companyId = props.match.params.id;
      const request = await axios.request({
        url: generateRoute(endpoints.COMPANIES_DETAIL, { id: companyId }),
        baseURL: config.api.url,
        method: 'get',
        headers: {
          'app-auth-token': apiToken
        }
      });

      return request.data;
    })()
    .then(res => setCompany(res));
  }, []);

  return (
    <Page>
      <Heading type="user"
        style={{ backgroundImage: `url("${company.cover_photo || ecPlaceholder}")` }}
        isOwner="false"
        data-avatar={company.avatar || avatarPlaceholder}
        title={company.display_name}
        subTitle={company.homepage}
      />
      <div className="l-section l-section--profile section">
        <div className="l-container">
          <Profile user={company} accountType="company" isOwner="false" />
        </div>
      </div>
    </Page>
  );
}

export default CompanyPage;
