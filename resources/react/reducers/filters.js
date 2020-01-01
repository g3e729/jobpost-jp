const filtersReducer = (state = {}, action) => {
  switch(action.type) {
    case 'FILTERS_SET':
      return {
        ...state,
        filtersData: action.payload
      };
    case 'FILTERS_UNSET':
      return {
        ...state,
        filtersData: {}
      };
    default:
      return state;
  }
}

export default filtersReducer;
