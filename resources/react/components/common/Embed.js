import React from 'react';

const Embed = ({ className, src, ...props }) => (
  <div className={`embed embed--16by9 ${className}`}>
    <iframe src={src} {...props}></iframe>
  </div>
);

export default Embed;
