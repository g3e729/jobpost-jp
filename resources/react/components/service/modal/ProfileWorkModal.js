import React, { useState } from 'react';
import Select from 'react-select';
import moment from 'moment';
import { useDispatch } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import Input from '../../common/Input';
import Radio from '../../common/Radio';
import Textarea from '../../common/Textarea';
import { defaultSelectStyles } from '../../../constants/config';

const ProfileWorkModal = _ => {
  const dispatch = useDispatch(); // TODO on other events
  const [formValues, setFormValues] = useState({
    companyname: '',
    position: '',
    isCurrent: false,
    description: '',
  });
  const monthsFilter = new Array(12)
    .fill(null)
    .map((e, idx) => {
      e = {};
      e.value = (idx < 10) ? `0${idx + 1}`: idx + 1;
      e.label = (idx < 10) ? `0${idx + 1}`: idx + 1;

      return e;
  });
  const yearsFilter = new Array(100)
    .fill(null)
    .map((e, idx) => {
      e = {};
      e.value = (moment().year() - idx);
      e.label = (moment().year() - idx);

      return e;
  });

  const handleChange = e => {
    e.persist();

    setFormValues(prevState => {
      return { ...prevState, [e.target.name]: e.target.value }
    });
  }

  const toggleChange = e => {
    e.persist();

    setFormValues(prevState => {
      return { ...prevState, [e.target.name]: e.target.checked }
    });
  }

  const handleSelect = (e, type) => {
    setFormValues(prevState => {
      return { ...prevState, [type]: e.value }
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
            <div className="modal__content-form-group-inputs">
              <Select options={monthsFilter}
                styles={defaultSelectStyles}
                placeholder='MM'
                onChange={e => handleSelect(e, 'monthfrom')}
              />
              <Select options={yearsFilter}
                styles={defaultSelectStyles}
                placeholder='YYYY'
                onChange={e => handleSelect(e, 'yearfrom')}
              />
              <span style={{ flex: 0 }}>-</span>
              <Select options={monthsFilter}
                styles={defaultSelectStyles}
                placeholder='MM'
                onChange={e => handleSelect(e, 'monthto')}
              />
              <Select options={yearsFilter}
                styles={defaultSelectStyles}
                placeholder='YYYY'
                onChange={e => handleSelect(e, 'yearto')}
              />
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
