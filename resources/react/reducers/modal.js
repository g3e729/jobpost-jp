const initialState = {
  visible: false,
  data: {},
  modalType: '',
};

const modalReducer = (state = initialState, action) => {
  switch(action.type) {
    case 'MODAL_SET':
      return {
        ...state,
        visible: true,
        data: action.data,
        modalType: action.payload
      };
    case 'MODAL_UNSET':
      return {
        ...state,
        ...initialState
      };
    default:
      return state;
  }
}

export default modalReducer;
