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
  localStorage.removeItem('api_token');

  return (dispatch) => {
    if (['student', 'company'].includes(accountType)) {
      axios({
        url: endpoints.ACCOUNT,
        method: 'get',
        params: {
          api_token: apiToken
        },
      }).then((result) => {

        if ( result.data.account_type === accountType ) { // check accountType meta integrity
          localStorage.setItem('api_token', apiToken);
          dispatch(setUser({ ...result.data, accountType }));
        } else {
          dispatch(logoutUser());
        }
      }).catch(error => {
        dispatch(logoutUser());

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
    const elLogoutForm = document.querySelector('#js-logout-form');

    localStorage.removeItem('api_token');
    dispatch(unsetUser());

    elLogoutForm.submit();
  }
}
