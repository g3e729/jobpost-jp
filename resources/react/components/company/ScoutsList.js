import React from 'react';

const ScoutsList = _ => (
  <ul className="scouts-list">
    { [...Array(10)].map((_, idx) => (
      <li className="scouts-list__item" key={idx}>
        {idx}
      </li>
    )) }
  </ul>
);

export default ScoutsList;
