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

  JOBS: `${prefix}jobs`,
  JOBS_DETAIL: `${prefix}jobs/:id`,

  MESSAGES: `${prefix}messages`, // student, company
  NOTIFICATIONS: `${prefix}notifications`, // student, company

  ABOUT: `${prefix}about`,
  TERMS: `${prefix}terms`,
  HELP: `${prefix}help`,
  PRIVACY: `${prefix}privacy`,
}

export const accessTable = [
  {
    'company': [
      routes.MY_PROFILE,
      routes.PROFILE_SETTINGS,
      routes.PROFILE_EDIT,

      routes.STUDENTS,
      routes.STUDENTS_DETAIL,

      routes.MESSAGES,
      routes.NOTIFICATIONS,
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
    ]
  }
]
