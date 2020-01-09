import React from 'react';
import { useDispatch } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';

const ProfileFrameworkModal = _ => {
  const dispatch = useDispatch(); // TODO on other events

  return (
    <BaseModal>
      ...
    </BaseModal>
  )
}

export default ProfileFrameworkModal;
