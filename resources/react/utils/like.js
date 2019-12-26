import API from './api';
import { endpoints } from '../constants/routes';

export default class Like {
  static toggleLike(type, type_id) {
    const payload = {
      url: endpoints.LIKE,
      method: 'post',
      params: {
        type,
        type_id
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }
}
