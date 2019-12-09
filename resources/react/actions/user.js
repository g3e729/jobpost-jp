export const setUser = (payload = '') => ({
  type: 'USER_TYPE_SET',
  payload
});

export const unsetUser = () => ({
  type: 'USER_UNSET'
});

export const getUser = () => {
  const accountType = document.querySelector('meta[name="account"]').content || '';
  const apiToken = document.querySelector('meta[name="api-token"]').content || localStorage.getItem('api_token'); // Todo: check if apitoken exists

  return (dispatch) => {
    if (['student', 'company'].includes(accountType))
      dispatch(setUser(accountType));
    else
      dispatch(unsetUser());
  }
}

export const logoutUser = () => {
  return (dispatch) => {
    dispatch(unsetUser());
  }
}
