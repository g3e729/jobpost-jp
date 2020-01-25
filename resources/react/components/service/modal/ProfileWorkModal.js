import React, { useState } from 'react';
import Select from 'react-select';
import moment from 'moment';
import { useDispatch, connect } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import Loading from '../../common/Loading';
import Input from '../../common/Input';
import Radio from '../../common/Radio';
import Textarea from '../../common/Textarea';
import Work from '../../../utils/work';
import { unSetModal } from '../../../actions/modal';
import { getUser } from '../../../actions/user';
import { defaultSelectStyles } from '../../../constants/config';

const ProfileWorkModal = ({modal}) => {
  const dispatch = useDispatch();
  const [formValues, setFormValues] = useState({
    company_name: '',
    role: '',
    content: '',
    is_present: false,
    monthfrom: '',
    yearfrom: '',
    monthto: '',
    yearto: '',
  });
  const [isLoading, setIsLoading] = useState(false);
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

  const handleCloseModal = _ => {
    dispatch(unSetModal());
  }

  const handleSubmit = _ => {
    setIsLoading(true);

    const formdata = new FormData();
    formdata.append('company_name', formValues.company_name);
    formdata.append('role', formValues.role);
    formdata.append('content', formValues.content);
    formdata.append('is_present', formValues.is_present);

    Work.addWork(formdata)
      .then(result => {
        setTimeout(_ => {
          dispatch(getUser())
            .then(_ => {
              setIsLoading(false);
              dispatch(unSetModal());
            })
            .catch(error => {
              setIsLoading(false);
              dispatch(unSetModal());
            });
        }, 500);
      })
      .catch(error => {
        setIsLoading(false);
        handleCloseModal();

        console.log('[Add work ERROR] :', error);
      });
  }

  return (
    <BaseModal title="職歴">
      <div className="modal__content">
        <form className="modal__form" onSubmit={_ => console.log('Submit work')}>
          <div className="modal__form-group">
            <div className="modal__form-group-label">
              企業名
            </div>
            <Input className="modal__form-group-input"
              value={formValues.company_name}
              onChange={e => handleChange(e)}
              name="company_name"
              type="text"
            />
          </div>
          <div className="modal__form-group">
            <div className="modal__form-group-label">
              役職
            </div>
            <Input className="modal__form-group-input"
              value={formValues.role}
              onChange={e => handleChange(e)}
              name="role"
              type="text"
            />
          </div>
          <div className="modal__form-group">
            <div className="modal__form-group-label">
              在籍期間
            </div>
            <div className="modal__form-group-inputs modal__form-group-inputs--enrolment-period">
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
            <Radio className="radio--labeled modal__form-group-radio"
              label="在職中"
              checked={formValues.is_present}
              onChange={e => toggleChange(e)}
              name="is_present"
              type="checkbox"
            />
          </div>
          <div className="modal__form-group">
            <div className="modal__form-group-label">
              学んだこと
            </div>
            <Textarea className="modal__form-group-input"
              value={formValues.content}
              onChange={e => handleChange(e)}
              name="content"
              row="4"
            />
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

export default connect(mapStateToProps)(ProfileWorkModal);
