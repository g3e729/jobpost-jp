import React from 'react';
import { Link } from 'react-router-dom';
import Select from 'react-select';

import Avatar from '../common/Avatar';
import Fraction from '../common/Fraction';
import Pagination from '../common/Pagination';
import Search from '../common/Search';
import { dashboardSelectStyles } from '../../constants/config';

const filterList = [
  { value: 'chocolate',   label: 'Chocolate' },
  { value: 'strawberry',  label: 'Strawberry' },
  { value: 'vanilla',     label: 'Vanilla' }
];

const ScoutList = _ => (
  <div className="scout-list__container">
    <h3 className="scout-list__title">候補者一覧</h3>
    <div className="scout-list__search">
      <Search placeholder="検索候補" />
    </div>
    <div className="scout-list__filter">
      <ul className="scout-list__filters">
        <li className="scout-list__filters-item">
          <Select options={filterList}
            styles={dashboardSelectStyles}
            placeholder="コース"
            width='97px'
          />
        </li>
        <li className="scout-list__filters-item">
          <Select options={filterList}
            styles={dashboardSelectStyles}
            placeholder="年齢"
            width='82px'
          />
        </li>
        <li className="scout-list__filters-item">
          <Select options={filterList}
            styles={dashboardSelectStyles}
            placeholder="場所"
            width='82px'
          />
        </li>
        <li className="scout-list__filters-item">
          <Select options={filterList}
            styles={dashboardSelectStyles}
            placeholder="留学費用"
            width='112px'
          />
        </li>
      </ul>
      <Fraction numerator="05"
        denominator="45"
      />
    </div>
    <ul className="scout-list">
      <li className="scout-list__item">
        content
      </li>
    </ul>
    <div className="scout-list__pagination">
      <Pagination />
    </div>
  </div>
);

export default ScoutList;
