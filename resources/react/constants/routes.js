export const prefix = (process.env.NODE_ENV === 'development') ? '/app/' : '/';

export const routes = {
  ROOT: `${prefix}`,
  MY_PROFILE: `${prefix}profile`,
  PROFILE_FAV: `${prefix}profile/favorites`,
  PROFILE_APPLY: `${prefix}profile/apply`,
  PROFILE_SCOUTS: `${prefix}profile/scouts`,
  PROFILE_SETTINGS: `${prefix}profile/settings`,
  PROFILE_EDIT: `${prefix}profile/edit`,

  LOGIN: `${prefix}login`,

  STUDENTS: `${prefix}students`,
  STUDENTS_DETAIL: `${prefix}students/:id`,

  COMPANIES: `${prefix}companies`,
  COMPANIES_DETAIL: `${prefix}companies/:id`,

  JOBS: `${prefix}jobs`,
  JOBS_DETAIL: `${prefix}jobs/:id`,

  MESSAGES: `${prefix}messages`,
  NOTIFICATIONS: `${prefix}notifications`,

  ABOUT: `${prefix}about`,
  TERMS: `${prefix}terms`,
  HELP: `${prefix}help`,
  PRIVACY: `${prefix}privacy`,
}
