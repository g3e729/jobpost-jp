import API from './api';
import { endpoints } from '../constants/routes';

export default class Apply {
  static getApplications({page}) {
    const payload = {
      url: endpoints.APPLICATIONS,
      method: 'get',
      params: {
        page
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static applyJob() {}

  static cancelApplication() {}
}
