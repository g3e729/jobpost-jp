import Notification from '../utils/notification';

export const setNotifications = (payload = '') => ({
  type: 'NOTIFICATIONS_SET',
  payload
});

export const unsetNotifications = _ => ({
  type: 'NOTIFICATIONS_UNSET'
});

export const getNotifications = (params) => {
  return (dispatch) => {
    return Notification.getNotifications(params).then(result => {
      dispatch(setNotifications({ ...result.data }));
    }).catch(error => {
      dispatch(unsetNotifications());

      console.log('[Notifications ERROR]', error);
    })
  }
}
