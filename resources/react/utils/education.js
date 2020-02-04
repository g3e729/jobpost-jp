import API from './api';
import generateRoute from './generateRoute';
import { endpoints } from '../constants/routes';

export default class Education {
  static addEducation(formdata) {
    const payload = {
      url: endpoints.EDUCATION_HISTORIES,
      method: 'post',
      data: formdata
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static updateEducation(formdata, id) {
    formdata.append('_method', 'PATCH');

    const payload = {
      url: generateRoute(endpoints.EDUCATION_HISTORIES_DETAIL, { id }),
      method: 'post',
      data: formdata
    }

    return API.request(payload, true, true)
      .then(res => res)
      .catch(error => error);
  }

  static deleteEducation(id) {
    const formdata = new FormData();
    formdata.append('_method', 'DELETE');

    const payload = {
      url: generateRoute(endpoints.EDUCATION_HISTORIES_DETAIL, { id }),
      method: 'post',
      data: formdata
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }
}
