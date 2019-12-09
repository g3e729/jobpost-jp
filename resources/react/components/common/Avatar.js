import React from 'react';

const Avatar = ({ className, ...rest }) => (
  <div className={`avatar ${className || ''}`} {...rest}></div>
);

export default Avatar;
