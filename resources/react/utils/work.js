import API from './api';
import { endpoints } from '../constants/routes';

export default class Work {
  static addWork(formdata) {
    const payload = {
      url: endpoints.WORK_HISTORIES,
      method: 'post',
      data: formdata
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static deleteWork(id) {
    formdata.append('_method', 'DELETE');

    const payload = {
      url: endpoints.WORK_HISTORIES,
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
