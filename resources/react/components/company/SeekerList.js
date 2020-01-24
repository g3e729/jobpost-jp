import React from 'react';
import Select from 'react-select';
import moment from 'moment';
moment.locale('ja');
import { Link } from 'react-router-dom';

import Avatar from '../common/Avatar';
import Button from '../common/Button';
import Fraction from '../common/Fraction';
import Loading from '../common/Loading';
import Nada from '../common/Nada';
import Pagination from '../common/Pagination';
import Pill from '../common/Pill';
import Search from '../common/Search';
import generateRoute from '../../utils/generateRoute';
import { sex } from '../../constants/state';
import { routes } from '../../constants/routes';
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
  const studentsData = students.data || data;

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
              <li className="seeker-list__filters-item">
                <Button className="button--link">
                  <Pill className="pill--icon text-medium-black">
                    <i className="icon icon-star"></i>気になる生徒
                  </Pill>
                </Button>
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
                      style={{ backgroundImage: `url("${(item.applications_count > 0) ? item.avatar : avatarPlaceholder}")` }}
                    />
                  </div>
                </div>
                <div className="seeker-list__item-right">
                  <div className="seeker-list__item-right-top">
                    <Link to={generateRoute(routes.STUDENT_DETAIL, { id: item.id })}
                      className="button button--link">
                      <h4 className="seeker-list__item-name">{(item.applications_count > 0) ? item.display_name : sex[`${item.sex}`] }</h4>
                    </Link>
                  </div>
                  <div className="seeker-list__item-right-bottom">
                    <p className="seeker-list__item-description">{item.description}</p>
                    {item.applications_count > 0 ? <span className="seeker-list__item-tag">でのスカウト</span> : null }
                    <time className="seeker-list__item-time">{moment(item.updated_at).fromNow()}</time>
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
