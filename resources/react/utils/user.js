import API from './api';
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

  static updateAccount(params) {
    const {
      name
    } = params;

    const payload = {
      url: endpoints.ACCOUNT,
      method: 'post',
      params: {
        name,
        method: '_PATCH'
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }
}
