import API from './api';
import { endpoints } from '../constants/routes';
import generateRoute from './generateRoute';

export default class Job {
  static getJobs() {
    const payload = {
      url: generateRoute(endpoints.JOBS),
      method: 'get'
    }

    return API.request(payload)
      .then(res => res)
      .catch(error => error);
  }

  static getFilteredJobs(params) {
    const { page, company_profile_id } = params;

    const payload = {
      url: generateRoute(endpoints.JOBS),
      method: 'get',
      params: {
        page,
        company_profile_id
      }
    }

    return API.request(payload)
      .then(res => res)
      .catch(error => error);
  }

  static getJob(id) {
    const payload = {
      url: generateRoute(endpoints.JOB_DETAIL, { id }),
      method: 'get'
    }

    return API.request(payload)
      .then(res => res)
      .catch(error => error);
  }
}
