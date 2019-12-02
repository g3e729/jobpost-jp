const initialState = {
};

const userReducer = (state = initialState, action) => {
  switch(action.type) {
    case 'USER_STUDENT_SET':
      return { student } = action;
    case 'COMPANY_SET':
      return { company } = action;
    case 'USER_UNSET':
      return initialState;
    default:
      return state;
  }
}

export default userReducer;
