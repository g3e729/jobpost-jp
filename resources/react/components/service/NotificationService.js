import { useDispatch } from 'react-redux';

import useInterval from '../../utils/useInterval';
import { getNotifications } from '../../actions/notifications';

const NotificationService = _ => {
  const dispatch = useDispatch();
  const delay = 10000;

  useInterval(_ => {
    dispatch(getNotifications())
  }, delay);

  return null;
}

export default NotificationService;
