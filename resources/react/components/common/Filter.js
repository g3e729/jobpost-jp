import React from 'react';
import Select from 'react-select';

import { selectStyles } from '../constants/enums';

const filterList = [
  { value: 'chocolate',   label: 'Chocolate' },
  { value: 'strawberry',  label: 'Strawberry' },
  { value: 'vanilla',     label: 'Vanilla' }
];

const Filter = () => {
  const inputPlaceholder = '指定なし';

  return (
    <aside className="filter">
      <div className="filter__header">絞り込み</div>
      <div className="filter-content">
        <ul className="filter-content__list">
          <li className="filter-content__list-item">
            <div className="filter-content__header">
              <i className="icon icon-pc-user text-orange"></i>
              タイプ
            </div>
            <Select options={filterList}
              styles={selectStyles}
              placeholder={inputPlaceholder}
            />
          </li>
          <li className="filter-content__list-item">
            <div className="filter-content__header">
              <i className="icon icon-status text-orange"></i>
              ステータス
            </div>
            <Select options={filterList}
              styles={selectStyles}
              placeholder={inputPlaceholder}
            />
          </li>
          <li className="filter-content__list-item">
            <div className="filter-content__header">
              <i className="icon icon-code text-orange"></i>
              プログラミング言語
            </div>
            <Select options={filterList}
              styles={selectStyles}
              placeholder={inputPlaceholder}
            />
          </li>
          <li className="filter-content__list-item">
            <div className="filter-content__header">
              <i className="icon icon-framework text-orange"></i>
              フレームワーク
            </div>
            <Select options={filterList}
              styles={selectStyles}
              placeholder={inputPlaceholder}
            />
          </li>
          <li className="filter-content__list-item">
            <div className="filter-content__header">
              <i className="icon icon-laptop text-orange"></i>
              その他開発環境
            </div>
            <Select options={filterList}
              styles={selectStyles}
              placeholder={inputPlaceholder}
            />
          </li>
          <li className="filter-content__list-item">
            <div className="filter-content__header">
              <i className="icon icon-marker text-orange"></i>
              地域
            </div>
            <Select options={filterList}
              styles={selectStyles}
              placeholder={inputPlaceholder}
            />
          </li>
          <li className="filter-content__list-item">
            <div className="filter-content__header">
              <i className="icon icon-sort-down text-orange"></i>
              ソート
            </div>
            <Select options={filterList}
              styles={selectStyles}
              placeholder={inputPlaceholder}
            />
          </li>
        </ul>
      </div>
    </aside>
  );
}

export default Filter;
