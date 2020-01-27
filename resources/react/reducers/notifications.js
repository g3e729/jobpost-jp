const notificationsReducer = (state = {}, action) => {
  switch(action.type) {
    case 'NOTIFICATIONS_SET':
      return {
        ...state,
        notificationsData: action.payload
      };
    case 'NOTIFICATIONS_UNSET':
      return {
        ...state,
        notificationsData: {}
      };
    default:
      return state;
  }
}

export default notificationsReducer;
