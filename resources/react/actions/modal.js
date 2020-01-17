export const setModal = (payload = '', actionId = null) => ({
  type: 'MODAL_SET',
  actionId: actionId,
  payload
});

export const unsetModal = _ => ({
  type: 'MODAL_UNSET'
});
