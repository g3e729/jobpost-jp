export const prefix = (process.env.NODE_ENV === 'development') ? '/app/' : '/';

export const routes = {
  ROOT: `${prefix}`,
  MY_PROFILE: `${prefix}profile`, // student, company
  PROFILE_FAV: `${prefix}profile/favorites`, // student
  PROFILE_APPLY: `${prefix}profile/apply`, // student
  PROFILE_SCOUTS: `${prefix}profile/scouts`, // student
  PROFILE_SETTINGS: `${prefix}profile/settings`, // student, company
  PROFILE_EDIT: `${prefix}profile/edit`, // student, company

  LOGIN: `${prefix}login`,

  STUDENTS: `${prefix}students`, // company
  STUDENTS_DETAIL: `${prefix}students/:id`, // company

  COMPANIES: `${prefix}companies`, // !!!NONE!!!
  COMPANIES_DETAIL: `${prefix}companies/:id`, // student
  DASHBOARD: `${prefix}dashboard`, // company
  RECRUITMENT: `${prefix}recruitment`, // company
  RECRUITMENT_ADD: `${prefix}recruitment/add`, // company
  RECRUITMENT_EDIT: `${prefix}recruitment/:id/edit`, // company
  CANDIDATES: `${prefix}candidates`, // company
  SCOUT: `${prefix}scout`, // company

  JOBS: `${prefix}jobs`,
  JOBS_DETAIL: `${prefix}jobs/:id`,

  MESSAGES: `${prefix}messages`, // student, company

  NOTIFICATIONS: `${prefix}notifications`, // student, company
  NOTIFICATIONS_DETAIL: `${prefix}notifications/:id`, // student, company

  TERMS: `${prefix}terms`,
  HELP: `${prefix}help`,
  PRIVACY: `${prefix}privacy`,

  SAMPLE: `${prefix}sample`, // TODO: placeholder !!!remove this later!!!
}

export const accessTable = [
  {
    'company': [
      routes.MY_PROFILE,
      routes.PROFILE_SETTINGS,
      routes.PROFILE_EDIT,

      routes.DASHBOARD,
      routes.RECRUITMENT,
      routes.RECRUITMENT_ADD,
      routes.RECRUITMENT_EDIT,
      routes.CANDIDATES,
      routes.SCOUT,

      routes.STUDENTS,
      routes.STUDENTS_DETAIL,

      routes.MESSAGES,

      routes.NOTIFICATIONS,
      routes.NOTIFICATIONS_DETAIL,
    ]
  },
  {
    'student': [
      routes.MY_PROFILE,
      routes.PROFILE_FAV,
      routes.PROFILE_APPLY,
      routes.PROFILE_SCOUTS,
      routes.PROFILE_SETTINGS,
      routes.PROFILE_EDIT,

      routes.COMPANIES_DETAIL,

      routes.MESSAGES,

      routes.NOTIFICATIONS,
      routes.NOTIFICATIONS_DETAIL,
    ]
  }
];

export const endpoints = {
  ACCOUNT: '/account',
  UPDATE_PASSWORD: '/update-password',

  JOBS: '/jobs',
  JOBS_FILTER: '/jobs-filters',
  JOBS_DETAIL: '/jobs/:id',

  LIKE: '/like',

  MESSAGES: '/messages',
  MESSAGES_DETAIL: '/messages/:id',

  NOTIFICATIONS: '/notifications',
  NOTIFICATIONS_DETAIL: '/notifications/:id',

  COMPANIES: '/companies',
  COMPANIES_FILTERS: '/companies-filters',
  COMPANIES_DETAIL: '/companies/:id',

  STUDENTS: '/students',
  STUDENTS_FILTERS: '/students-filters',
  STUDENTS_DETAIL: '/students/:id',
}

