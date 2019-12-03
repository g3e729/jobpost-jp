import React, { useState, useEffect } from 'react';
import axios from 'axios';

const CompanyPage = (props) => {
  const [company, setCompany] = useState({});

  useEffect(_ => {
    (async function getCompany() {
      const companyId = props.match.params.id;
      const request = await axios.get(`/api/companies/${companyId}`);

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
