export const prefix = '/app/';

export const routes = {
  ROOT: `${prefix}`,
  JOBS: `${prefix}jobs`,
  JOB_DETAIL: `${prefix}job/:id`,

  LOGIN: `${prefix}login`,

  MY_PROFILE: `${prefix}profile`, // student, company
  PROFILE_EDIT: `${prefix}profile/edit`, // student, company
  PROFILE_SETTINGS: `${prefix}profile/settings`, // student, company

  STUDENT_DETAIL: `${prefix}student/:id`,
  PROFILE_FAV: `${prefix}profile/favorites`, // student
  PROFILE_APPLICATIONS: `${prefix}profile/applications`, // student
  PROFILE_SCOUTS: `${prefix}profile/scouts`, // student

  COMPANY_DETAIL: `${prefix}company/:id`,
  DASHBOARD: `${prefix}dashboard`, // company
  DASHBOARD_PROFILE: `${prefix}dashboard/profile`, // company
  RECRUITMENT: `${prefix}dashboard/recruitment`, // company
  RECRUITMENT_ADD: `${prefix}dashboard/recruitment/add`, // company
  RECRUITMENT_EDIT: `${prefix}dashboard/recruitment/:id/edit`, // company
  CANDIDATES: `${prefix}dashboard/candidates`, // company
  SCOUT: `${prefix}dashboard/scout`, // company
  SCOUTS: `${prefix}scouts`, // company

  SEARCH: `${prefix}search`,

  MESSAGES: `${prefix}messages`, // student, company

  NOTIFICATIONS: `${prefix}notifications`, // student, company
  NOTIFICATIONS_DETAIL: `${prefix}notification/:id`, // student, company

  TERMS: `${prefix}terms`,
  HELP: `${prefix}help`,
  PRIVACY: `${prefix}privacy`,

  SAMPLE: `${prefix}sample`, // TODO: placeholder !!!remove this later!!!
}

export const accessTable = [
  {
    'company': [
      routes.MY_PROFILE,
      routes.PROFILE_EDIT,
      routes.PROFILE_SETTINGS,

      routes.DASHBOARD,
      routes.DASHBOARD_PROFILE,
      routes.RECRUITMENT,
      routes.RECRUITMENT_ADD,
      routes.RECRUITMENT_EDIT,
      routes.CANDIDATES,
      routes.SCOUT,
      routes.SCOUTS,

      routes.MESSAGES,

      routes.NOTIFICATIONS,
      routes.NOTIFICATIONS_DETAIL,
    ]
  },
  {
    'student': [
      routes.MY_PROFILE,
      routes.PROFILE_EDIT,
      routes.PROFILE_SETTINGS,

      routes.PROFILE_FAV,
      routes.PROFILE_APPLICATIONS,
      routes.PROFILE_SCOUTS,

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
  MY_JOBS: '/my-jobs',
  JOBS_FILTER: '/jobs-filters',
  JOB_DETAIL: '/jobs/:id',
  JOB_STATUS: '/jobs/:id/update-status',

  STUDENTS: '/students',
  STUDENTS_FILTERS: '/students-filters',
  STUDENT_DETAIL: '/students/:id',

  COMPANIES: '/companies',
  COMPANIES_FILTERS: '/companies-filters',
  COMPANY_DETAIL: '/companies/:id',

  FEATURES: '/features',
  FEATURES_DETAIL: '/features/:id',

  PORTFOLIOS: '/portfolios',
  PORTFOLIOS_DETAIL: '/portfolios/:id',

  TRANSACTIONS: '/transactions',

  WORK_HISTORIES: '/work-histories',
  WORK_HISTORIES_DETAIL: '/work-histories/:id',

  EDUCATION_HISTORIES: '/education-histories',
  EDUCATION_HISTORIES_DETAIL: '/education-histories/:id',

  APPLY: 'apply',
  APPLICATIONS: 'applications',
  CANCEL_APPLICATION: 'cancel-application',

  LIKE: '/like',

  SEARCH: '/search',

  MESSAGES: '/messages',
  MESSAGES_DETAIL: '/messages/:id',

  NOTIFICATIONS: '/notifications',
  NOTIFICATIONS_DETAIL: '/notifications/:id',
}

