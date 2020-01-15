const myJobsReducer = (state = {}, action) => {
  switch(action.type) {
    case 'MY_JOBS_SET':
      return {
        ...state,
        myJobsData: action.payload
      };
    case 'MY_JOBS_UNSET':
      return {
        ...state,
        myJobsData: {}
      };
    default:
      return state;
  }
}

export default myJobsReducer;
