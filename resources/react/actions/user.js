import User from '../utils/user';

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
      return User.whoami().then(result => {
        if ( result.data.account_type === accountType ) { // check accountType meta integrity
          localStorage.setItem('api_token', apiToken);
          dispatch(setUser({ ...result.data }));
        } else {
          dispatch(logoutUser());
        }
      }).catch(error => {
        dispatch(logoutUser());

        console.log('[Login ERROR]', error);
      });
    }
    else {
      dispatch(unsetUser());
    }
  }
}

export const updateUserEmail = (email = '') => {
  return (dispatch) => {
    return User.updateEmail(email)
      .then(result => {
        dispatch(setUser({ ...result.data }));

        return result;
      }).catch(error => {
        console.log('[Update email ERROR]', error);
        return error;
      });
  }
}

export const updateUserPass = (password = '') => {
  return (dispatch) => {
    return User.updatePassword(password)
      .then(result => {
        dispatch(setUser({ ...result.data }));

        return result;
      }).catch(error => {
        console.log('[Update password ERROR]', error);
        return error;
      });
  }
}

export const updateUser = (params) => {
  return (dispatch) => {
    return User.updateUser(params)
      .then(result => {
        dispatch(setUser({ ...result.data }));
        return result;
      })
      .catch(error => {
        console.log('[Update user ERROR]', error);
        return error;
      })
  }
}

export const addUserFeature = (params) => {
  return (dispatch) => {
    return User.addFeature(params)
      .then(result => {
        dispatch(getUser());
        return result;
      })
      .catch(error => {
        console.log('[Add feature ERROR]', error);
        return error;
      })
  }
}

export const updateUserFeature = (params, id) => {
  return (dispatch) => {
    return User.updateFeature(params, id)
      .then(result => {
        dispatch(getUser());
        return result;
      })
      .catch(error => {
        console.log('[Add feature ERROR]', error);
        return error;
      })
  }
}

export const logoutUser = _ => {
  return _ => {
    const elLogoutForm = document.querySelector('#js-logout-form');

    localStorage.removeItem('api_token');
    unsetUser();

    elLogoutForm.submit();
  }
}
