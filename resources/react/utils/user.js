import API from './api';
import generateRoute from './generateRoute';
import { endpoints } from '../constants/routes';

export default class User {
  static whoami() {
    const payload = {
      url: endpoints.ACCOUNT,
      method: 'get',
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static updateEmail(email) {
    const payload = {
      url: endpoints.ACCOUNT,
      method: 'patch',
      params: {
        email,
        method: '_PATCH'
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static updatePassword(password) {
    const payload = {
      url: endpoints.UPDATE_PASSWORD,
      method: 'patch',
      params: {
        password,
        method: '_PATCH'
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static updateUser(formdata) {
    formdata.append('_method', 'PATCH');

    const payload = {
      url: endpoints.ACCOUNT,
      method: 'post',
      data: formdata
    }

    return API.request(payload, true, true)
      .then(res => res)
      .catch(error => error);
  }

  static addFeature(formdata) {
    const payload = {
      url: endpoints.FEATURES,
      method: 'post',
      data: formdata
    }

    return API.request(payload, true, true)
      .then(res => res)
      .catch(error => error);
  }

  static updateFeature(formdata, id) {
    formdata.append('_method', 'PATCH');

    const payload = {
      url: generateRoute(endpoints.FEATURES_DETAIL, { id }),
      method: 'post',
      data: formdata
    }

    return API.request(payload, true, true)
      .then(res => res)
      .catch(error => error);
  }
}
