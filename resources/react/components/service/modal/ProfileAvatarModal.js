import React, { useState, useEffect, createRef } from 'react';
import { useDispatch } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import { state } from '../../../constants/state';

import avatarPlaceholder from '../../../../img/avatar-default.png';

const ProfileAvatarModal = _ => {
  const dispatch = useDispatch(); // TODO on other events
  const [formAvatar, setFormAvatar] = useState('');
  const [file, setFile] = useState('');
  const reader = new FileReader();
  const imageInputRef = createRef();
  const avatarRef = createRef();

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
    avatarRef.current.style.backgroundImage = `url("${avatarPlaceholder}")`;
  }

  useEffect(_ => {
    if (file) {
      // TODO: Upload file to s3 bucket

      reader.readAsDataURL(file);
      reader.onload = ev => {
        avatarRef.current.style.backgroundImage = `url("${ev.target.result}")`;
      }
    }
  }, [file]);

  return (
    <BaseModal title="画像の変更">
      <div className="modal__content modal__content--center">
        <form className="modal__content-form" onSubmit={_ => console.log('Upload avatar')}>
          <div className="modal__content-form-cluster">
            <input className="input modal__content-form-input"
              onChange={e => handleUpdateFile(e)}
              onClick={e => e.target.value = null}
              ref={imageInputRef}
              accept="image/*"
              type="file"
              style={{ display: 'none' }}
            />
            <div className="modal__content-form-avatar">
              <div className="modal__content-form-avatar-img" ref={avatarRef} style={{ backgroundImage: `url("${avatarPlaceholder}")` }}></div>
            </div>
            <div className="modal__content-form-actions">
              <Button className="button--pill" onClick={e => handleOpenFile(e)}>
                <>
                  <i className="icon icon-image text-dark-yellow"></i>
                  アップロード
                </>
              </Button>
              <Button className={`button--link modal__content-form-actions-button ${!file && state.DISABLED}`}
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

export default ProfileAvatarModal;
