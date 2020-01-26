import API from './api';
import { endpoints } from '../constants/routes';

export default class Portfolio {
  static addPortfolio(formdata) {
    const payload = {
      url: endpoints.PORTFOLIOS,
      method: 'post',
      data: formdata
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static deletePortfolio(id) {
    const payload = {
      url: endpoints.PORTFOLIOS,
      method: 'post',
      params: {
        id
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }
}
