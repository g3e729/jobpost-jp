const userReducer = (state = {}, action) => {
  switch(action.type) {
    case 'USER_TYPE_SET':
      return {
        ...state,
        userType: action.payload,
        isLogged: true
      };
    case 'USER_UNSET':
      return {
        ...state,
        userType: '',
        isLogged: false
      };
    default:
      return state;
  }
}

export default userReducer;
