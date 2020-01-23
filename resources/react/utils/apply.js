import API from './api';
import { endpoints } from '../constants/routes';

export default class Apply {
  static getApplications({page}) {
    const payload = {
      url: endpoints.APPLICATIONS,
      method: 'get',
      params: {
        page,
        per_page: 12
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static getApplicationsCompany(params) {
    const {
      page,
    } = params;

    const payload = {
      url: endpoints.APPLICATIONS,
      method: 'get',
      params: {
        page,
        per_page: 12
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static getScoutedApplications({page}) {
    const payload = {
      url: endpoints.APPLICATIONS,
      method: 'get',
      params: {
        page,
        scouted: 1,
        per_page: 12
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static applyJob(id) {
    const payload = {
      url: endpoints.APPLY,
      method: 'post',
      params: {
        job_post_id: id
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static cancelApplyJob(id) {
    const payload = {
      url: endpoints.CANCEL_APPLICATION,
      method: 'post',
      params: {
        job_post_id: id,
        _method: 'DELETE'
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }
}
