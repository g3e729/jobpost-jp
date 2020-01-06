import React, { useEffect, useState } from 'react';
import Select from 'react-select';
import _ from 'lodash';
import { connect } from 'react-redux';
import { useHistory } from 'react-router-dom';

import { jobSelectStyles } from '../../constants/config';

const JobsFilter = (props) => {
  const [positionsFilter, setPositionsFilter] = useState([]);
  const [programmingFilter, setProgrammingFilter] = useState([]);
  const [regionsFilter, setRegionsFilter] = useState([]);
  const [statusFilter, setStatusFilter] = useState([]);
  const urlParams = new URLSearchParams(location.search);
  const [urlParamsTmp, setUrlParamsTmp] = useState(urlParams.toString() ? `?${urlParams.toString()}` : '');
  const history = useHistory();
  const { filters } = props;
  const data = filters.filtersData;
  const inputPlaceholder = '指定なし';

  useEffect(_ => {
    if (data) {
      setPositionsFilter(data.positions.map(item => {
        return { value: item, label: item };
      }));

      setProgrammingFilter(data.programming_languages.map(item => {
        return { value: item, label: item };
      }));

      setRegionsFilter(Object.keys(data.regions).map((item, idx) => {
        return {value: item, label: Object.values(data.regions)[idx]};
      }));

      setStatusFilter(Object.keys(data.status).map((item, idx) => {
        return {value: item, label: Object.values(data.regions)[idx]};
      }));
    }
  }, [data]);

  useEffect(_ => {
    if (urlParamsTmp) {
      history.push(urlParamsTmp);
    }
  }, [urlParamsTmp])

  const handleChange = (e, type) => {
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
            <Select options={positionsFilter}
              styles={jobSelectStyles}
              placeholder={inputPlaceholder}
              onChange={e => handleChange(e, 'position')}
            />
          </li>
          <li className="jobs-filter-content__list-item">
            <div className="jobs-filter-content__header">
              <i className="icon icon-status text-dark-yellow"></i>
              ステータス
            </div>
            <Select options={statusFilter}
              styles={jobSelectStyles}
              placeholder={inputPlaceholder}
              onChange={e => handleChange(e, 'employment_type')}
            />
          </li>
          <li className="jobs-filter-content__list-item">
            <div className="jobs-filter-content__header">
              <i className="icon icon-code text-dark-yellow"></i>
              プログラミング言語
            </div>
            <Select options={programmingFilter}
              styles={jobSelectStyles}
              placeholder={inputPlaceholder}
              onChange={e => handleChange(e, 'programming_language')}
            />
          </li>
          <li className="jobs-filter-content__list-item">
            <div className="jobs-filter-content__header">
              <i className="icon icon-marker text-dark-yellow"></i>
              地域
            </div>
            <Select options={regionsFilter}
              styles={jobSelectStyles}
              placeholder={inputPlaceholder}
              onChange={e => handleChange(e, 'prefecture')}
            />
          </li>
        </ul>
      </div>
    </aside>
  );
}

const mapStateToProps = (state) => ({
  filters: state.filters
});

export default connect(mapStateToProps)(JobsFilter);
