import React, { useState, useEffect, createRef } from 'react';
import _ from 'lodash';
import { useDispatch, connect } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import Loading from '../../common/Loading';
import { state } from '../../../constants/state';
import { unSetModal } from '../../../actions/modal';
import { updateUser } from '../../../actions/user';

import ecPlaceholder from '../../../../img/eyecatch-default.jpg';

const ProfileEyecatchModal = ({modal}) => {
  const dispatch = useDispatch();
  const [formValues, setFormValues] = useState({
    cover_photo: '',
    cover_photo_delete: null,
  });
  const [file, setFile] = useState('');
  const [isLoading, setIsLoading] = useState(false);
  const placeholderImg = (modal.data && modal.data.image) || ecPlaceholder;
  const reader = new FileReader();
  const imageInputRef = createRef();
  const eyecatchRef = createRef();

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
      return { ...prevState, cover_photo_delete: 1 }
    });

    eyecatchRef.current.style.backgroundImage = `url("${placeholderImg}")`;
  }

  const handleSubmit = _.debounce(_ => {
    setIsLoading(true);

    const formdata = new FormData();
    formdata.append('cover_photo', formValues.cover_photo || '');
    if (formValues.cover_photo) {
      formdata.append('cover_photo_delete', parseInt(formValues.cover_photo_delete));
    }

    dispatch(updateUser(formdata))
      .then(_ => {
        setIsLoading(false);
        dispatch(unSetModal());
      })
      .catch(error => {
        setIsLoading(false);
        dispatch(unSetModal());

        console.log('[Upload eyecatch ERROR]', error);
      });
  }, 400);

  useEffect(_ => {
    if (file) {
      reader.readAsDataURL(file);
      reader.onload = ev => {
        eyecatchRef.current.style.backgroundImage = `url("${ev.target.result}")`;
        setFormValues(prevState => {
          return { ...prevState, cover_photo: file, cover_photo_delete: 1 }
        });
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
              <div className="modal__form-eyecatch-img" ref={eyecatchRef} style={{ backgroundImage: `url("${(modal.data && modal.data.image) || placeholderImg}")` }}></div>
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
              保存する
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

export default connect(mapStateToProps)(ProfileEyecatchModal);
