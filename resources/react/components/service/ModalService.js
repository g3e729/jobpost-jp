import React from 'react';
import ReactModal from 'react-modal';
ReactModal.setAppElement('#root');
import { connect } from 'react-redux';

import JobApplyModal from './JobApplyModal';
import JobDeleteModal from './JobDeleteModal';
import JobStopModal from './JobStopModal';
import StudentScotModal from './StudentScoutModal';
import { modalStyles, modalType } from '../../constants/config';

const ModalService = (props) => {
  const { modal } = props;

  return (
    modal.visible ? (
      <ReactModal
        isOpen={true}
        contentLabel="Modal"
        style={modalStyles}
      >
        {(_ => {
          switch(modal.modalType) {
            case modalType.JOB_APPLY:
              return <JobApplyModal />
            case modalType.JOB_DELETE:
              return <JobDeleteModal />
            case modalType.JOB_STOP:
              return <JobStopModal />
            case modalType.STUDENT_SCOUT:
              return <StudentScotModal />
            default:
              return null
          }
        })()}
      </ReactModal>
    ) : null
  )
}

const mapStateToProps = (state) => ({
  modal: state.modal
});

export default connect(mapStateToProps)(ModalService);
