import { combineReducers } from 'redux';
import userReducer from './user';
import modalReducer from './modal';
import jobsReducer from './jobs';
import filtersReducer from './filters';

const rootReducer = combineReducers({
  user: userReducer,
  modal: modalReducer,
  jobs: jobsReducer,
  filters: filtersReducer,
});

export default rootReducer;
