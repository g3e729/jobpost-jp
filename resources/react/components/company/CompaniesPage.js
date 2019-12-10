import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';

const CompaniesPage = _ => {
  const [companies, setCompanies] = useState([]);

  useEffect(_ => {
    (async function getCompanies() {
      const request = await axios.get('/api/companies');
      const { data } = request.data;

      return data;
    })()
    .then(res => setCompanies(res));
  }, []);

  return (
    <div className='container py-4'>
      <div className='row justify-content-center'>
        <div className='col-md-8'>
          <div className='card'>
            <div className='card-header'>All Companies</div>
            <div className='card-body'>
              <ul className='list-group list-group-flush'>
                {companies.map(company => (
                  <Link
                    className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
                    to={`/react/companies/${company.id}`}
                    key={company.id}
                  >
                    {company.name}
                    <span className='badge badge-primary badge-pill'>
                      {company.created_at} <br/>
                    </span>
                  </Link>
                ))}
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default CompaniesPage;
