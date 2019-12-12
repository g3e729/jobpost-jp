import React from 'react';

const Input = ({ className, value, ...rest }) => (
  <input className={`input ${className}`} value={value || ''} {...rest} />
)

export default Input;
