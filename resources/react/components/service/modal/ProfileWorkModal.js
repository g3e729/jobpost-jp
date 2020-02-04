import React, { useState, useEffect } from 'react';
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
    is_present: 0,
    monthfrom: moment().format('MM'),
    yearfrom: moment().year(),
    monthto: moment().format('MM'),
    yearto: moment().year(),
  });
  const [isLoading, setIsLoading] = useState(false);
  const [isUpdate, setIsUpdate] = useState(!_.isEmpty(modal.data));
  const modalData = modal.data;
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
      return { ...prevState, [e.target.name]: +e.target.checked }
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
    formdata.append('started_at', moment(new Date(
      new Date(`${formValues.yearfrom}-${formValues.monthfrom}`)
    )).format('YYYY-MM-DD'));

    if (!formValues.is_present) {
      formdata.append('ended_at', moment(new Date(
        new Date(`${formValues.yearto}-${formValues.monthto}`)
      )).format('YYYY-MM-DD'));
    }

    if (isUpdate) {
      Work.updateWork(formdata, modalData.id)
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
    } else {
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
  }

  useEffect(_ => {
    setFormValues({
      company_name: modalData.company_name,
      role: modalData.role,
      content: modalData.content,
      is_present: +modalData.is_present,
      monthfrom: modalData.started_at ? moment(modalData.started_at).format('MM') : moment().format('MM'),
      yearfrom: modalData.started_at ? moment(modalData.started_at).year() : moment().year(),
      monthto: modalData.ended_at ? moment(modalData.ended_at).format('MM') : moment().format('MM'),
      yearto: modalData.ended_at ? moment(modalData.ended_at).year() : moment().year(),
    })
  }, [modalData])

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
                placeholder={formValues.monthfrom}
                onChange={e => handleSelect(e, 'monthfrom')}
              />
              <Select options={yearsFilter}
                styles={defaultSelectStyles}
                placeholder={formValues.yearfrom}
                onChange={e => handleSelect(e, 'yearfrom')}
              />
              <span style={{ flex: 0 }}>-</span>
              <Select options={monthsFilter}
                styles={defaultSelectStyles}
                placeholder={formValues.monthto}
                onChange={e => handleSelect(e, 'monthto')}
                isDisabled={!!formValues.is_present}
              />
              <Select options={yearsFilter}
                styles={defaultSelectStyles}
                placeholder={formValues.yearto}
                onChange={e => handleSelect(e, 'yearto')}
                isDisabled={!!formValues.is_present}
              />
            </div>
            <Radio className="radio--labeled modal__form-group-radio"
              label="在職中"
              checked={!!formValues.is_present}
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

export default connect(mapStateToProps)(ProfileWorkModal);
