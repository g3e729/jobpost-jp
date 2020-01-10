import React, { useState } from 'react';
import { useDispatch } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import Input from '../../common/Input';
import Radio from '../../common/Radio';
import Textarea from '../../common/Textarea';

const ProfileWorkModal = _ => {
  const dispatch = useDispatch(); // TODO on other events
  const [formValues, setFormValues] = useState({
    companyname: '',
    position: '',
    isCurrent: false,
    description: '',
  });

  const handleChange = e => {
    e.persist();

    setFormValues(prevState => {
      return { ...prevState, [e.target.name]: e.target.value }
    });
  }

  const toggleChange = e => {
    e.persist();

    console.log('e :', e.target.checked);
    setFormValues(prevState => {
      return { ...prevState, [e.target.name]: e.target.checked }
    });
  }

  return (
    <BaseModal title="職歴">
      <div className="modal__content">
        <form className="modal__content-form" onSubmit={_ => console.log('Submit work')}>
          <div className="modal__content-form-group">
            <div className="modal__content-form-group-label">
              企業名
            </div>
            <Input className="modal__content-form-group-input"
              value={formValues.companyname}
              onChange={e => handleChange(e)}
              name="companyname"
              type="text"
            />
          </div>
          <div className="modal__content-form-group">
            <div className="modal__content-form-group-label">
              役職
            </div>
            <Input className="modal__content-form-group-input"
              value={formValues.position}
              onChange={e => handleChange(e)}
              name="position"
              type="text"
            />
          </div>
          <div className="modal__content-form-group">
            <div className="modal__content-form-group-label">
              在籍期間
            </div>
            <Radio className="radio--labeled modal__content-form-group-radio"
              label="在職中"
              checked={formValues.isCurrent}
              onChange={e => toggleChange(e)}
              name="isCurrent"
              type="checkbox"
            />
          </div>
          <div className="modal__content-form-group">
            <div className="modal__content-form-group-label">
              学んだこと
            </div>
            <Textarea className="modal__content-form-group-input"
              value={formValues.description}
              onChange={e => handleChange(e)}
              name="description"
              row="4"
            />
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

export default ProfileWorkModal;
