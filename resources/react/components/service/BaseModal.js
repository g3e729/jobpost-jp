import React from 'react';
import { useDispatch } from 'react-redux';

import Button from '../common/Button';
import { unsetModal } from '../../actions/modal';

const BaseModal = ({ title, children }) => {
  const dispatch = useDispatch();

  const handleCloseModal = _ => {
    dispatch(unsetModal());
  }

  return (
    <>
      <div className={`modal__header ${ title ? 'modal__header--background' : '' }`}>
        { title ? <h3 className="modal__header-title">{title}</h3> : null }
        <Button className="button--link modal__header-button" onClick={_ => handleCloseModal()}>
          <i className="icon icon-cross text-dark-gray"></i>
        </Button>
      </div>
      {children}
    </>
  );
}

export default BaseModal;
