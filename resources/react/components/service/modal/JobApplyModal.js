import React from 'react';
import { useDispatch, connect } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';

const JobApplyModal = ({modal}) => {
  const dispatch = useDispatch(); // TODO on other events

  const handleClick = _ => {
    console.log('modal :', modal);
  }

  return (
    <BaseModal title="応募する">
      <div className="modal__content">
        <div className="modal__actions modal__actions--cto">
          <Button className="button--cto" onClick={_ => handleClick()}>
            話を聞いてみたい
          </Button>
          <Button className="button--cto" onClick={_ => handleClick()}>
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
