import React, { useState } from 'react';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import { connect } from 'react-redux';
import 'react-tabs/style/react-tabs.css';

import Button from '../common/Button';
import Input from '../common/Input';
import { state } from '../../constants/state';

import { updateUserPass } from '../../actions/user';

const Settings = (props) => {
  const { handleUpdateUserPass } = props;
  const [tabIndex, setTabIndex] = useState(0);
  const [form1Values, setForm1Values] = useState({
    password_new: '',
    password_new_confirm: ''
  });
  const [form2Value, setForm2Value] = useState({
    email_new: ''
  });
  const [formMessage, setFormMessage] = useState({
    type: '', message: ''
  });
  const [buttonEnable, setButtonEnable] = useState(false);

  const handleSubmit = e => {
    e.preventDefault();

    if (tabIndex === 0) {
      handleUpdateUserPass(form1Values.password_new).then((res) => {
        if (res.status == 200) {
          setFormMessage({
            type: 'success',
            message: 'パスワードを変更しました'
          });
        } else {
          setFormMessage({
            type: 'error',
            message: 'There is an error somewhere. Please try again.'
          });
        }
      });
    } else {
      // TODO: handle change email
    }
  }

  const handleTabChange = index => {
    setTabIndex(index);

    setForm1Values({password_new: '', password_new_confirm: ''});
    setForm2Value({email_new: ''});
    setFormMessage({type: '', message: ''});
    setButtonEnable(false);
  }

  const handleChange = e => {
    e.persist();

    if (tabIndex === 0) {
      setForm1Values(prevState => {
        return { ...prevState, [e.target.name]: e.target.value }
      });
    } else {
      setForm2Value(prevState => {
        return { ...prevState, [e.target.name]: e.target.value }
      });
    }
  }

  const handleBlur = _ => {
    if (tabIndex === 0) {
      setFormMessage({
        type: '',
        message: ''
      });

      setButtonEnable(true);

      if (form1Values.password_new !== form1Values.password_new_confirm) {
        setFormMessage({
          type: 'error',
          message: 'パスワードが一致していません'
        });
        setButtonEnable(false);
      }

      if (form1Values.password_new.length < 8) {
        setFormMessage({
          type: 'error',
          message: 'minimum 8 characters' // TODO: Change text
        });
        setButtonEnable(false);
      }
    }
  }

  return (
    <div className="settings">
      <Tabs className="settings-tab" selectedIndex={tabIndex} onSelect={tabIndex => setTabIndex(tabIndex)}>
        <TabList className="settings-tab__list">
          <Tab className="settings-tab__list-item" selectedClassName={state.ACTIVE} onClick={_ => handleTabChange(0)}>パスワードの変更</Tab>
          <Tab className="settings-tab__list-item" selectedClassName={state.ACTIVE} onClick={_ => handleTabChange(1)}>メールアドレスの変更</Tab>
        </TabList>

        <TabPanel className="settings-tab__panel">
          { formMessage.message ? (
            <div className={`settings-tab__message ${formMessage.type === 'error' ? 'settings-tab__message--warning' : ''}`}>
              <i className="icon icon-check-circle"></i>
              { formMessage.message }
            </div>
          )
          : null}

          <form className="settings-form" id="js-form-email-change"
            onSubmit={e => handleSubmit(e)}>

            <div className="settings-form__group">
              <div className="settings-form__group-label">
                新しいパスワード
              </div>
              <Input className="settings-form__group-input"
                value={form1Values.password_new}
                onChange={e => handleChange(e)}
                onBlur={_ => handleBlur()}
                name="password_new"
                type="password"
              />
            </div>

            <div className="settings-form__group">
              <div className="settings-form__group-label">
                新しいパスワード（の確認）
              </div>
              <Input className="settings-form__group-input"
                value={form1Values.password_new_confirm}
                onChange={e => handleChange(e)}
                onBlur={_ => handleBlur()}
                name="password_new_confirm"
                type="password"
              />
            </div>

            <div className="settings-form__actions">
              <Button className={`settings-form__actions-button ${buttonEnable ? '' : state.DISABLED }`} type="submit">
                変更
              </Button>
              <Button className="button--link button--link-form" onClick={_ => setTabIndex(1)}>
                パスワードを忘れましたか？
              </Button>
            </div>

          </form>
        </TabPanel>
        <TabPanel className="settings-tab__panel">
          { formMessage.message ? (
            <div className="settings-tab__message">
              <i className="icon icon-check-circle"></i>
              メールアドレスを変更しました {/* TODO: add text as form message */}
            </div>
          )
          : null}

          <form className="settings-form" id="js-form-email-change"
            onSubmit={e => handleSubmit(e)}>

            <div className="settings-form__group">
              <div className="settings-form__group-label">
                新しいメールアドレス
              </div>
              <Input className="settings-form__group-input"
                value={form2Value.email_new}
                onChange={e => handleChange(e)}
                name="email_new"
                type="email"
              />
            </div>

            <div className="settings-form__actions">
              <Button className="settings-form__actions-button" type="submit">
                認証メール送信
              </Button>
            </div>
          </form>
        </TabPanel>
      </Tabs>
    </div>
  );
}

const mapDispatchToProps = (dispatch) => ({
  handleUpdateUserPass: (password) => {
    return dispatch(updateUserPass(password));
  }
});

export default connect(null, mapDispatchToProps)(Settings);
