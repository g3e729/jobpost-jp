import React from 'react';

import { state } from '../constants/state';

const Pagination = () => {
  const isPrev = 0;
  const isNext = 1;

  return (
    <ul className="pagination" role="navigation">
      <li className={`pagination__item ${state.DISABLED}`}>
        { isPrev === 0 ? (
          <span className="pagination__item-link">
            <i className="icon icon-back-arrow"></i>
          </span>
          ) : (
          <a href="#" className="pagination__item-link">
            <i className="icon icon-back-arrow"></i>
          </a>
          )
        }
      </li>
      { [1, 2, 3].map((item, idx) => {
        return (
          <li className={`pagination__item ${idx === 0 ? state.ACTIVE : ''}`} key={idx}>
            { idx === 0 ? (
              <span className="pagination__item-link">{item}</span>
              ) : (
              <a href="#" className="pagination__item-link">{item}</a>
              )
            }
          </li>
        );
      }) }
      <li className="pagination__item">
        { isNext === 0 ? (
          <span className="pagination__item-link">
            <i className="icon icon-next-arrow"></i>
          </span>
          ) : (
          <a href="#" className="pagination__item-link">
            <i className="icon icon-next-arrow"></i>
          </a>
          )
        }
      </li>
    </ul>
  );
}

export default Pagination;
