import API from './api';
import { endpoints } from '../constants/routes';
import generateRoute from './generateRoute';

export default class Student {
  static getStudents() {
    const payload = {
      url: endpoints.STUDENTS,
      method: 'get',
      // params: { // TODO: Empty return
      //   per_page: 12
      // }
    }

    return API.request(payload, true)
      .then(res => res)
      .catch(error => error);
  }

  static getFilteredStudents(params) {
    const {
      page
    } = params;

    const payload = {
      url: endpoints.STUDENTS,
      method: 'get',
      params: {
        page,
        per_page: 3
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
