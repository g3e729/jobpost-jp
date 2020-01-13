import API from './api';
import { endpoints } from '../constants/routes';
import generateRoute from './generateRoute';

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

  static getFilteredJobs(params) {
    const {
      page,
      position,
      employment_type,
      programming_language,
      prefecture,
      sort,
      company_profile_id
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
        company_profile_id
      }
    }

    return API.request(payload)
      .then(res => res)
      .catch(error => error);
  }

  static getJob(id) {
    const payload = {
      url: generateRoute(endpoints.JOB_DETAIL, { id }),
      method: 'get'
    }

    return API.request(payload)
      .then(res => res)
      .catch(error => error);
  }

  static addJob(params) {
    const {
      title,
      description,
      eyecatch,
      position,
      programming_language,
      framework,
      database,
      management,
      requirements,
      total_applicants,
      annual_income,
      working_hours,
      holidays,
      benefits,
      incentive,
      promotion,
      insurance,
      trial_period,
      selection_flow,
      address1,
      address2,
      address3,
      prefecture,
    } = params;

    const payload = {
      url: endpoints.JOBS,
      method: 'post',
      data: {
        title,
        description,
        // eyecatch,
        position,
        programming_language,
        framework,
        database,
        management,
        // requirements,
        // total_applicants,
        // annual_income,
        // working_hours,
        // holidays,
        // benefits,
        // incentive,
        // promotion,
        // insurance,
        // trial_period,
        // selection_flow,
        address1,
        address2,
        address3,
        prefecture,
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);

  }
}
