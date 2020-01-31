import React, { useEffect, useState } from 'react';
import Select from 'react-select';
import { connect } from 'react-redux';
import { useHistory } from 'react-router-dom';

import { jobSelectStyles } from '../../constants/config';

const JobsFilter = (props) => {
  const [positionsFilter, setPositionsFilter] = useState([]);
  const [programmingFilter, setProgrammingFilter] = useState([]);
  const [regionsFilter, setRegionsFilter] = useState([]);
  const [statusFilter, setStatusFilter] = useState([]);
  const [formValues, setFormValues] = useState({
    postion: null,
    employment_type: null,
    programming_language: null,
    prefecture: null,
  });
  const urlParams = new URLSearchParams(location.search);
  const [urlParamsTmp, setUrlParamsTmp] = useState(urlParams.toString() ? `?${urlParams.toString()}` : '');
  const history = useHistory();
  const { filters } = props;
  const data = (filters.filtersData && filters.filtersData.jobs);
  const inputPlaceholder = '指定なし';

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
        return {value: item, label: Object.values(data.status)[idx]};
      }));
    }
  }, [data])

  useEffect(_ => {
    if (urlParamsTmp) {
      history.push(urlParamsTmp);
    }
  }, [urlParamsTmp])

  useEffect(_ => {
    setFormValues({
      postion: null,
      employment_type: null,
      programming_language: null,
      prefecture: null,
    });
  }, [history.location.pathname])

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
            <Select
              value={formValues.position ? positionsFilter.filter(({value}) => value === formValues.position) : null }
              options={positionsFilter}
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
            <Select
              value={formValues.employment_type ? statusFilter.filter(({value}) => value === formValues.employment_type) : null }
              options={statusFilter}
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
            <Select
              value={formValues.programming_language ? programmingFilter.filter(({value}) => value === formValues.programming_language) : null }
              options={programmingFilter}
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
            <Select
              value={formValues.prefecture ? regionsFilter.filter(({value}) => value === formValues.prefecture) : null }
              options={regionsFilter}
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
