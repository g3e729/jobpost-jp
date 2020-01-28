import API from './api';
import { endpoints } from '../constants/routes';

export default class Message {
  static getMessages() {
    const payload = {
      url: endpoints.MESSAGES,
      method: 'get'
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static postMessage(formdata) {
    const payload = {
      url: endpoints.MESSAGES,
      method: 'post',
      data: formdata
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }
}
