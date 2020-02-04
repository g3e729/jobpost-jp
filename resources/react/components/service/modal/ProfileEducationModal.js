import React, { useState, useEffect } from 'react';
import Select from 'react-select';
import moment from 'moment';
import { useDispatch, connect } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import Loading from '../../common/Loading';
import Input from '../../common/Input';
import Textarea from '../../common/Textarea';
import Education from '../../../utils/education';
import { unSetModal } from '../../../actions/modal';
import { getUser } from '../../../actions/user';
import { defaultSelectStyles } from '../../../constants/config';

const ProfileEducationModal = ({modal}) => {
  const dispatch = useDispatch();
  const [formValues, setFormValues] = useState({
    school_name: '',
    major: '',
    content: '',
    monthgraduate: moment().format('MM'),
    yeargraduate: moment().year(),
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
    formdata.append('school_name', formValues.school_name);
    formdata.append('major', formValues.major);
    formdata.append('content', formValues.content);
    formdata.append('graduated_at', moment(new Date(
      new Date(`${formValues.yeargraduate}-${formValues.monthgraduate}`)
    )).format('YYYY-MM-DD'));

    if (isUpdate) {
      Education.updateEducation(formdata, modalData.id)
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

          console.log('[Add education ERROR] :', error);
        });
    } else {
      Education.addEducation(formdata)
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

          console.log('[Add education ERROR] :', error);
        });
    }
  }

  useEffect(_ => {
    setFormValues({
      school_name: modalData.school_name,
      major: modalData.major,
      content: modalData.content,
      monthgraduate: modalData.graduated_at ? moment(modalData.graduated_at).format('MM') : moment().format('MM'),
      yeargraduate: modalData.graduated_at ? moment(modalData.graduated_at).year() : moment().year(),
    })
  }, [modalData])

  return (
    <BaseModal title="学歴">
      <div className="modal__content">
        <form className="modal__form" onSubmit={_ => console.log('Submit education')}>
          <div className="modal__form-group">
            <div className="modal__form-group-label">
              学校名
            </div>
            <Input className="modal__form-group-input"
              value={formValues.school_name}
              onChange={e => handleChange(e)}
              name="school_name"
              type="text"
            />
          </div>
          <div className="modal__form-group">
            <div className="modal__form-group-label">
              学部、専攻、学科
            </div>
            <Input className="modal__form-group-input"
              value={formValues.major}
              onChange={e => handleChange(e)}
              name="major"
              type="text"
            />
          </div>

          <div className="modal__form-group">
            <div className="modal__form-group-label">
              卒業
            </div>
            <div className="modal__form-group-inputs  modal__form-group-inputs--education-period">
              <Select options={monthsFilter}
                styles={defaultSelectStyles}
                placeholder={formValues.monthgraduate}
                onChange={e => handleSelect(e, 'monthgraduate')}
              />
              <Select options={yearsFilter}
                styles={defaultSelectStyles}
                placeholder={formValues.yeargraduate}
                onChange={e => handleSelect(e, 'yeargraduate')}
              />
            </div>
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

export default connect(mapStateToProps)(ProfileEducationModal);
