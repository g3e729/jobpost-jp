export const setUser = (student) => ({
  type: 'USER_STUDENT_SET',
  student
});

export const setCompany = (company) => ({
  type: 'USER_COMPANY_SET',
  company
});

export const unsetUser = () => ({
  type: 'USER_UNSET'
});

export const getUser = () => {
  const accountType = document.querySelector('meta[name="account"]').content || 'anon';
  const apiToken = document.querySelector('meta[name="api-token"]').content || '';

  return (dispatch) => {
    dispatch(setUser(accountType));
  }
}
