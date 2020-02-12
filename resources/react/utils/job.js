import API from './api';
import generateRoute from './generateRoute';
import { endpoints } from '../constants/routes';

export default class Job {
  static getJobs() {
    const payload = {
      url: endpoints.JOBS,
      method: 'get'
    }

    return API.request(payload)
      .then(res => res)
      .catch(error => error);
  }

  static getMyJobs(params) {
    const {
      page,
      status,
      applicants,
      excluded
    } = params;

    const payload = {
      url: endpoints.MY_JOBS,
      method: 'get',
      params: {
        page,
        status,
        applicants,
        excluded,
        sort: 'desc'
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static toggleMyJob(id) {
    const formdata = new FormData();
    formdata.append('_method', 'PATCH');

    const payload = {
      url: generateRoute(endpoints.JOB_STATUS, { id }),
      method: 'post',
      data: formdata
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static deleteMyJob(id) {
    const formdata = new FormData();
    formdata.append('_method', 'DELETE');

    const payload = {
      url: generateRoute(endpoints.JOB_DETAIL, { id }),
      method: 'post',
      data: formdata
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static getFilteredJobs(params) {
    const {
      page,
      position,
      employment_type,
      programming_language,
      prefecture,
      sort,
      company_profile_id,
      paginated,
      per_page
    } = params;

    const payload = {
      url: endpoints.JOBS,
      method: 'get',
      params: {
        page,
        position,
        employment_type,
        programming_language,
        prefecture,
        sort,
        company_profile_id,
        paginated,
        per_page
      }
    }

    return API.request(payload)
      .then(res => res)
      .catch(error => error);
  }

  static getLikedJobs({page}) {
    const payload = {
      url: endpoints.JOBS,
      method: 'get',
      params: {
        page,
        liked: 1,
        per_page: 12
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static getJob(id) {
    const payload = {
      url: generateRoute(endpoints.JOB_DETAIL, { id }),
      method: 'get'
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static addJob(formdata) {
    const payload = {
      url: endpoints.JOBS,
      method: 'post',
      data: formdata
    }

    return API.request(payload, true, true)
      .then(res => res.data)
      .catch(error => error);
  }

  static updateJob(formdata, id) {
    formdata.append('_method', 'PATCH');

    const payload = {
      url: generateRoute(endpoints.JOB_DETAIL, { id }),
      method: 'post',
      data: formdata
    }

    return API.request(payload, true, true)
      .then(res => res.data)
      .catch(error => error);
  }
}
