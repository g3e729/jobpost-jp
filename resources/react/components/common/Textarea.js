import React from 'react';

const Textarea = ({ className, row = 12, value, ...rest }) => (
  <textarea className={`input ${className || ''}`} rows={row} value={value || ''} {...rest}></textarea>
)

export default Textarea;
