import React from 'react';
import Select from 'react-select';
import moment from 'moment';
import { Link, useHistory } from 'react-router-dom';
import { connect } from 'react-redux';

import Avatar from '../common/Avatar';
import Button from '../common/Button';
import Fraction from '../common/Fraction';
import Loading from '../common/Loading';
import Nada from '../common/Nada';
import Pagination from '../common/Pagination';
import Pill from '../common/Pill';
import Search from '../common/Search';
import generateRoute from '../../utils/generateRoute';
import { routes, prefix } from '../../constants/routes';
import { skills } from '../../constants/state';
import { dashboardSelectStyles } from '../../constants/config';

const filterList = [
  { value: 'chocolate',   label: 'Chocolate' },
  { value: 'strawberry',  label: 'Strawberry' },
  { value: 'vanilla',     label: 'Vanilla' }
];

import avatarPlaceholder from '../../../img/avatar-default.png';

const ScoutList = (props) => {
  const history = useHistory();
  const {
    students = [],
    isLoading = false,
    filters
  } = props;
  const filterData = filters && filters.filtersData;
  const {
    experiences = [],
    frameworks = [],
    others = [],
    programming_languages = []
  } = (filterData !== undefined && filterData.students);
  const data = students || {};
  const studentsData = students.data || {};
  const skillsFilter = { ...experiences, ...frameworks, ...others, ...programming_languages };

  const handleScout = id => {
    localStorage.setItem('seeker_id', id);

    history.push(`${prefix}scouts`);
  }

  return (
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
        <Fraction numerator={studentsData.length}
          denominator={data.total}
        />
      </div>
      { isLoading ? (
        <Loading className="loading--padded" />
      ) : (
        studentsData.length ? (
          <ul className="scout-list">
            { studentsData.map(item => (
              <li className="scout-list__item" key={item.id}>
                <div className="scout-list__item-top">
                  <div className="scout-list__item-top-left">
                    <div className="scout-list__item-top-avatar">
                      <Avatar className="avatar--seeker"
                        style={{ backgroundImage: `url("${item.avatar || avatarPlaceholder}")` }}
                      />
                    </div>
                  </div>
                  <div className="scout-list__item-top-right">
                    <div className="scout-list__item-top-header">
                      <h4 className="scout-list__item-top-name">{item.sex === 'm' ? '男' : '女性'}</h4>
                      <Pill className="pill--icon">
                        <i className="icon icon-star"></i>{item.likes_count}
                      </Pill>
                    </div>
                    <ul className="scout-list__item-top-pills">
                      <li className="scout-list__item-top-pills-item">
                        <Pill className="pill--clear">{moment().diff(item.birthday, 'years',false)}代</Pill>
                      </li>
                      <li className="scout-list__item-top-pills-item">
                        <Pill className="pill--clear">PHPコース</Pill>
                      </li>
                      {/* <li className="scout-list__item-top-pills-item">
                        <Pill className="pill--clear">留学費 50万円</Pill>
                      </li> */}
                    </ul>
                  </div>
                  <Button className="button button--large scout-list__item-top-button" onClick={_ => handleScout(item.id)}>
                    スカウトする
                  </Button>
                </div>
                <div className="scout-list__item-content">
                  <ul className="scout-list__item-content-list">
                    { item.intro_text ? (
                      <li className="scout-list__item-content-list-item">
                        <h5>自己紹介</h5>
                        <p>{item.intro_text}</p>
                      </li>
                    ) : null }
                    {/* <li className="scout-list__item-content-list-item">
                      <h5>この先やってみたいこと</h5>
                      <p>好きなことをやり続けたい</p>
                    </li> */}
                    {/* <li className="scout-list__item-content-list-item">
                      <h5>学歴</h5>
                      <p>{`日本工学院専門学校
                        ミュージックアーティスト科`}</p>
                    </li> */}
                    { item.toeic_score ? (
                      <li className="scout-list__item-content-list-item">
                        <h5>TOEIC</h5>
                        <p>{item.toeic_score}</p>
                      </li>
                    ) : null }
                    { item.skills.length ? (
                      <li className="scout-list__item-content-list-item">
                        <h5>スキル</h5>
                        <div>
                          <dl>
                            { item.skills
                                .filter(item => item.skill_rate > 1)
                                .slice(0, 10)
                                .map((item, idx) => (
                                  <React.Fragment key={idx}>
                                    <dt>{skillsFilter[item.skill_id]}</dt>
                                    <dt>{skills[item.skill_rate]}</dt>
                                  </React.Fragment>
                                ))
                            }
                          </dl>
                        </div>
                      </li>
                    ) : null }
                  </ul>
                </div>
                <div className="scout-list__item-bottom">
                  <Link to={generateRoute(routes.STUDENT_DETAIL, { id: item.id })}
                    className="button button--more scout-list__item-button">
                    もっと見る
                  </Link>
                </div>
              </li>
            )) }
          </ul>
        ) : <Nada className="nada--padded">条件を変えて探してみましょう。</Nada>
      )}
      { isLoading ? null : (
        <div className="scout-list__pagination">
          <Pagination
            current={data.current_page}
            prevPage={data.prev_page_url}
            nextPage={data.next_page_url}
            lastPage={data.last_page}
          />
        </div>
      )}
    </div>
  );
}

const mapStateToProps = (state) => ({
  filters: state.filters
});

export default connect(mapStateToProps)(ScoutList);
