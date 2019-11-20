import axios from 'axios';
import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class Companies extends Component {
  constructor () {
    super();
    this.state = {
      companies: []
    };
  }

  componentDidMount () {
    this.getUsers();
  }

  async getUsers() {
    let request = await axios.get('/api/companies');
    let { data } = request.data;
    this.setState({ companies: data });
  }

  render () {
    let { companies } = this.state;

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
    )
  }
}

export default Companies;
