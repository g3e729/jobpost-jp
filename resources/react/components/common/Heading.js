import React from 'react';

const Heading = ({ title, subTitle }) => (
  <div className="heading">
    <h1 className="heading__title text-dark-yellow">{title}</h1>
    <p className="heading__title-jp">{subTitle}</p>
  </div>
);

export default Heading;
