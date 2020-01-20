const initialState = {
  visible: false,
  actionId: null,
  actionImage: null,
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
        actionImage: action.actionImage,
        actionText: action.actionText,
        modalType: action.payload
      };
    case 'MODAL_UNSET':
      return {
        ...state,
        visible: false,
        actionID: null,
        actionImage: null,
        actionText: '',
        modalType: ''
      };
    default:
      return state;
  }
}

export default modalReducer;
