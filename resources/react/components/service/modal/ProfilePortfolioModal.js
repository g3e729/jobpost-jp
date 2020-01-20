import React, { useState, useEffect, createRef } from 'react';
import { useDispatch } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import Input from '../../common/Input';
import Textarea from '../../common/Textarea';
import { state } from '../../../constants/state';

import ecPlaceholder from '../../../../img/eyecatch-default.jpg';

const ProfilePortfolioModal = _ => {
  const dispatch = useDispatch(); // TODO on other events
  const [formValues, setFormValues] = useState({
    title: '',
    eyecatch: '',
    description: '',
    url: '',
  });
  const [file, setFile] = useState('');
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
    eyecatchRef.current.style.backgroundImage = `url("${ecPlaceholder}")`;
  }

  const handleChange = e => {
    e.persist();

    setFormValues(prevState => {
      return { ...prevState, [e.target.name]: e.target.value }
    });
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
    <BaseModal title="ポートフォリオ">
      <div className="modal__content">
        <form className="modal__form" onSubmit={_ => console.log('Submit portfolio')}>
          <div className="modal__form-portfolio">
            <div className="modal__form-portfolio-left">
              <div className="modal__form-cluster">
                <input className="input modal__form-input"
                  onChange={e => handleUpdateFile(e)}
                  onClick={e => e.target.value = null}
                  ref={imageInputRef}
                  accept="image/*"
                  type="file"
                  style={{ display: 'none' }}
                />
                <div className="modal__form-eyecatch modal__form-eyecatch--portfolio">
                  <div className="modal__form-eyecatch-img" ref={eyecatchRef} style={{ backgroundImage: `url("${ecPlaceholder}")` }}></div>
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
            </div>
            <div className="modal__form-portfolio-right">
              <div className="modal__form-group">
                <div className="modal__form-group-label">
                  タイトル
                </div>
                <Input className="modal__form-group-input"
                  value={formValues.title}
                  onChange={e => handleChange(e)}
                  name="title"
                  type="text"
                />
              </div>
              <div className="modal__form-group">
                <div className="modal__form-group-label">
                  内容
                </div>
                <Textarea className="modal__form-group-input"
                  value={formValues.description}
                  onChange={e => handleChange(e)}
                  name="description"
                  row="4"
                />
              </div>
              <div className="modal__form-group">
                <div className="modal__form-group-label">
                  URL
                </div>
                <Input className="modal__form-group-input"
                  value={formValues.url}
                  onChange={e => handleChange(e)}
                  name="url"
                  type="url"
                />
              </div>

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

export default ProfilePortfolioModal;
