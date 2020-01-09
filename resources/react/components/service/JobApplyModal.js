import React from 'react';
import { useDispatch } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../common/Button';

const JobApplyModal = _ => {
  const dispatch = useDispatch(); // TODO on other events

  return (
    <BaseModal title="応募する">
      <div className="modal__content">
        <div className="modal__actions modal__actions--cto">
          <Button className="button--cto">
            話を聞いてみたい
          </Button>
          <Button className="button--cto">
            話を聞いてみたい
          </Button>
        </div>
      </div>
    </BaseModal>
  );
}

export default JobApplyModal;
