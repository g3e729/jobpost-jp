import React from 'react';
import ReactModal from 'react-modal';
ReactModal.setAppElement('#root');
import { connect } from 'react-redux';

import JobApplyModal from './modal/JobApplyModal';
import JobDeleteModal from './modal/JobDeleteModal';
import JobStopModal from './modal/JobStopModal';
import StudentScoutModal from './modal/StudentScoutModal';
import ProfileAvatarModal from './modal/ProfileAvatarModal';
import ProfileEyecatchModal from './modal/ProfileEyecatchModal';
import ProfileWorkModal from './modal/ProfileWorkModal';
import ProfileEducationModal from './modal/ProfileEducationModal';
import ProfileProgrammingModal from './modal/ProfileProgrammingModal';
import ProfileFrameworkModal from './modal/ProfileFrameworkModal';
import ProfileOtherModal from './modal/ProfileOtherModal';
import ProfileExperienceModal from './modal/ProfileExperienceModal';
import ProfilePortfolioModal from './modal/ProfilePortfolioModal';
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
              return <StudentScoutModal />
            case modalType.PROFILE_AVATAR:
              return <ProfileAvatarModal />
            case modalType.PROFILE_EYECATCH:
              return <ProfileEyecatchModal />
            case modalType.PROFILE_WORK:
              return <ProfileWorkModal />
            case modalType.PROFILE_EDUCATION:
              return <ProfileEducationModal />
            case modalType.PROFILE_PROGRAMMING:
              return <ProfileProgrammingModal />
            case modalType.PROFILE_FRAMEWORK:
              return <ProfileFrameworkModal />
            case modalType.PROFILE_OTHER:
              return <ProfileOtherModal />
            case modalType.PROFILE_EXPERIENCE:
              return <ProfileExperienceModal />
            case modalType.PROFILE_PORTFOLIO:
              return <ProfilePortfolioModal />
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
