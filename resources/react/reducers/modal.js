const initialState = {
  visible: false,
  modalType: ''
};

const modalReducer = (state = initialState, action) => {
  switch(action.type) {
    case 'MODAL_SET':
      return {
        ...state,
        visible: true,
        modalType: action.payload
      };
    case 'MODAL_UNSET':
      return {
        ...state,
        visible: false,
        modalType: ''
      };
    default:
      return state;
  }
}

export default modalReducer;
