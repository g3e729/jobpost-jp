import React from 'react';

const Radio = ({ type = 'radio', className, value, label = '', text = '', ...rest }) => (
  <label className={`radio ${className || ''}`}>
    <input type={type} value={value || ''} {...rest} />
    <span></span>
    { label }
    { text !== '' ? <em className="u-show-sp">{text}</em> : '' }
  </label>
);

export default Radio;
