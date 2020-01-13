import React, { useState, useEffect } from 'react';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import 'react-tabs/style/react-tabs.css';
import { Link, useLocation } from 'react-router-dom';

import Button from '../common/Button';
import Fraction from '../common/Fraction';
import Loading from '../common/Loading';
import Nada from '../common/Nada';
import Pagination from '../common/Pagination';
import Pill from '../common/Pill';
import SearchAPI from '../../utils/search';
import generateRoute from '../../utils/generateRoute';
import { state } from '../../constants/state';
import { routes } from '../../constants/routes';

import avatarPlaceholder from '../../../img/avatar-default.png';
import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const Search = _ => {
  const [isLoading, setIsLoading] = useState(true);
  const [tabIndex, setTabIndex] = useState(0);
  const [searchTerm, setSearchTerm] = useState('');
  const [jobs, setJobs] = useState({});
  const [companies, setCompanies] = useState({});
  const location = useLocation();
  const urlParams = new URLSearchParams(location.search);

  const handleTabChange = index => {
    setTabIndex(index);
  }

  async function getResults() {
    setSearchTerm(urlParams.get('search'));

    const request = await SearchAPI.getResults({
      search: urlParams.get('search'),
      jobs_page: urlParams.get('jobs_page'),
      companies_page: urlParams.get('companies_page')
    });

    return request.data;
  }

  useEffect(_ => {
    setIsLoading(true);

    getResults()
      .then(res => {
        setJobs(res.jobs);
        setCompanies(res.companies);

        setIsLoading(false);
      })
      .catch(error => {
        console.log('[Search ERROR]', error);

        setIsLoading(false);
      });
  }, [location.search]);

  return (
    <div className="search">
      <Tabs className="search-tab" selectedIndex={tabIndex} onSelect={tabIndex => setTabIndex(tabIndex)}>
        <TabList className="search-tab__list">
          <Tab className="search-tab__list-item" selectedClassName={state.ACTIVE} onClick={_ => handleTabChange(0)}>すべて</Tab>
          <Tab className="search-tab__list-item" selectedClassName={state.ACTIVE}
            disabled={companies.total <= 3}
            onClick={_ => handleTabChange(1)}>会社</Tab>
          <Tab className="search-tab__list-item" selectedClassName={state.ACTIVE}
            disabled={jobs.total <= 3}
            onClick={_ => handleTabChange(2)}>募集</Tab>
        </TabList>

        <TabPanel className="search-tab__panel">
          <h3 className="search-tab__panel-title">で検索 {searchTerm}</h3>

          <div className="search-tab__panel-content">
            <div className="search-tab__panel-content-top">
              <h4 className="search-tab__panel-content-title">会社</h4>
              <Fraction numerator={(companies.data && (companies.data.length > 3 ? 3 : companies.data.length)) || 0}
                denominator={companies.total || 0}
              />
            </div>
            <div className="search-tab__panel-content-main">
              { isLoading ? (
                <Loading />
              ) : (
                companies.data && companies.data.length ? (
                  <ul className="search-tab__panel-content-list">
                    { [...companies.data].splice(0, 3).map((item, idx) => (
                      <li className="search-tab__panel-content-item" key={idx}>
                        <img src={item.avatar || avatarPlaceholder} alt=""/>
                        <Link to={generateRoute(routes.COMPANY_DETAIL, { id: item.id })}
                          className="button button--link">
                          <div className="search-tab__panel-content-company">
                            {item.company_name}
                          </div>
                        </Link>
                      </li>
                    ))}
                  </ul>
                ) : <Nada>条件を変えて探してみましょう。</Nada>
              )}
            </div>
            { companies.total > 3 ? (
              <div className="search-tab__panel-content-bottom">
                <Button className="button--small" onClick={_ => setTabIndex(1)}>
                  もっと見る
                </Button>
              </div>
            ) : null }
          </div>

          <div className="search-tab__panel-content">
            <div className="search-tab__panel-content-top">
              <h4 className="search-tab__panel-content-title">募集</h4>
              <Fraction numerator={(jobs.data && (jobs.data.length > 3 ? 3 : jobs.data.length)) || 0}
                denominator={jobs.total || 0}
              />
            </div>
            <div className="search-tab__panel-content-main">
              { isLoading ? (
                <Loading />
              ) : (
                jobs.data && jobs.data.length ? (
                  <ul className="search-tab__panel-content-list">
                    { [...jobs.data].splice(0, 3).map((item, idx) => (
                      <li className="search-tab__panel-content-item search-tab__panel-content-item--jobs" key={idx}>
                        <div className="search-tab__panel-content-item-left">
                          <div className="search-tab__panel-content-eyecatch">
                            <div className="search-tab__panel-content-eyecatch-img" style={{ backgroundImage: `url("${item.cover_photo || ecPlaceholder}")` }}></div>
                          </div>
                        </div>
                        <div className="search-tab__panel-content-item-right">
                          <ul className="search-tab__panel-content-pills">
                            <li className="search-tab__panel-content-pills-item">
                              <Pill className="pill--large">PHP</Pill>
                            </li>
                            <li className="search-tab__panel-content-pills-item">
                              <Pill className="pill--large">バックエンドエンジニア</Pill>
                            </li>
                          </ul>
                          <Link to={generateRoute(routes.JOB_DETAIL, { id: item.id })}
                            className="button button--link">
                            <div className="search-tab__panel-content-job">
                              {item.title}
                            </div>
                          </Link>
                        </div>
                      </li>
                    ))}
                  </ul>
                ) : <Nada>条件を変えて探してみましょう。</Nada>
              )}
            </div>
            { jobs.total > 3 ? (
              <div className="search-tab__panel-content-bottom">
                <Button className="button--small" onClick={_ => setTabIndex(2)}>
                  もっと見る
                </Button>
              </div>
            ) : null }
          </div>
        </TabPanel>

        <TabPanel className="search-tab__panel">
          <h3 className="search-tab__panel-title">で検索 {searchTerm}</h3><div className="search-tab__panel-content">
            <div className="search-tab__panel-content-top">
              <h4 className="search-tab__panel-content-title">会社</h4>
              <Fraction numerator={(companies.data && companies.data.length) || 0}
                denominator={companies.total || 0}
              />
            </div>
            <div className="search-tab__panel-content-main">
              { companies.data && companies.data.length ? (
                <ul className="search-tab__panel-content-list">
                  { companies.data.map((item, idx) => (
                    <li className="search-tab__panel-content-item" key={idx}>
                      <img src={item.avatar || avatarPlaceholder} alt=""/>
                      <Link to={generateRoute(routes.COMPANY_DETAIL, { id: item.id })}
                        className="button button--link">
                        <div className="search-tab__panel-content-company">
                          {item.company_name}
                        </div>
                      </Link>
                    </li>
                  ))}
                </ul>
              ) : null }
            </div>
            <div className="search-tab__panel-content-bottom">
              <Pagination
                current={companies.current_page}
                prevPage={companies.prev_page_url}
                nextPage={companies.next_page_url}
                lastPage={companies.last_page}
                searchUrl="companies_page"
              />
            </div>
          </div>
        </TabPanel>

        <TabPanel className="search-tab__panel">
          <h3 className="search-tab__panel-title">で検索 {searchTerm}</h3>

          <div className="search-tab__panel-content">
            <div className="search-tab__panel-content-top">
              <h4 className="search-tab__panel-content-title">募集</h4>
              <Fraction numerator={(jobs.data && jobs.data.length) || 0}
                denominator={jobs.total || 0}
              />
            </div>
            <div className="search-tab__panel-content-main">
              { jobs.data && jobs.data.length ? (
                <ul className="search-tab__panel-content-list">
                  { jobs.data.map((item, idx) => (
                    <li className="search-tab__panel-content-item search-tab__panel-content-item--jobs" key={idx}>
                      <div className="search-tab__panel-content-item-left">
                        <div className="search-tab__panel-content-eyecatch">
                          <div className="search-tab__panel-content-eyecatch-img" style={{ backgroundImage: `url("${item.cover_photo || ecPlaceholder}")` }}></div>
                        </div>
                      </div>
                      <div className="search-tab__panel-content-item-right">
                        <ul className="search-tab__panel-content-pills">
                          <li className="search-tab__panel-content-pills-item">
                            <Pill className="pill--large">PHP</Pill>
                          </li>
                          <li className="search-tab__panel-content-pills-item">
                            <Pill className="pill--large">バックエンドエンジニア</Pill>
                          </li>
                        </ul>
                        <Link to={generateRoute(routes.JOB_DETAIL, { id: item.id })}
                          className="button button--link">
                          <div className="search-tab__panel-content-job">
                            {item.title}
                          </div>
                        </Link>
                      </div>
                    </li>
                  ))}
                </ul>
              ) : null}
            </div>
            <div className="search-tab__panel-content-bottom">
              <Pagination
                current={jobs.current_page}
                prevPage={jobs.prev_page_url}
                nextPage={jobs.next_page_url}
                lastPage={jobs.last_page}
                searchUrl="jobs_page"
              />
            </div>
          </div>
        </TabPanel>
      </Tabs>
    </div>
  );
}

export default Search;
