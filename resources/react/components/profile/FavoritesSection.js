import React from 'react';

import Fraction from '../common/Fraction';
import Pagination from '../common/Pagination';

import FavoritesList from './FavoritesList';

const FavoritesSection = () => (
  <div className="favorites-section">
    <div className="favorites-section__top">
      <Fraction numerator="09"
        denominator="45"
      />
    </div>
    <div className="favorites-section__content">
      <FavoritesList />
    </div>
    <div className="favorites-section__footer">
      <Pagination />
    </div>
  </div>
);

export default FavoritesSection;
