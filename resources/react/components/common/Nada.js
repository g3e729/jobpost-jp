import React from 'react';

const Nada = ({ className, children}) => (
  <p className={`nada ${className || ''}`}>
    {children}
  </p>
);

export default Nada;
