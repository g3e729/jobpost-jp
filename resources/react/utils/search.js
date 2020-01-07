import API from './api';
import { endpoints } from '../constants/routes';

export default class Search {
  static getResults(params) {
    const payload = {
      url: endpoints.SEARCH,
      method: 'get',
      params: {
        search: params.search,
        jobs_page: params.jobs_page,
        companies_page: params.companies_page
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }
}
