export const setModal = (
  payload = '',
  actionId = null,
  actionText = '',
  actionImage = null
) => ({
    type: 'MODAL_SET',
    actionId: actionId,
    actionText: actionText,
    actionImage: actionImage,
    payload
  });

export const unsetModal = _ => ({
  type: 'MODAL_UNSET'
});
