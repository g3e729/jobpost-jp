import axios from 'axios';
import { endpoints } from '../constants/endpoints';

export const setUser = (payload = '') => ({
  type: 'USER_TYPE_SET',
  payload
});

export const unsetUser = _ => ({
  type: 'USER_UNSET'
});

export const getUser = _ => {
  const accountType = document.querySelector('meta[name="account"]').content || '';
  const apiToken = document.querySelector('meta[name="api-token"]').content || localStorage.getItem('api_token');

  return (dispatch) => {
    if (['student', 'company'].includes(accountType)) {
      axios({
        url: endpoints.ACCOUNT,
        method: 'get',
        params: {
          api_token: apiToken
        },
      }).then((result) => {
        dispatch(setUser({ ...result.data, accountType }));
      }).catch(error => {
        dispatch(unsetUser());

        console.log('[Login]', error);
      });
    }
    else {
      dispatch(unsetUser());
    }
  }
}

export const logoutUser = _ => {
  return (dispatch) => {
    dispatch(unsetUser());
  }
}
