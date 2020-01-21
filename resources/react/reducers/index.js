import { combineReducers } from 'redux';
import userReducer from './user';
import editReducer from './edit';
import modalReducer from './modal';
import jobsReducer from './jobs';
import myJobsReducer from './myjobs';
import filtersReducer from './filters';

const rootReducer = combineReducers({
  user: userReducer,
  edit: editReducer,
  modal: modalReducer,
  jobs: jobsReducer,
  myJobs: myJobsReducer,
  filters: filtersReducer,
});

export default rootReducer;
