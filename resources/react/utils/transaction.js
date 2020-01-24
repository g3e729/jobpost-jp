import API from './api';
import { endpoints } from '../constants/routes';

export default class Transaction {
  static addTransaction(formdata) {
    const payload = {
      url: endpoints.TRANSACTIONS,
      method: 'post',
      data: formdata
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }
}
