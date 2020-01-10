import React from 'react';

const Radio = ({ type = 'radio', className, value, label = '', ...rest }) => (
  <label className={`radio ${className || ''}`}>
    <input type={type} value={value || ''} {...rest} />
    <span></span>
    { label }
  </label>
);

export default Radio;
