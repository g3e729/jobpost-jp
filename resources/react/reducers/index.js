import { combineReducers } from 'redux';
import userReducer from './user';
import modalReducer from './modal';

const rootReducer = combineReducers({
  user: userReducer,
  modal: modalReducer
});

export default rootReducer;
