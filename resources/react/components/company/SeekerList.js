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

const SeekerList = ({type = null, title, link}) => {
  return (
    <div className="seeker-list__container">
      { title ? <h3 className="seeker-list__title">{title}</h3> : null }
      { type ? (
        <>
          <div className="seeker-list__search">
            <Search />
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
        { [1, 2, 3, 4, 5].map((_, idx) => (
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
                <span className="pill">Develop1コース</span>
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
}

export default SeekerList;
