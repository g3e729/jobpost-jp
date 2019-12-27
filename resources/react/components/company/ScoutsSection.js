import React from 'react';
import { Link } from 'react-router-dom';

import Fraction from '../common/Fraction';
import Pagination from '../common/Pagination';
import ScoutsList from './ScoutsList';

import { routes } from '../../constants/routes';

const ScoutsSection = _ => (
  <div className="scouts-section">
    <div className="scouts-section__top">
      <div className="scouts-section__top-info">
        <Link className="button button--pill scouts-section__top-button" to={routes.SCOUT}>
          <span><i className="icon icon-back-curve text-dark-gray"></i>キャンセルする</span>
        </Link>
        <div className="scouts-section__top-info-remain">
          残りのチケット
          <span>30<small>枚</small></span>
          <i className="icon icon-arrow-right"></i>
          <span>29<small>枚</small></span>
        </div>
      </div>
      <h3 className="scouts-section__top-title">スカウトする募集の選択</h3>
      <Fraction numerator="10"
        denominator="45"
      />
    </div>
    <div className="scouts-section__content">
      <ScoutsList />
    </div>
    <div className="scouts-section__footer">
      <Pagination />
    </div>
  </div>
);

export default ScoutsSection;
