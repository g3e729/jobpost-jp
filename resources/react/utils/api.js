import axios from 'axios';
import { config } from '../constants/config';

export default class API {
  static request(payload, hasAuth = false, multipart = false) {
    const apiToken = document.querySelector('meta[name="api-token"]').content || localStorage.getItem('api_token');

    const headerAppAuth = hasAuth ? { 'app-auth-token': apiToken } : null;
    const headerMultipart = multipart ? { 'content-type': 'multipart/form-data' } : null;

    let headers = hasAuth ? {
      headers: {
        ...headerAppAuth,
        ...headerMultipart
      }
    } : null

    return axios.request({
      baseURL: config.api.url,
      ...payload,
      ...headers
    });
  }
}

axios.interceptors.request.use(config => {
  if (process.env.NODE_ENV === 'development') {
    console.log('[API QUERY] :', config);
  }

  return config;
}, error => {
  return Promise.reject(error);
});
