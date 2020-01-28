import Message from '../utils/message';

export const setMessages = (payload = '', id = null) => ({
  type: 'MESSAGES_SET',
  payload,
  id
});

export const unsetMessages = _ => ({
  type: 'MESSAGES_UNSET'
});

export const getMessages = (id = null) => {
  return (dispatch) => {
    return Message.getMessages().then(result => {
      dispatch(setMessages(result.data, (result.data.data[0].id || id)));
    }).catch(error => {
      dispatch(unsetMessages());

      console.log('[Messages ERROR]', error);
    })
  }
}
