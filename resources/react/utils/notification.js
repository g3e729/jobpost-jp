import API from './api';
import generateRoute from './generateRoute';
import { endpoints } from '../constants/routes';

export default class Notification {
  static getNotifications() {
    const payload = {
      url: endpoints.NOTIFICATIONS,
      method: 'get'
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static getNotification(id) {
    const payload = {
      url: generateRoute(endpoints.NOTIFICATIONS_DETAIL, { id }),
      method: 'get'
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }
}
