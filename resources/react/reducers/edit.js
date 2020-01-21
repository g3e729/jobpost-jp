const editReducer = (state = {}, action) => {
  switch(action.type) {
    case 'EDIT_SET':
      return {
        ...state,
        isEdit: true
      };
    case 'EDIT_UNSET':
      return {
        ...state,
        isEdit: false
      };
    default:
      return state;
  }
}

export default editReducer;
