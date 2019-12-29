import { combineReducers } from 'redux';
import userReducer from './user';
import modalReducer from './modal';
import jobsReducer from './jobs';

const rootReducer = combineReducers({
  user: userReducer,
  modal: modalReducer,
  jobs: jobsReducer,
});

export default rootReducer;
