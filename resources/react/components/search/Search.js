import React, { useState, useEffect } from 'react';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import 'react-tabs/style/react-tabs.css';
import { useLocation } from 'react-router-dom';

import { state } from '../../constants/state';

const Search = _ => {
  const [tabIndex, setTabIndex] = useState(0);
  const [searchTerm, setSearchTerm] = useState('');
  const location = useLocation();
  const urlParams = new URLSearchParams(location.search);

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
        </TabPanel>
        <TabPanel className="search-tab__panel">
          <h3 className="search-tab__panel-title">で検索 {searchTerm}</h3>
        </TabPanel>
        <TabPanel className="search-tab__panel">
          <h3 className="search-tab__panel-title">で検索 {searchTerm}</h3>
        </TabPanel>
      </Tabs>
    </div>
  );
}

export default Search;
