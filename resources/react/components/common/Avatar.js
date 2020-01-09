import React from 'react';

const Avatar = ({ className, isEdit = false, children, ...rest }) => (
  <div className={`avatar ${className || ''} ${isEdit ? 'avatar--button' : ''}`} {...rest}>
    {children}
  </div>
);

export default Avatar;
