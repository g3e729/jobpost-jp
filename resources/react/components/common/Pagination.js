import React from 'react';
import { Link } from 'react-router-dom';

import { state } from '../../constants/state';
import { routes } from '../../constants/routes';

const Pagination = (props) => {
  const {
    first,
    last,
    current,
    prevPage,
    nextPage
  } = props;

  return (
    <ul className="pagination" role="navigation">
      <li className={`pagination__item ${state.DISABLED}`}>
        { prevPage ? (
          <Link to={`${routes.JOBS}?page=${current-1}`} className="pagination__item-link">
            <i className="icon icon-back-arrow"></i>
          </Link>
          ) : (
          <span className="pagination__item-link">
            <i className="icon icon-back-arrow"></i>
          </span>
          )
        }
      </li>
      { [current-2, current-1, current, current+1, current+2].map((item, idx) => (
        (item >= first && item <= last) ? (
          <li className={`pagination__item ${ item === current ? state.ACTIVE : null }`} key={idx}>
            { item === current ? (
              <span className="pagination__item-link">{item}</span>
            ) : (
              <Link to={`${routes.JOBS}?page=${item}`} className="pagination__item-link">
                {item}
              </Link>
            )}
          </li>
        ) : null
      ))}
      <li className="pagination__item">
        { nextPage ? (
          <Link to={`${routes.JOBS}?page=${current+1}`} className="pagination__item-link">
            <i className="icon icon-next-arrow"></i>
          </Link>
          ) : (
          <span className="pagination__item-link">
            <i className="icon icon-next-arrow"></i>
          </span>
          )
        }
      </li>
    </ul>
  );
}

export default Pagination;
