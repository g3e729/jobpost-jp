export const setModal = (payload = '', data = {}) => ({
  type: 'MODAL_SET',
  payload,
  data
});

export const unSetModal = _ => ({
  type: 'MODAL_UNSET'
});
