import React from 'react';
import { useDispatch } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';

const ProfileWorkModal = _ => {
  const dispatch = useDispatch(); // TODO on other events

  return (
    <BaseModal title="職歴">
      <div className="modal__content">
        <form className="modal__content-form" onSubmit={_ => console.log('Submit work')}>
          ...
        </form>
        <div className="modal__actions">
          <Button className="button--icon">
            <>
              <i className="icon icon-disk"></i>
              セーブ
            </>
          </Button>
        </div>
      </div>
    </BaseModal>
  )
}

export default ProfileWorkModal;
