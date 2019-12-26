import axios from 'axios';
import { config } from '../constants/config';

export default class API {
  static request(payload, hasAuth = false) {
    const apiToken = document.querySelector('meta[name="api-token"]').content || localStorage.getItem('api_token');
    const headers = hasAuth ?
      {
        headers: { 'app-auth-token': apiToken }
      } : null

    return axios.request({
      baseURL: config.api.url,
      ...payload,
      ...headers
    });
  }
}
