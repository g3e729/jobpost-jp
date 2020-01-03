import React, { useEffect, useState } from 'react';
import { Link, useLocation } from 'react-router-dom';

import { state } from '../../constants/state';

const Pagination = (props) => {
  const location = useLocation();
  const urlParams = new URLSearchParams(location.search);
  const [urlParamsTmp, setUrlParamsTmp] = useState(urlParams.toString() ? `?${urlParams.toString()}` : '?page=');
  const {
    current,
    prevPage,
    nextPage,
    lastPage = 0
  } = props;

  useEffect(_ => {
    if (urlParams.toString()) {
      if (urlParams.has('page')) {
        urlParams.delete('page');
        setUrlParamsTmp(`?${urlParams.toString()}&page=`);
      } else {
        setUrlParamsTmp(`${urlParamsTmp}&page=`);
      }
    }
  }, [location]);

  return (
    <ul className="pagination" role="navigation" style={{ display: (lastPage < 2) ? 'none' : ''}}>
      <li className={`pagination__item ${ prevPage ? '' : state.DISABLED}`}>
        { prevPage ? (
          <Link to={`${urlParamsTmp}${current-1}`} className="pagination__item-link">
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
        (item >= 1 && item <= lastPage) ? (
          <li className={`pagination__item ${ item === current ? state.ACTIVE : '' }`} key={idx}>
            { item === current ? (
              <span className="pagination__item-link">{item}</span>
            ) : (
              <Link to={`${urlParamsTmp}${item}`} className="pagination__item-link">
                {item}
              </Link>
            )}
          </li>
        ) : null
      ))}
      <li className={`pagination__item ${ nextPage ? '' : state.DISABLED}`}>
        { nextPage ? (
          <Link to={`${urlParamsTmp}${current+1}`} className="pagination__item-link">
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
