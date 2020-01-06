import React, { useState, useEffect } from 'react';
import faker from 'faker';
faker.locale = "ja";
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import 'react-tabs/style/react-tabs.css';
import { useLocation } from 'react-router-dom';

import Button from '../common/Button';
import Fraction from '../common/Fraction';
import Pagination from '../common/Pagination';
import Pill from '../common/Pill';
import { state } from '../../constants/state';

const Search = _ => {
  const [tabIndex, setTabIndex] = useState(0);
  const [searchTerm, setSearchTerm] = useState('');
  const location = useLocation();
  const urlParams = new URLSearchParams(location.search);

  const dummyCompanies = new Array(10)
    .fill(null)
    .map(e => {
      e = {};
      e.id = faker.random.uuid();
      e.company = faker.company.companyName();

      return e;
    })

  const dummyJobs = new Array(10)
    .fill(null)
    .map(e => {
      e = {};
      e.id = faker.random.uuid();
      e.job = faker.name.jobType();
      e.title = faker.random.words();

      return e;
    })

  const handleTabChange = index => {
    setTabIndex(index);
  }

  useEffect(_ => {
    setSearchTerm(urlParams.get('query'));
  }, [location]);

  return (
    <div className="search">
      <Tabs className="search-tab" selectedIndex={tabIndex} onSelect={tabIndex => setTabIndex(tabIndex)}>
        <TabList className="search-tab__list">
          <Tab className="search-tab__list-item" selectedClassName={state.ACTIVE} onClick={_ => handleTabChange(0)}>すべて</Tab>
          <Tab className="search-tab__list-item" selectedClassName={state.ACTIVE} onClick={_ => handleTabChange(1)}>会社</Tab>
          <Tab className="search-tab__list-item" selectedClassName={state.ACTIVE} onClick={_ => handleTabChange(2)}>募集</Tab>
        </TabList>

        <TabPanel className="search-tab__panel">
          <h3 className="search-tab__panel-title">で検索 {searchTerm}</h3>

          <div className="search-tab__panel-content">
            <div className="search-tab__panel-content-top">
              <h4 className="search-tab__panel-content-title">会社</h4>
              <Fraction numerator="10"
                denominator="45"
              />
            </div>
            <div className="search-tab__panel-content-main">
              <ul className="search-tab__panel-content-list">
                { dummyCompanies.splice(0, 3).map((item, idx) => (
                  <li className="search-tab__panel-content-item" key={idx}>
                    <img src="https://lorempixel.com/240/240/city/" alt=""/>
                    <div className="search-tab__panel-content-company">
                      {item.company}
                    </div>
                  </li>
                ))}
              </ul>
            </div>
            <div className="search-tab__panel-content-bottom">
              <Button className="button--small" onClick={_ => setTabIndex(1)}>
                もっと見る
              </Button>
            </div>
          </div>

          <div className="search-tab__panel-content">
            <div className="search-tab__panel-content-top">
              <h4 className="search-tab__panel-content-title">募集</h4>
              <Fraction numerator="10"
                denominator="45"
              />
            </div>
            <div className="search-tab__panel-content-main">
              <ul className="search-tab__panel-content-list">
                { dummyJobs.splice(0, 3).map((item, idx) => (
                  <li className="search-tab__panel-content-item search-tab__panel-content-item--jobs" key={idx}>
                    <div className="search-tab__panel-content-item-left">
                      <div className="search-tab__panel-content-eyecatch">
                        <div className="search-tab__panel-content-eyecatch-img" style={{ backgroundImage: 'url("https://lorempixel.com/640/640/business/")' }}></div>
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
                      <div className="search-tab__panel-content-job">
                        {item.title}
                      </div>
                    </div>
                  </li>
                ))}
              </ul>
            </div>
            <div className="search-tab__panel-content-bottom">
              <Button className="button--small" onClick={_ => setTabIndex(2)}>
                もっと見る
              </Button>
            </div>
          </div>
        </TabPanel>

        <TabPanel className="search-tab__panel">
          <h3 className="search-tab__panel-title">で検索 {searchTerm}</h3><div className="search-tab__panel-content">
            <div className="search-tab__panel-content-top">
              <h4 className="search-tab__panel-content-title">会社</h4>
              <Fraction numerator="10"
                denominator="45"
              />
            </div>
            <div className="search-tab__panel-content-main">
              <ul className="search-tab__panel-content-list">
                { dummyCompanies.map((item, idx) => (
                  <li className="search-tab__panel-content-item" key={idx}>
                    <img src="https://lorempixel.com/240/240/city/" alt=""/>
                    <div className="search-tab__panel-content-company">
                      {item.company}
                    </div>
                  </li>
                ))}
              </ul>
            </div>
            <div className="search-tab__panel-content-bottom">
              <Pagination
                current="1"
                prevPage={null}
                nextPage="todo"
                lastPage="5"
              />
            </div>
          </div>
        </TabPanel>

        <TabPanel className="search-tab__panel">
          <h3 className="search-tab__panel-title">で検索 {searchTerm}</h3>

          <div className="search-tab__panel-content">
            <div className="search-tab__panel-content-top">
              <h4 className="search-tab__panel-content-title">募集</h4>
              <Fraction numerator="10"
                denominator="45"
              />
            </div>
            <div className="search-tab__panel-content-main">
              <ul className="search-tab__panel-content-list">
                { dummyJobs.map((item, idx) => (
                  <li className="search-tab__panel-content-item search-tab__panel-content-item--jobs" key={idx}>
                    <div className="search-tab__panel-content-item-left">
                      <div className="search-tab__panel-content-eyecatch">
                        <div className="search-tab__panel-content-eyecatch-img" style={{ backgroundImage: 'url("https://lorempixel.com/640/640/business/")' }}></div>
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
                      <div className="search-tab__panel-content-job">
                        {item.title}
                      </div>
                    </div>
                  </li>
                ))}
              </ul>
            </div>
            <div className="search-tab__panel-content-bottom">
              <Pagination
                current="1"
                prevPage={null}
                nextPage="todo"
                lastPage="5"
              />
            </div>
          </div>
        </TabPanel>
      </Tabs>
    </div>
  );
}

export default Search;
