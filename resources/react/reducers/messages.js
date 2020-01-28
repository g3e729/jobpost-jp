const initialState = {
  messagesData: {},
  activeChannel: null
};

const messagesReducer = (state = initialState, action) => {
  switch(action.type) {
    case 'MESSAGES_SET':
      return {
        ...state,
        messagesData: action.payload,
        activeChannel: action.id
      };
    case 'MESSAGES_ACTIVE_SET':
      return {
        ...state,
        activeChannel: action.id
      };
    case 'MESSAGES_UNSET':
      return {
        ...state,
        ...initialState
      };
    default:
      return state;
  }
}

export default messagesReducer;
