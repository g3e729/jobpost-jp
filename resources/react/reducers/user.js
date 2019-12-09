const userReducer = (state = {}, action) => {
  switch(action.type) {
    case 'USER_TYPE_SET':
      return {
        ...state,
        userData: action.payload,
        isLogged: true
      };
    case 'USER_UNSET':
      return {
        ...state,
        userData: {},
        isLogged: false
      };
    default:
      return state;
  }
}

export default userReducer;
