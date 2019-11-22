import React from 'react';

const Avatar = ({ className, ...props }) => (
  <div className={`avatar ${className}`} {...props}></div>
);

export default Avatar;
