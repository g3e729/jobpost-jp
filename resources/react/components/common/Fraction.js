import React from 'react';

const Fraction = ({ numerator, denominator }) => (
  <div className="fraction">
    <span className="fraction__numerator">{numerator}</span> / {denominator}
  </div>
);

export default Fraction;
