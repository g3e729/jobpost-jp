import React from 'react';
import Select from 'react-select';

import { jobSelectStyles } from '../../constants/config';

const filterList = [
  { value: 'chocolate',   label: 'Chocolate' },
  { value: 'strawberry',  label: 'Strawberry' },
  { value: 'vanilla',     label: 'Vanilla' }
];

const JobsFilter = _ => {
  const inputPlaceholder = '指定なし';

  return (
    <aside className="jobs-filter">
      <h3 className="jobs-filter__header">絞り込み</h3>
      <div className="jobs-filter-content">
        <ul className="jobs-filter-content__list">
          <li className="jobs-filter-content__list-item">
            <div className="jobs-filter-content__header">
              <i className="icon icon-pc-user text-dark-yellow"></i>
              タイプ
            </div>
            <Select options={filterList}
              styles={jobSelectStyles}
              placeholder={inputPlaceholder}
            />
          </li>
          <li className="jobs-filter-content__list-item">
            <div className="jobs-filter-content__header">
              <i className="icon icon-status text-dark-yellow"></i>
              ステータス
            </div>
            <Select options={filterList}
              styles={jobSelectStyles}
              placeholder={inputPlaceholder}
            />
          </li>
          <li className="jobs-filter-content__list-item">
            <div className="jobs-filter-content__header">
              <i className="icon icon-code text-dark-yellow"></i>
              プログラミング言語
            </div>
            <Select options={filterList}
              styles={jobSelectStyles}
              placeholder={inputPlaceholder}
            />
          </li>
          <li className="jobs-filter-content__list-item">
            <div className="jobs-filter-content__header">
              <i className="icon icon-framework text-dark-yellow"></i>
              フレームワーク
            </div>
            <Select options={filterList}
              styles={jobSelectStyles}
              placeholder={inputPlaceholder}
            />
          </li>
          <li className="jobs-filter-content__list-item">
            <div className="jobs-filter-content__header">
              <i className="icon icon-laptop text-dark-yellow"></i>
              その他開発環境
            </div>
            <Select options={filterList}
              styles={jobSelectStyles}
              placeholder={inputPlaceholder}
            />
          </li>
          <li className="jobs-filter-content__list-item">
            <div className="jobs-filter-content__header">
              <i className="icon icon-marker text-dark-yellow"></i>
              地域
            </div>
            <Select options={filterList}
              styles={jobSelectStyles}
              placeholder={inputPlaceholder}
            />
          </li>
          <li className="jobs-filter-content__list-item">
            <div className="jobs-filter-content__header">
              <i className="icon icon-sort-down text-dark-yellow"></i>
              ソート
            </div>
            <Select options={filterList}
              styles={jobSelectStyles}
              placeholder={inputPlaceholder}
            />
          </li>
        </ul>
      </div>
    </aside>
  );
}

export default JobsFilter;
