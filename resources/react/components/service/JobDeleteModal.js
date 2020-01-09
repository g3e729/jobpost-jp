import React from 'react';
import { useDispatch } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../common/Button';

const JobDeleteModal = _ => {
  const dispatch = useDispatch(); // TODO on other events

  return (
    <BaseModal>
      <div className="modal__content modal__content--center">
        <i className="icon icon-warning-circle modal__content-icon"></i>
        <p className="modal__content-desc">自社★C2Cマッチングプラットフォ
          ーム開発を削除しますか？
        </p>
      </div>
      <div className="modal__footer">
        <div className="modal__actions">
          <Button className="button--large">削除する</Button>
          <Button className="button--link modal__actions-button">
            <>
              <i className="icon icon-cross"></i>
              キャンセル
            </>
          </Button>
        </div>
      </div>
    </BaseModal>
  );
}

export default JobDeleteModal;
