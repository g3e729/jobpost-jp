const editReducer = (state = {}, action) => {
  switch(action.type) {
    case 'EDIT_SET':
      return true;
    case 'EDIT_UNSET':
      return false;
    default:
      return state;
  }
}

export default editReducer;
