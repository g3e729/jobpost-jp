import React from 'react';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import "react-tabs/style/react-tabs.css";

import Button from '../common/Button';

const Settings = ({...props}) => {
  console.log(props);

  return (
    <div className="settings">
      <Tabs>
        <TabList>
          <Tab>メールアドレスの変更</Tab>
          <Tab>パスワードの変更</Tab>
        </TabList>

        <TabPanel>
          <h2>Form 1</h2>

          <div className="settings-form__actions">
            <Button type="submit">
              変更
            </Button>
            <Button className="button--link button--link-form">
              パスワードを忘れましたか？
            </Button>

          </div>
        </TabPanel>
        <TabPanel>
          <h2>Form 2</h2>

          <div className="settings-form__actions">
            <Button type="submit">
              認証メール送信
            </Button>
          </div>
        </TabPanel>
      </Tabs>
    </div>
  );
}

export default Settings;
