export const setModal = (payload = '') => ({
  type: 'MODAL_SET',
  payload
});

export const unsetModal = _ => ({
  type: 'MODAL_UNSET'
});
