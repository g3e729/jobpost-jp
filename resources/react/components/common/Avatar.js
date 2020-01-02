import React from 'react';

import Button from './Button';

const Avatar = ({ className, isEdit = false, ...rest }) => (
  <div className={`avatar ${className || ''} ${isEdit ? 'avatar--button' : ''}`} {...rest}>
    { isEdit ? (
      <Button className="button--avatar">
        <>
          <i className="icon icon-image"></i>
          変更する
        </>
      </Button>
    ) : null }
  </div>
);

export default Avatar;
