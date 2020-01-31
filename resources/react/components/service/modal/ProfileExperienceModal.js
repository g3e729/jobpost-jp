import React, { useEffect, useState } from 'react';
import _ from 'lodash';
import { useDispatch, connect } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import Loading from '../../common/Loading';
import Radio from '../../common/Radio';
import { unSetModal } from '../../../actions/modal';
import { updateUser } from '../../../actions/user';

const ProfileExperienceModal = (props) => {
  const dispatch = useDispatch();
  const [formValues, setFormValues] = useState({});
  const [isLoading, setIsLoading] = useState(false);
  const { filters, modal } = props;
  const data = (filters.filtersData && filters.filtersData.students);
  const modalData = modal.data;
  const experienceFilter = data.experiences;

  const toggleChange = e => {
    e.persist();

    setFormValues(prevState => {
      return { ...prevState, [e.target.name]: e.target.value }
    });
  }

  const handleSubmit = _.debounce(_ => {
    setIsLoading(true);

    const formdata = new FormData();
    Object.keys(formValues).map((item, idx) => {
      formdata.append(item, parseInt(Object.values(formValues)[idx]));
    });

    dispatch(updateUser(formdata))
      .then(_ => {
        setIsLoading(false);
        dispatch(unSetModal());
      })
      .catch(error => {
        setIsLoading(false);
        dispatch(unSetModal());

        console.log('[Submit experience ERROR]', error);
      });
  }, 400);

  useEffect(() => {
    if (experienceFilter) {
      let filterTmp = {...experienceFilter};

      for (const key in filterTmp) {
        if (filterTmp.hasOwnProperty(key)) {
          if (!_.isEmpty(modalData)) {
            filterTmp[key] =
              Object.entries(modalData)
                .find(item => item[1].skill_id == key)[1]
                .skill_rate || 1;
          } else {
            filterTmp[key] = 1;
          }
        }
      }

      setFormValues(filterTmp);
    }
  }, [experienceFilter])

  return (
    <BaseModal title="経験分野">
      <div className="modal__content modal__content--edit-programming">
        <form className="modal__form" onSubmit={_ => console.log('Submit experience')}>
          { Object.keys(experienceFilter).length ? (
            <ul className="modal__form-table modal__form-table--edit-programming">
              <li className="modal__form-table-item modal__form-table-item--header">
                <div className="modal__form-table-item-wrapper">
                  <span className="modal__form-table-item-label"></span>
                  <span className="modal__form-table-item-label">なし</span>
                  <span className="modal__form-table-item-label">半年以内</span>
                  <span className="modal__form-table-item-label">1年以内</span>
                  <span className="modal__form-table-item-label">1年以上</span>
                  <span className="modal__form-table-item-label">２年以上</span>
                </div>
              </li>
              { Object.keys(experienceFilter).map((item, idx) => (
                <li className="modal__form-table-item modal__form-table-item--edit-programming" key={idx}>
                  <div className="modal__form-table-item-wrapper">
                    <div className="modal__form-table-item-key">
                      {Object.values(experienceFilter)[idx]}
                    </div>
                    <Radio className="modal__form-table-item-value"
                      value="1"
                      checked={formValues[Object.keys(experienceFilter)[idx]] == 1}
                      onChange={e => toggleChange(e)}
                      name={item}
                      type="radio"
                      text="なし"
                    />
                    <Radio className="modal__form-table-item-value"
                      value="2"
                      checked={formValues[Object.keys(experienceFilter)[idx]] == 2}
                      onChange={e => toggleChange(e)}
                      name={item}
                      type="radio"
                      text="半年以内"
                    />
                    <Radio className="modal__form-table-item-value"
                      value="3"
                      checked={formValues[Object.keys(experienceFilter)[idx]] == 3}
                      onChange={e => toggleChange(e)}
                      name={item}
                      type="radio"
                      text="1年以内"
                    />
                    <Radio className="modal__form-table-item-value"
                      value="4"
                      checked={formValues[Object.keys(experienceFilter)[idx]] == 4}
                      onChange={e => toggleChange(e)}
                      name={item}
                      type="radio"
                      text="1年以上"
                    />
                    <Radio className="modal__form-table-item-value"
                      value="5"
                      checked={formValues[Object.keys(experienceFilter)[idx]] == 5}
                      onChange={e => toggleChange(e)}
                      name={item}
                      type="radio"
                      text="２年以上"
                    />
                  </div>
                </li>
              )) }
            </ul>
          ) : null }
        </form>
        <div className="modal__actions">
          <Button className="button--icon" onClick={_ => handleSubmit()}>
            <>
              <i className="icon icon-disk"></i>
              保存する
            </>
          </Button>
        </div>
      </div>
      { isLoading ? (
        <Loading className="loading--overlay"/>
      ) : null }
    </BaseModal>
  )
}

const mapStateToProps = (state) => ({
  filters: state.filters,
  modal: state.modal
});

export default connect(mapStateToProps)(ProfileExperienceModal);
