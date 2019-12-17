const initialState = {
  visible: false,
  message: ''
};

const modalReducer = (state = initialState, action) => {
  switch(action.type) {
    case 'MODAL_SET':
      return {
        ...state,
        visible: true,
        message: action.payload
      };
    case 'MODAL_UNSET':
      return {
        ...state,
        visible: false,
        message: ''
      };
    default:
      return state;
  }
}

export default modalReducer;
