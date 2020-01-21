import React, { useState, useEffect, createRef } from 'react';
import _ from 'lodash';
import { useDispatch, connect } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import Loading from '../../common/Loading';
import { state } from '../../../constants/state';
import { unSetModal } from '../../../actions/modal';
import { updateUser } from '../../../actions/user';

import avatarPlaceholder from '../../../../img/avatar-default.png';

const ProfileAvatarModal = ({modal}) => {
  const dispatch = useDispatch();
  const [formValues, setFormValues] = useState({
    avatar: '',
    avatar_delete: null,
  });
  const [file, setFile] = useState('');
  const [isLoading, setIsLoading] = useState(false);
  const placeholderImg = (modal.data && modal.data.image) || avatarPlaceholder;
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
    setFormValues(prevState => {
      return { ...prevState, avatar_delete: 1 }
    });

    avatarRef.current.style.backgroundImage = `url("${placeholderImg}")`;
  }

  const handleSubmit = _.debounce(_ => {
    setIsLoading(true);

    const formdata = new FormData();
    formdata.append('avatar', formValues.avatar || '');
    if (formValues.cover_photo) {
      formdata.append('avatar_delete', parseInt(formValues.avatar_delete));
    }

    dispatch(updateUser(formdata))
      .then(_ => {
        setIsLoading(false);
        dispatch(unSetModal());
      })
      .catch(error => {
        setIsLoading(false);
        dispatch(unSetModal());

        console.log('[Upload avatar ERROR]', error);
      });
  }, 400);

  useEffect(_ => {
    if (file) {
      reader.readAsDataURL(file);
      reader.onload = ev => {
        avatarRef.current.style.backgroundImage = `url("${ev.target.result}")`;
        setFormValues(prevState => {
          return { ...prevState, avatar: file, avatar_delete: 1 }
        });
      }
    }
  }, [file]);

  return (
    <BaseModal title="画像の変更">
      <div className="modal__content modal__content--center">
        <form className="modal__form" onSubmit={_ => console.log('Upload avatar')}>
          <div className="modal__form-cluster">
            <input className="input modal__form-input"
              onChange={e => handleUpdateFile(e)}
              onClick={e => e.target.value = null}
              ref={imageInputRef}
              accept="image/*"
              type="file"
              style={{ display: 'none' }}
            />
            <div className="modal__form-avatar">
              <div className="modal__form-avatar-img" ref={avatarRef} style={{ backgroundImage: `url("${(modal.data && modal.data.image) || avatarPlaceholder}")` }}></div>
            </div>
            <div className="modal__form-actions">
              <Button className="button--pill" onClick={e => handleOpenFile(e)}>
                <>
                  <i className="icon icon-image text-dark-yellow"></i>
                  アップロード
                </>
              </Button>
              <Button className={`button--link modal__form-actions-button ${!file ? state.DISABLED : ''}`}
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
          <Button className={`button--icon ${!file ? state.DISABLED : ''}`} onClick={_ => handleSubmit()}>
            <>
              <i className="icon icon-disk"></i>
              セーブ
            </>
          </Button>
        </div>
        { isLoading ? (
          <Loading className="loading--overlay"/>
        ) : null }
      </div>
    </BaseModal>
  )
}

const mapStateToProps = (state) => ({
  modal: state.modal
});

export default connect(mapStateToProps)(ProfileAvatarModal);
