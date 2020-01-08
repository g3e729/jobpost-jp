import React from 'react';
import { useDispatch } from 'react-redux';

import Button from '../common/Button';
import { unsetModal } from '../../actions/modal';

const JobDeleteModal = () => {
  const dispatch = useDispatch();

  const handleCloseModal = _ => {
    dispatch(unsetModal());
  }

  return (
    <>
      <div className="modal__header modal__header--background">
        <h3 className="modal__header-title">画像の変更</h3>
        <Button className="button--link modal__header-button" onClick={_ => handleCloseModal()}>
          <i className="icon icon-cross text-dark-gray"></i>
        </Button>
      </div>
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
    </>
  );
}

export default JobDeleteModal;
