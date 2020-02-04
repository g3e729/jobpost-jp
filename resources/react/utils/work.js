import API from './api';
import generateRoute from './generateRoute';
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

  static updateWork(formdata, id) {
    formdata.append('_method', 'PATCH');

    const payload = {
      url: generateRoute(endpoints.WORK_HISTORIES_DETAIL, { id }),
      method: 'post',
      data: formdata
    }

    return API.request(payload, true, true)
      .then(res => res)
      .catch(error => error);
  }

  static deleteWork(id) {
    const formdata = new FormData();
    formdata.append('_method', 'DELETE');

    const payload = {
      url: generateRoute(endpoints.WORK_HISTORIES_DETAIL, { id }),
      method: 'post',
      data: formdata
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }
}
