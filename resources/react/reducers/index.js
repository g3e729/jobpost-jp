import { combineReducers } from 'redux';
import userReducer from './user';
import modalReducer from './modal';
import jobsReducer from './jobs';
import myJobsReducer from './myjobs';
import filtersReducer from './filters';
import notificationsReducer from './notifications';

const rootReducer = combineReducers({
  user: userReducer,
  modal: modalReducer,
  jobs: jobsReducer,
  myJobs: myJobsReducer,
  filters: filtersReducer,
  notifications: notificationsReducer,
});

export default rootReducer;
