import React, { useEffect, useState } from 'react';
import ReactModal from 'react-modal';
ReactModal.setAppElement('#root');
import { connect, useDispatch } from 'react-redux';

import Button from '../common/Button';
import { modalStyles } from '../../constants/config';
import { unsetModal } from '../../actions/modal';

const Modal = (props) => {
  const [modalMarkUp, setModalMarkUp] = useState(_);
  const dispatch = useDispatch();
  const { modalProp } = props;

  const handleCloseModal = _ => {
    dispatch(unsetModal());
  }

  console.log('modalProp :', modalProp);

  return (
    modalProp.visible ? (
      <ReactModal
        isOpen={true}
        contentLabel="Modal"
        style={modalStyles}
      >
        <div className="modal__header modal__header--background">
          <h3 className="modal__header-title">画像の変更</h3>
          <Button className="button--link modal__header-button" onClick={_ => handleCloseModal()}>
            <i className="icon icon-cross text-dark-gray"></i>
          </Button>
        </div>
        <div className="modal__content modal__content--center">
          <i className="icon icon-warning-circle modal__content-icon"></i>
          <p className="modal__content-desc">{`自社★C2Cマッチングプラットフォ
            ーム開発を削除しますか？`}
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
      </ReactModal>
    ) : null
  )
}

const mapStateToProps = (state) => ({
  modalProp: state.modal
});

export default connect(mapStateToProps)(Modal);
