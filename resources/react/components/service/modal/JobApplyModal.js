import React from 'react';
import { useDispatch, connect } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import Apply from '../../../utils/apply';
import { unsetModal } from '../../../actions/modal';

const JobApplyModal = ({modal}) => {
  const dispatch = useDispatch();

  const handleCloseModal = _ => {
    dispatch(unsetModal());
  }

  const handleApply = _ => {
    Apply.applyJob(modal.actionId)
      .then(_ => {
        handleCloseModal();
        location.reload();
      })
      .catch(error => {
        handleCloseModal();

        console.log('[Job Apply ERROR]', error);
      });
  }

  return (
    <BaseModal title="応募する">
      <div className="modal__content">
        <div className="modal__actions modal__actions--cto">
          <Button className="button--cto" onClick={_ => handleApply()}>
            話を聞いてみたい
          </Button>
          <Button className="button--cto" onClick={_ => handleApply()}>
            すぐに働きたい
          </Button>
        </div>
      </div>
    </BaseModal>
  );
}

const mapStateToProps = (state) => ({
  modal: state.modal
});

export default connect(mapStateToProps)(JobApplyModal);
