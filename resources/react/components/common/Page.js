import React from 'react';

const Page = ({ children, type }) => (
  <div className={`page page--${type || 'default'}`}>
    {children}
  </div>
);

export default Page;
