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

  static getApplicationsCompany({page}) {
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

  static getFilteredApplications(params) {
    const {
      page,
      scouted
    } = params;

    const payload = {
      url: endpoints.APPLICATIONS,
      method: 'get',
      params: {
        page,
        scouted,
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

  static scoutJob(formdata) {
    const payload = {
      url: endpoints.APPLY,
      method: 'post',
      data: formdata
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }
}
