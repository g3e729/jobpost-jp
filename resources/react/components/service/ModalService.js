import React from 'react';
import ReactModal from 'react-modal';
ReactModal.setAppElement('#root');
import { connect } from 'react-redux';

import JobDeleteModal from './JobDeleteModal';
import JobStopModal from './JobStopModal';
import { modalStyles, modalType } from '../../constants/config';

const ModalService = (props) => {
  const { modalProp } = props;

  return (
    modalProp.visible ? (
      <ReactModal
        isOpen={true}
        contentLabel="Modal"
        style={modalStyles}
      >
        {(_ => {
          switch(modalProp.modalType) {
            case modalType.JOB_DELETE:
              return <JobDeleteModal />
              break;
            case modalType.JOB_STOP:
              return <JobStopModal />
              break;
            default:
              return null
          }
        })()}
      </ReactModal>
    ) : null
  )
}

const mapStateToProps = (state) => ({
  modalProp: state.modal
});

export default connect(mapStateToProps)(ModalService);
