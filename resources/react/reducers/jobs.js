const jobsReducer = (state = {}, action) => {
  switch(action.type) {
    case 'JOBS_SET':
      return {
        ...state,
        jobsData: action.payload
      };
    case 'JOBS_UNSET':
      return {
        ...state,
        jobsData: {}
      };
    default:
      return state;
  }
}

export default jobsReducer;
