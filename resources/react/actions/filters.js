import Filter from '../utils/filter';

export const setFilters = (payload = '') => ({
  type: 'FILTERS_SET',
  payload
});

export const unsetFilters = _ => ({
  type: 'FILTERS_UNSET'
});

export const getFilters = _ => {
  return (dispatch) => {
    return Filter.getFilters().then((result) => {
      dispatch(setFilters({ ...result.data }));
    }).catch(error => {
      dispatch(unsetFilters());

      console.log('[Filters]', error);
    })
  }
}
