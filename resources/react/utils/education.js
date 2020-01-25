import API from './api';
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

  static deleteEducation(id) {
    formdata.append('_method', 'DELETE');

    const payload = {
      url: endpoints.EDUCATION_HISTORIES,
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
