import React from 'react';
import Select from 'react-select';
import { Link } from 'react-router-dom';

import Avatar from '../common/Avatar';
import Fraction from '../common/Fraction';
import Loading from '../common/Loading';
import Nada from '../common/Nada';
import Pagination from '../common/Pagination';
import Pill from '../common/Pill';
import Search from '../common/Search';
import { dashboardSelectStyles } from '../../constants/config';

const filterList = [
  { value: 'chocolate',   label: 'Chocolate' },
  { value: 'strawberry',  label: 'Strawberry' },
  { value: 'vanilla',     label: 'Vanilla' }
];

import avatarPlaceholder from '../../../img/avatar-default.png';

const SeekerList = (props) => {
  const {
    type = null,
    title = '',
    link = null,
    students = [],
    isLoading = false
  } = props;
  const data = students || {};
  const studentsData = students.data || {};

  return (
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
            <Fraction numerator={studentsData.length}
              denominator={data.total}
            />
          </div>
        </>
      ) : null }
      { isLoading ? (
        <Loading className="loading--padded" />
      ) : (
        studentsData.length ? (
          <ul className="seeker-list">
            { studentsData.map(item => (
              <li className="seeker-list__item" key={item.id}>
                <div className="seeker-list__item-left">
                  <div className="seeker-list__item-avatar">
                    <Avatar className="avatar--seeker"
                      style={{ backgroundImage: `url("${item.avatar || avatarPlaceholder}")` }}
                    />
                  </div>
                </div>
                <div className="seeker-list__item-right">
                  <div className="seeker-list__item-right-top">
                    <h4 className="seeker-list__item-name">田中義人さんをスカウトしました。</h4>re
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
        ) : <Nada className="nada--padded">条件を変えて探してみましょう。</Nada>
      )}
      { type ? (
        isLoading ? null : (
          <div className="seeker-list__pagination">
            <Pagination
              current={data.current_page}
              prevPage={data.prev_page_url}
              nextPage={data.next_page_url}
              lastPage={data.last_page}
            />
          </div>
        )
      ) : (
        data.total ? (
          <div className="seeker-list__button">
            <Link to={link} className="button">
              もっと見る
            </Link>
          </div>
        ) : null
      )}
    </div>
  );
}

export default SeekerList;
