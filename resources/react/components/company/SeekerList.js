import React from 'react';
import Select from 'react-select';
import { Link } from 'react-router-dom';

import Avatar from '../common/Avatar';
import Fraction from '../common/Fraction';
import Pagination from '../common/Pagination';
import Pill from '../common/Pill';
import Search from '../common/Search';
import { dashboardSelectStyles } from '../../constants/config';

const filterList = [
  { value: 'chocolate',   label: 'Chocolate' },
  { value: 'strawberry',  label: 'Strawberry' },
  { value: 'vanilla',     label: 'Vanilla' }
];

const SeekerList = ({type = null, title = '', link}) => (
  <div className="seeker-list__container">
    <h3 className="seeker-list__title">{title}</h3>
    { type ? (
      <>
        <div className="seeker-list__search">
          <Search placeholder="検索候補" />
        </div>
        <div className="seeker-list__filter">
          <ul className="seeker-list__filters">
            <li className="seeker-list__filters-item">
              <Select options={filterList}
                styles={dashboardSelectStyles}
                placeholder="ポジション"
                width='134px'
              />
            </li>
            <li className="seeker-list__filters-item">
              <Select options={filterList}
                styles={dashboardSelectStyles}
                placeholder="コース"
                width='96px'
              />
            </li>
            <li className="seeker-list__filters-item">
              <Select options={filterList}
                styles={dashboardSelectStyles}
                placeholder="募集"
                width='82px'
              />
            </li>
            <li className="seeker-list__filters-item">
              <Select options={filterList}
                styles={dashboardSelectStyles}
                placeholder="並び替え"
                width='112px'
              />
            </li>
          </ul>
          <Fraction numerator="10"
            denominator="45"
          />
        </div>
      </>
    ) : null }
    <ul className="seeker-list">
      { [...Array(5)].map((_, idx) => (
        <li className="seeker-list__item" key={idx}>
          <div className="seeker-list__item-left">
            <div className="seeker-list__item-avatar">
              <Avatar className="avatar--seeker"
                style={{ backgroundImage: 'url("https://lorempixel.com/640/640/business/")' }}
              />
            </div>
          </div>
          <div className="seeker-list__item-right">
            <div className="seeker-list__item-right-top">
              <h4 className="seeker-list__item-name">田中義人さんをスカウトしました。</h4>
              <Pill>Develop1コース</Pill>
            </div>
            <div className="seeker-list__item-right-bottom">
              <p className="seeker-list__item-description">自社★C2Cマッチングプラットフォーム開発</p>
              <span className="seeker-list__item-tag">でのスカウト</span>
              <time className="seeker-list__item-time">約13時間前</time>
            </div>
          </div>
        </li>
      )) }
    </ul>
    { type ? (
      <div className="seeker-list__pagination">
        <Pagination />
      </div>
    ) : (
      <div className="seeker-list__button">
        <Link to={link} className="button">
          もっと見る
        </Link>
      </div>
    )}
  </div>
);

export default SeekerList;
