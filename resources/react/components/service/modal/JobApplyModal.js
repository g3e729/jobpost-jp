import React, { useState } from 'react';
import { useDispatch, connect } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import Loading from '../../common/Loading';
import Apply from '../../../utils/apply';
import { unsetModal } from '../../../actions/modal';

const JobApplyModal = ({modal}) => {
  const [isLoading, setIsLoading] = useState(false);
  const dispatch = useDispatch();

  const handleCloseModal = _ => {
    dispatch(unsetModal());
  }

  const handleApply = _ => {
    Apply.applyJob(modal.actionId)
      .then(_ => {
        setIsLoading(true);

        setTimeout(_ => {
          location.reload();
          handleCloseModal();
        }, 500);
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
        { isLoading ? (
          <Loading className="loading--overlay"/>
        ) : null }
      </div>
    </BaseModal>
  );
}

const mapStateToProps = (state) => ({
  modal: state.modal
});

export default connect(mapStateToProps)(JobApplyModal);
