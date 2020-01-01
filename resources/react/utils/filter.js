import API from './api';
import { endpoints } from '../constants/routes';

export default class Filter {
  static getFilters() {
    const payload = {
      url: endpoints.JOBS_FILTER,
      method: 'get'
    }

    return API.request(payload)
      .then(res => res)
      .catch(error => error);
  }
}
