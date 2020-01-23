import React from 'react';

import Fraction from '../common/Fraction';
import Pagination from '../common/Pagination';
import FavoritesList from './FavoritesList';

const FavoritesSection = ({data, type}) => {
  const jobsData = data.data || {};

  return (
    <div className="favorites-section">
      <div className="favorites-section__top">
        <Fraction numerator={jobsData.length}
          denominator={data.total}
        />
      </div>
      <div className="favorites-section__content">
        <FavoritesList jobs={jobsData} type={type} />
      </div>
      <div className="favorites-section__footer">
        <Pagination
          current={data.current_page}
          prevPage={data.prev_page_url}
          nextPage={data.next_page_url}
          lastPage={data.last_page}
        />
      </div>
    </div>
  );
}

export default FavoritesSection;
