export const setModal = (payload = '', actionId = null, actionText = '') => ({
  type: 'MODAL_SET',
  actionId: actionId,
  actionText: actionText,
  payload
});

export const unsetModal = _ => ({
  type: 'MODAL_UNSET'
});
