import React from 'react';

const Page = ({ type, children }) => (
  <div className={`page page--${type || 'default'}`}>
    {children}
  </div>
);

export default Page;
