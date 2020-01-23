import API from './api';
import { endpoints } from '../constants/routes';
import generateRoute from './generateRoute';

export default class Student {
  static getStudents() {
    const payload = {
      url: endpoints.STUDENTS,
      method: 'get',
      params: {
        per_page: 12
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static getFilteredStudents(params) {
    const {
      page,
      scouted,
      applied,
      liked,
      per_page = 5
    } = params;

    const payload = {
      url: endpoints.STUDENTS,
      method: 'get',
      params: {
        page,
        scouted,
        applied,
        liked,
        per_page
      }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static getStudent(id) {
    const payload = {
      url: generateRoute(endpoints.STUDENT_DETAIL, { id }),
      method: 'get'
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }
}
