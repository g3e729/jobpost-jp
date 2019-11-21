import React from 'react';

const Button = ({ className, value, ...props }) => (
  <button className={`button ${className}`}
    {...props}
  >
    {value}
  </button>
);

export default Button;
