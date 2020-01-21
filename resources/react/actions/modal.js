export const setModal = (
  payload = '',
  actionId = null,
  actionText = '',
  actionData = {}
) => ({
    type: 'MODAL_SET',
    actionId,
    actionText,
    actionData,
    payload
  });

export const unsetModal = _ => ({
  type: 'MODAL_UNSET'
});
