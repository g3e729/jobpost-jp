export const setModal = (
  payload = '',
  data = {}
) => ({
    type: 'MODAL_SET',
    payload,
    data
  });

export const unsetModal = _ => ({
  type: 'MODAL_UNSET'
});
