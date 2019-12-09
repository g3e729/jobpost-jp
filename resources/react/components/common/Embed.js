import React from 'react';

const Embed = ({ className, src, ...rest }) => (
  <div className={`embed ${className || ''}`}>
    <iframe src={src} {...rest}></iframe>
  </div>
);

export default Embed;
