import React, { useState } from 'react';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import 'react-tabs/style/react-tabs.css';

import Input from '../common/Input';
import { state } from '../../constants/state';

const DashboardProfileForm = _ => {
  const [tabIndex, setTabIndex] = useState(0);
  const [formValues, setFormValues] = useState({
    // state: ''
  });

  const handleChange = e => {
    e.persist();

    setFormValues(prevState => {
      return { ...prevState, [e.target.name]: e.target.value }
    });
  }

  const handleTabChange = index => {
    setTabIndex(index);
  }

  return (
    <div className="dashboard-section">
      <div className="dashboard-section__content">
        <div className="dashboard-form__container">
          <h3 className="dashboard-form__title">候補者一覧</h3>

          <Tabs className="dashboard-form__tab" selectedIndex={tabIndex} onSelect={tabIndex => setTabIndex(tabIndex)}>
            <TabList className="dashboard-form__tab-list">
              <Tab className="dashboard-form__tab-list-item" selectedClassName={state.ACTIVE} onClick={_ => handleTabChange(0)}>基本情報</Tab>
              <Tab className="dashboard-form__tab-list-item" selectedClassName={state.ACTIVE} onClick={_ => handleTabChange(1)}>プロフィール</Tab>
            </TabList>

            <TabPanel className="dashboard-form__tab-panel">
              <form className="dashboard-form__main" onSubmit={_ => console.log('Edit profile a')}>
              <div className="dashboard-form__main-group">
                <div className="dashboard-form__main-group-label">
                  特徴１
                </div>
                <div className="dashboard-form__main-group-cluster">
                  <Input className="dashboard-form__main-group-input"
                    value={formValues.address3}
                    onChange={e => handleChange(e)}
                    name="address3"
                    type="test"
                    placeholder=""
                  />

                  <Input className="dashboard-form__main-group-input"
                    value={formValues.address1}
                    onChange={e => handleChange(e)}
                    name="address1"
                    type="text"
                    placeholder=""
                  />

                  <Input className="dashboard-form__main-group-input"
                    value={formValues.address2}
                    onChange={e => handleChange(e)}
                    name="address2"
                    type="text"
                    placeholder=""
                  />
                </div>
              </div>
              </form>
            </TabPanel>
            <TabPanel className="dashboard-form__tab-panel">
              form b
            </TabPanel>
          </Tabs>
        </div>
      </div>
    </div>
  )
}

export default DashboardProfileForm;
