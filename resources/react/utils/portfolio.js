import API from './api';
import generateRoute from './generateRoute';
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
    const formdata = new FormData();
    formdata.append('_method', 'DELETE');

    const payload = {
      url: generateRoute(endpoints.PORTFOLIOS_DETAIL, { id }),
      method: 'post',
      data: formdata
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }
}
