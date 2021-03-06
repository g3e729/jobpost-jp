import React from 'react';
import { useDispatch, connect } from 'react-redux';
import { useLocation } from 'react-router-dom';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import Job from '../../../utils/job';
import { unSetModal } from '../../../actions/modal';
import { getMyJobs } from '../../../actions/myjobs';

const JobDeleteModal = ({modal}) => {
  const dispatch = useDispatch();
  const location = useLocation();
  const urlParams = new URLSearchParams(location.search);

  const handleCloseModal = _ => {
    dispatch(unSetModal());
  }

  const handleDelete = _ => {
    const page = urlParams.get('page');
    const status = urlParams.get('status');

    Job.deleteMyJob((modal.data && modal.data.id))
      .then(_ => {
        handleCloseModal()
        dispatch(getMyJobs({page, status}))
      })
      .catch(_ => handleCloseModal());
  }

  return (
    <BaseModal>
      <div className="modal__content modal__content--center">
        <i className="icon icon-warning-circle modal__content-icon"></i>
        <p className="modal__content-desc">{`${(modal.data && modal.data.text)}
          ーム開発を削除しますか？`}
        </p>
      </div>
      <div className="modal__footer">
        <div className="modal__actions">
          <Button className="button--large" onClick={_ => handleDelete()}>削除する</Button>
          <Button className="button--link modal__actions-button" onClick={_ => handleCloseModal()}>
            <>
              <i className="icon icon-cross"></i>
              キャンセル
            </>
          </Button>
        </div>
      </div>
    </BaseModal>
  );
}

const mapStateToProps = (state) => ({
  modal: state.modal
});

export default connect(mapStateToProps)(JobDeleteModal);
