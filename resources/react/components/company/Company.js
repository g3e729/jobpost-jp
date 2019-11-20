import axios from 'axios';
import React, { Component } from 'react';

class Company extends Component {
  constructor (props) {
    super(props);
    this.state = {
      company: {}
    };
  }

  componentDidMount () {
    const companyId = this.props.match.params.id;

    axios.get(`/api/companies/${companyId}`).then(response => {
      this.setState({
        company: response.data,
      })
    });
  }

  render () {
    const { company } = this.state;

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
    )
  }
}

export default Company;
