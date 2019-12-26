import API from './api';
import { endpoints } from '../constants/routes';
import generateRoute from './generateRoute';

export default class Company {
  static getCompany(id) {
    const payload = {
      url: generateRoute(endpoints.COMPANY_DETAIL, { id }),
      method: 'get'
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }
}
