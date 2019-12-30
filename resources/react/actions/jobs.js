import Job from '../utils/job';

export const setJobs = (payload = '') => ({
  type: 'JOBS_SET',
  payload
});

export const unsetJobs = _ => ({
  type: 'JOBS_UNSET'
});

export const getJobs = _ => {
  return (dispatch) => {
    return Job.getJobs().then((result) => {
      dispatch(setJobs({ ...result.data }));
    }).catch(error => {
      dispatch(unsetJobs());

      console.log('[Jobs]', error);
    })
  }
}

export const getFilteredJobs = (params) => {
  return (dispatch) => {
    return Job.getFilteredJobs(params).then((result) => {
      dispatch(setJobs({ ...result.data }));
    }).catch(error => {
      dispatch(unsetJobs());

      console.log('[Jobs]', error);
    })
  }
}
