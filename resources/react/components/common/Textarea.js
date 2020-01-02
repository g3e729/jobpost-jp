import React from 'react';

const Textarea = ({ className, row = 7, value, ...rest }) => (
  <textarea className={`input ${className}`} rows={row} value={value || ''} {...rest}></textarea>
)

export default Textarea;
