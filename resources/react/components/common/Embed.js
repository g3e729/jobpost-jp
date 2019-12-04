import React from 'react';

const Embed = ({ className, src, ...props }) => (
  <div className={`embed ${className || ''}`}>
    <iframe src={src} {...props}></iframe>
  </div>
);

export default Embed;
