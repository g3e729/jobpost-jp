import Job from '../utils/job';

export const setMyJobs = (payload = '') => ({
  type: 'MY_JOBS_SET',
  payload
});

export const unsetMyJobs = _ => ({
  type: 'MY_JOBS_UNSET'
});

export const getMyJobs = (params) => {
  return (dispatch) => {
    return Job.getMyJobs(params).then(result => {
      dispatch(setMyJobs({ ...result.data }));
    }).catch(error => {
      dispatch(unsetMyJobs());

      console.log('[MyJobs ERROR]', error);
    })
  }
}
