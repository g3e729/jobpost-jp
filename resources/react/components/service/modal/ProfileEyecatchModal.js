import React, { useState, useEffect, createRef } from 'react';
import { useDispatch, connect } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import { state } from '../../../constants/state';
import { unsetModal } from '../../../actions/modal';

import ecPlaceholder from '../../../../img/eyecatch-default.jpg';

const ProfileEyecatchModal = ({modal}) => {
  const dispatch = useDispatch();
  const [file, setFile] = useState('');
  const [hasFile, setHasFile] = useState(!modal.actionImage.includes('eyecatch-default') && true);
  const [placeholderImg, setPlaceholderImg] = useState(modal.actionImage || ecPlaceholder);
  const reader = new FileReader();
  const imageInputRef = createRef();
  const eyecatchRef = createRef();
  const [formValues, setFormValues] = useState({
    cover_photo: '',
    cover_photo_delete: null,
  });

  const handleUpdateFile = e => {
    setFile(e.target.files[0]);
  }

  const handleOpenFile = e => {
    e.preventDefault();

    imageInputRef.current.click();
  }

  const handleRemoveFile = e => {
    e.preventDefault();

    setFile('');
    eyecatchRef.current.style.backgroundImage = `url("${placeholderImg}")`;
  }

  const handleSubmit = _ => {
    // TODO: handle cover_photo change

    dispatch(unsetModal());
  }

  useEffect(_ => {
    if (file) {
      reader.readAsDataURL(file);
      reader.onload = ev => {
        eyecatchRef.current.style.backgroundImage = `url("${ev.target.result}")`;
      }
    }
  }, [file]);

  return (
    <BaseModal title="画像の変更">
      <div className="modal__content modal__content--center">
        <form className="modal__form" onSubmit={_ => console.log('Upload eyecatch')}>
          <div className="modal__form-cluster">
            <input className="input modal__form-input"
              onChange={e => handleUpdateFile(e)}
              onClick={e => e.target.value = null}
              ref={imageInputRef}
              accept="image/*"
              type="file"
              style={{ display: 'none' }}
            />
            <div className="modal__form-eyecatch">
              <div className="modal__form-eyecatch-img" ref={eyecatchRef} style={{ backgroundImage: `url("${modal.actionImage || placeholderImg}")` }}></div>
            </div>
            <div className="modal__form-actions">
              <Button className="button--pill" onClick={e => handleOpenFile(e)}>
                <>
                  <i className="icon icon-image text-dark-yellow"></i>
                  アップロード
                </>
              </Button>
              <Button className={`button--link modal__form-actions-button ${!file && state.DISABLED}`}
                onClick={e => handleRemoveFile(e)}>
                <>
                  <i className="icon icon-cross"></i>
                  画像を削除
                </>
              </Button>
            </div>

          </div>
        </form>
        <div className="modal__actions">
          <Button className="button--icon" onClick={_ => handleSubmit()}>
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

const mapStateToProps = (state) => ({
  modal: state.modal
});

export default connect(mapStateToProps)(ProfileEyecatchModal);
