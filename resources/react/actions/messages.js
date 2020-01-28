import Message from '../utils/message';

export const setMessages = (payload = '') => ({
  type: 'MESSAGES_SET',
  payload
});

export const unsetMessages = _ => ({
  type: 'MESSAGES_UNSET'
});

export const getMessages = _ => {
  return (dispatch) => {
    return Message.getMessages().then(result => {
      dispatch(setMessages({ ...result.data }));
    }).catch(error => {
      dispatch(unsetMessages());

      console.log('[Messages ERROR]', error);
    })
  }
}
