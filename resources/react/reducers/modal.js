const initialState = {
  visible: false,
  actionId: null,
  modalType: '',
};

const modalReducer = (state = initialState, action) => {
  switch(action.type) {
    case 'MODAL_SET':
      return {
        ...state,
        visible: true,
        actionId: action.actionId,
        modalType: action.payload
      };
    case 'MODAL_UNSET':
      return {
        ...state,
        visible: false,
        actionID: null,
        modalType: ''
      };
    default:
      return state;
  }
}

export default modalReducer;
