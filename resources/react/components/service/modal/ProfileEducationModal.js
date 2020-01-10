import React, { useState } from 'react';
import Select from 'react-select';
import moment from 'moment';
import { useDispatch } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import Input from '../../common/Input';
import Textarea from '../../common/Textarea';
import { defaultSelectStyles } from '../../../constants/config';

const ProfileEducationModal = _ => {
  const dispatch = useDispatch(); // TODO on other events
  const [formValues, setFormValues] = useState({
    schoolname: '',
    attainment: '',
    monthgraduate: '',
    yeargraduate: '',
    description: '',
  });
  const monthsFilter = new Array(12)
    .fill(null)
    .map((e, idx) => {
      e = {};
      e.value = (idx < 9) ? `0${idx + 1}` : `${idx + 1}`;
      e.label = (idx < 9) ? `0${idx + 1}` : `${idx + 1}`;

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

  const handleSelect = (e, type) => {
    setFormValues(prevState => {
      return { ...prevState, [type]: e.value }
    });
  }

  return (
    <BaseModal title="学歴">
      <div className="modal__content">
        <form className="modal__form" onSubmit={_ => console.log('Submit education')}>
          <div className="modal__form-group">
            <div className="modal__form-group-label">
              学校名
            </div>
            <Input className="modal__form-group-input"
              value={formValues.schoolname}
              onChange={e => handleChange(e)}
              name="schoolname"
              type="text"
            />
          </div>
          <div className="modal__form-group">
            <div className="modal__form-group-label">
              学部、専攻、学科
            </div>
            <Input className="modal__form-group-input"
              value={formValues.attainment}
              onChange={e => handleChange(e)}
              name="attainment"
              type="text"
            />
          </div>

          <div className="modal__form-group">
            <div className="modal__form-group-label">
              卒業
            </div>
            <div className="modal__form-group-inputs">
              <Select options={monthsFilter}
                styles={defaultSelectStyles}
                placeholder='MM'
                onChange={e => handleSelect(e, 'monthgraduate')}
              />
              <Select options={yearsFilter}
                styles={defaultSelectStyles}
                placeholder='YYYY'
                onChange={e => handleSelect(e, 'yeargraduate')}
              />
            </div>
          </div>
          <div className="modal__form-group">
            <div className="modal__form-group-label">
              学んだこと
            </div>
            <Textarea className="modal__form-group-input"
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

export default ProfileEducationModal;
