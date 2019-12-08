const userReducer = (state = {}, action) => {
  switch(action.type) {
    case 'USER_TYPE_SET':
      return {
        ...state,
        userType: action.payload,
        loggedIn: true
      };
    case 'USER_UNSET':
      return {
        ...state,
        userType: '',
        loggedIn: false
      };
    default:
      return state;
  }
}

export default userReducer;
