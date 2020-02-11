import React, { useEffect, useState } from 'react';
import Select from 'react-select';
import moment from 'moment';
import _ from 'lodash';
import { Link, useHistory } from 'react-router-dom';
import { connect } from 'react-redux';

import Avatar from '../common/Avatar';
import Button from '../common/Button';
import Fraction from '../common/Fraction';
import Loading from '../common/Loading';
import Nada from '../common/Nada';
import Pagination from '../common/Pagination';
import Pill from '../common/Pill';
// import Search from '../common/Search';
import generateRoute from '../../utils/generateRoute';
import { routes, prefix } from '../../constants/routes';
import { sex, skills } from '../../constants/state';
import { dashboardSelectStyles } from '../../constants/config';

import avatarPlaceholder from '../../../img/avatar-default.png';

const ScoutList = (props) => {
  const history = useHistory();
  const [formValues, setFormValues] = useState({
    course_id: null,
    age: null,
    prefecture: null,
    study_abroad_fee: null
  });
  const urlParams = new URLSearchParams(location.search);
  const [urlParamsTmp, setUrlParamsTmp] = useState(urlParams.toString() ? `?${urlParams.toString()}` : '');
  const {
    students = [],
    isLoading = false,
    filters
  } = props;
  const data = students || {};
  const studentsData = students.data || data;
  const filterData = filters && filters.filtersData;
  const {
    courses = [],
    experiences = [],
    frameworks = [],
    others = [],
    programming_languages = []
  } = (filterData !== undefined && filterData.students);
  const {
    regions = []
  } = (filterData !== undefined && filterData.jobs);
  const skillsFilter = { ...experiences, ...frameworks, ...others, ...programming_languages };
  const [coursesFilter, setCoursesFilter] = useState([]);
  const ageFilter = [
    { label: 'teens', value: 10 },
    { label: '20s', value: 20 },
    { label: '30s', value: 30 },
    { label: 'more than 40s', value: 40 }
  ];
  const [regionsFilter, setRegionsFilter] = useState([]);
  const salaryFilter = [
    { label: '200k yen ~', value: 200 },
    { label: '300k yen ~', value: 300 },
    { label: '400k yen ~', value: 400 },
    { label: '500k yen ~', value: 500 },
    { label: '600k yen ~', value: 600 },
    { label: '700k yen ~', value: 700 },
    { label: '800k yen ~', value: 800 },
    { label: '900k yen ~', value: 900 },
    { label: '1 million yen ~', value: 1000 }
  ];

  const handleScout = (id, name) => {
    localStorage.setItem('seeker_id', id);
    localStorage.setItem('seeker_name', name);

    history.push(`${prefix}scouts`);
  }

  const handleChange = (e, type) => {
    setFormValues(prevState => {
      return { ...prevState, [type]: e.value }
    });

    if (urlParamsTmp) {
      if (urlParamsTmp.includes(type)) {
        urlParams.set(type, e.value);
        setUrlParamsTmp(`?${urlParams.toString()}`);
      }
      else {
        setUrlParamsTmp(`${urlParamsTmp}&${type}=${e.value}`);
      }
    } else {
      setUrlParamsTmp(`?${type}=${e.value}`);
    }
  }

  useEffect(() => {
    if (!_.isEmpty(filterData)) {
      setCoursesFilter(Object.keys(courses).map((item, idx) => {
        return {value: item, label: Object.values(courses)[idx]};
      }));

      setRegionsFilter(Object.keys(regions).map((item, idx) => {
        return {value: item, label: Object.values(regions)[idx]};
      }));
    }
  }, [filterData])

  useEffect(_ => {
    if (urlParamsTmp) {
      history.push(urlParamsTmp);
    }
  }, [urlParamsTmp])

  return (
    <div className="scout-list__container">
      <h3 className="scout-list__title">候補者一覧</h3>
      {/* <div className="scout-list__search">
        <Search placeholder="検索候補" />
      </div> */}
      <div className="scout-list__filter">
        <ul className="scout-list__filters">
          <li className="scout-list__filters-item">
            <Select options={coursesFilter}
              styles={dashboardSelectStyles}
              placeholder="コース"
              width='97px'
              onChange={e => handleChange(e, 'course_id')}
            />
          </li>
          <li className="scout-list__filters-item">
            <Select options={ageFilter}
              styles={dashboardSelectStyles}
              placeholder="年齢"
              width='82px'
              onChange={e => handleChange(e, 'age')}
            />
          </li>
          <li className="scout-list__filters-item">
            <Select options={regionsFilter}
              styles={dashboardSelectStyles}
              placeholder="場所"
              width='82px'
              onChange={e => handleChange(e, 'prefecture')}
            />
          </li>
          <li className="scout-list__filters-item">
            <Select options={salaryFilter}
              styles={dashboardSelectStyles}
              placeholder="留学費用"
              width='112px'
              onChange={e => handleChange(e, 'study_abroad_fee')}
            />
          </li>
        </ul>
        { isLoading ? null : (
          <Fraction numerator={studentsData.length}
            denominator={data.total}
          />
        )}
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
                        style={{ backgroundImage: `url("${(item.applications_count > 0) ? item.avatar : avatarPlaceholder}")` }}
                      />
                    </div>
                  </div>
                  <div className="scout-list__item-top-right">
                    <div className="scout-list__item-top-header">

                      <h4 className="scout-list__item-top-name">
                        {(item.applications_count > 0) ? (
                          <>
                            <span>{item.display_name}</span>
                            {sex[`${item.sex}`]}
                          </>
                        ) : (
                          <span>{sex[`${item.sex}`]}</span>
                        )}
                      </h4>
                      <Pill className="pill--icon">
                        <i className="icon icon-star"></i>{item.likes_count}
                      </Pill>
                    </div>
                    <ul className="scout-list__item-top-pills">
                      <li className="scout-list__item-top-pills-item">
                        <Pill className="pill--clear">{ item.applications_count > 0
                          ? moment().diff(item.birthday, 'years', false)
                          : (() => {
                            const currYear = moment().diff(item.birthday, 'years', false);

                            switch (true) {
                              case (currYear < 20):
                                return '10代';
                              case (currYear < 30):
                                return '20代';
                              case (currYear < 40):
                                return '30代';
                              default:
                                return '40代';
                            }
                          })()}</Pill>
                      </li>
                      { Object.values(item.taken_class).length ? (
                        <li className="scout-list__item-top-pills-item">
                          <Pill className="pill--clear">{Object.values(item.taken_class).toString()}</Pill>
                        </li>
                      ) : null }
                      { item.course ? (
                        <li className="scout-list__item-top-pills-item">
                          <Pill className="pill--clear">{item.course}</Pill>
                        </li>
                      ) : null }
                    </ul>
                  </div>
                  <Button className="button button--large scout-list__item-top-button" onClick={_ => handleScout(item.id, item.display_name)}>
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
                    { item.what_text ? (
                      <li className="scout-list__item-content-list-item">
                        <h5>この先やってみたいこと</h5>
                        <p>{item.what_text}</p>
                      </li>
                    ) : null }
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
