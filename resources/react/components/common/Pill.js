import React from 'react';

const Pill = ({ className, children }) => (
  <span className={`pill ${className || ''}`}>
    {children}
  </span>
);

export default Pill;
