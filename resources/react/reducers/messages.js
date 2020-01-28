const messagesReducer = (state = {}, action) => {
  switch(action.type) {
    case 'MESSAGES_SET':
      return {
        ...state,
        messagesData: action.payload
      };
    case 'MESSAGES_UNSET':
      return {
        ...state,
        messagesData: {}
      };
    default:
      return state;
  }
}

export default messagesReducer;
