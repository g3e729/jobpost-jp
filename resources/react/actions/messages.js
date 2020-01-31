import Message from '../utils/message';

export const setMessages = (payload = '', id = null) => ({
  type: 'MESSAGES_SET',
  payload,
  id
});

export const setMessagesActive = (id = null) => ({
  type: 'MESSAGES_ACTIVE_SET',
  id
});

export const unsetMessages = _ => ({
  type: 'MESSAGES_UNSET'
});

export const getMessages = (id = null) => {
  return (dispatch) => {
    return Message.getMessages().then(result => {
      dispatch(setMessages(result.data, (id || result.data.data[0].id)));
    }).catch(error => {
      dispatch(unsetMessages());

      console.log('[Messages ERROR]', error);
    })
  }
}

export const postMessage = (formdata, id = null) => {
  return (dispatch) => {
    return Message.postMessage(formdata).then(_ => {
      dispatch(getMessages(id))
    }).catch(error => {
      console.log('[Post message ERROR]', error);
    })
  }
}

export const setActiveChannel = id => {
  return (dispatch) => dispatch(setMessagesActive(id));
}
