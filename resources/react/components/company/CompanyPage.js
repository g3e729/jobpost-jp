import React, { useState, useEffect } from 'react';
import axios from 'axios';

import { endpoints } from '../../constants/routes';
import { config } from '../../constants/config';
import generateRoute from '../../utils/generateRoute';

const CompanyPage = (props) => {
  const [company, setCompany] = useState({});

  useEffect(_ => {
    (async function getCompany() {
      const apiToken = document.querySelector('meta[name="api-token"]').content || localStorage.getItem('api_token');

      const companyId = props.match.params.id;
      console.log('companyId :', companyId);
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
    <div className='container py-4'>
      <div className='row justify-content-center'>
        <div className='col-md-8'>
          <div className='card'>
            <div className='card-header'>{company.name}</div>
            <div className='card-body'>
              <p>{company.description}</p>
              <hr />
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default CompanyPage;
