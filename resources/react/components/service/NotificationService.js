import { useEffect, useState } from 'react';
import { useDispatch } from 'react-redux';
import { useLocation } from 'react-router-dom';

import useInterval from '../../utils/useInterval';
import { getNotifications } from '../../actions/notifications';

const NotificationService = _ => {
  const dispatch = useDispatch();
  const location = useLocation();
  const urlParams = new URLSearchParams(location.search);
  const delay = 10000;

  useEffect(_ => {
    if (location.pathname.includes('notification')) {
      const page = urlParams.get('page');

      dispatch(getNotifications(page));
    }
  }, [location])

  useInterval(_ => {
    const page = urlParams.get('page');

    dispatch(getNotifications(page))
  }, delay);

  return null;
}

export default NotificationService;
