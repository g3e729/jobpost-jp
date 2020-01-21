const initialState = {
  visible: false,
  actionId: null,
  actionData: {},
  actionText: '',
  modalType: '',
};

const modalReducer = (state = initialState, action) => {
  switch(action.type) {
    case 'MODAL_SET':
      return {
        ...state,
        visible: true,
        actionId: action.actionId,
        actionData: action.actionData,
        actionText: action.actionText,
        modalType: action.payload
      };
    case 'MODAL_UNSET':
      return {
        ...state,
        visible: false,
        actionID: null,
        actionData: {},
        actionText: '',
        modalType: ''
      };
    default:
      return state;
  }
}

export default modalReducer;
