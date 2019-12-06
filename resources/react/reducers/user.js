const initialState = {};

const userReducer = (state = initialState, action) => {
  console.log('action :', action.type);

  switch(action.type) {
    case 'USER_STUDENT_SET':
      return 'dsds';
    case 'USER_COMPANY_SET':
      return action;
    case 'USER_UNSET':
      return initialState;
    default:
      return state;
  }
}

export default userReducer;
