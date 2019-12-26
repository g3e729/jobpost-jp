import API from './api';
import { endpoints } from '../constants/routes';
import generateRoute from './generateRoute';

export default class Job {
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
