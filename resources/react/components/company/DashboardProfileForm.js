import React, { useState, useEffect, createRef } from 'react';
import Select from 'react-select';
import moment from 'moment';
import _ from 'lodash';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import 'react-tabs/style/react-tabs.css';
import { useDispatch, connect } from 'react-redux';

import Button from '../common/Button';
import Input from '../common/Input';
import Loading from '../common/Loading';
import Textarea from '../common/Textarea';
import { state } from '../../constants/state';
import { defaultSelectStyles } from '../../constants/config';
import { updateUser } from '../../actions/user';

import avatarPlaceholder from '../../../img/avatar-default.png';
import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const DashboardProfileForm = ({user}) => {
  const dispatch = useDispatch();
  const [tabIndex, setTabIndex] = useState(1);
  const data = user.userData;
  const [formValues, setFormValues] = useState({
    description: '',
    homepage: '',
    ceo: '',
    number_of_employees: null,
    industry_id: '',
    facebook: '',
    instagram: '',
    twitter: '',
    avatar: '',
    avatar_delete: null,
    cover_photo: '',
    cover_photo_delete: null,
  });
  const monthsFilter = new Array(12)
    .fill(null)
    .map((e, idx) => {
      e = {};
      e.value = (idx < 9) ? `0${idx + 1}` : `${idx + 1}`;
      e.label = (idx < 9) ? `0${idx + 1}` : `${idx + 1}`;

      return e;
  });
  const yearsFilter = new Array(100)
    .fill(null)
    .map((e, idx) => {
      e = {};
      e.value = (moment().year() - idx);
      e.label = (moment().year() - idx);

      return e;
  });
  const industryFilter = [
    { value: '1', label: 'IT' },
    { value: 'others', label: 'Others' },
  ];
  const [fileAvatar, setFileAvatar] = useState('');
  const [hasFileAvatar, setHasFileAvatar] = useState(false);
  const [fileCoverPhoto, setFileCoverPhoto] = useState('');
  const [hasFileCoverPhoto, setHasFileCoverPhoto] = useState(false);
  const [isLoading, setIsLoading] = useState(false);
  const reader = new FileReader();
  const imageInputAvatarRef = createRef();
  const imageInputCoverRef = createRef();
  const avatarRef = createRef();
  const eyecatchRef = createRef();
  const placeholderAvatar = (data.profile && data.profile.avatar) || avatarPlaceholder;
  const placeholderCover = (data.profile && data.profile.cover_photo) || ecPlaceholder;

  const handleChange = e => {
    e.persist();

    setFormValues(prevState => {
      return { ...prevState, [e.target.name]: e.target.value }
    });
  }

  const handleSelect = (e, type) => {
    setFormValues(prevState => {
      return { ...prevState, [type]:  e.value }
    });
  }

  const handleOpenFile = (e, type = null) => {
    e.preventDefault();

    if (type === 'avatar') {
      imageInputAvatarRef.current.click();
    } else {
      imageInputCoverRef.current.click();
    }
  }

  const handleUpdateFile = (e, type = null) => {
    if (type === 'avatar') {
      setFileAvatar(e.target.files[0]);
    } else {
      setFileCoverPhoto(e.target.files[0]);
    }
  }

  const handleRemoveFile = (e, type = null) => {
    e.preventDefault();

    if (type === 'avatar') {
      setFileAvatar('');
      setFormValues(prevState => {
        return { ...prevState, avatar_delete: 1 }
      });
      setHasFileAvatar(false);

      avatarRef.current.style.backgroundImage = `url("${placeholderAvatar}")`;
    } else {
      setFileCoverPhoto('');
      setFormValues(prevState => {
        return { ...prevState, cover_photo_delete: 1 }
      });
      setHasFileCoverPhoto(false);

      eyecatchRef.current.style.backgroundImage = `url("${placeholderCover}")`;
    }
  }

  const handleTabChange = index => {
    setTabIndex(index);
  }

  const handleSubmit = _.debounce((e) => {
    e.persist();
    setIsLoading(true);

    const formdata = new FormData();
    if (tabIndex === 0) {
      console.log('tabIndex :', tabIndex);
    } else {
      formdata.append('description', formValues.description);
      formdata.append('homepage', formValues.homepage);
      formdata.append('ceo', formValues.ceo);
      formdata.append('number_of_employees', formValues.number_of_employees);
      formdata.append('established_date', moment(new Date(
        new Date(`${formValues.yearestablished}-${formValues.monthestablished}`)
      )).format('YYYY-MM-DD'));
      formdata.append('industry_id', formValues.industry_id);
      formdata.append('social_media[facebook]', formValues.facebook);
      formdata.append('social_media[instagram]', formValues.instagram);
      formdata.append('social_media[twitter]', formValues.twitter);
      formdata.append('avatar', formValues.avatar || '');
      if (formValues.avatar) {
        formdata.append('avatar_delete', parseInt(formValues.avatar_delete));
      }
      formdata.append('cover_photo', formValues.cover_photo || '');
      if (formValues.cover_photo) {
        formdata.append('cover_photo_delete', parseInt(formValues.cover_photo_delete));
      }

      dispatch(updateUser(formdata))
        .then(_ => {
          setIsLoading(false);
        })
        .catch(error => {
          setIsLoading(false);
        });
    }
  }, 400);

  useEffect(_ => {
    if (fileAvatar || fileCoverPhoto) {
      const file = fileAvatar || fileCoverPhoto;
      reader.readAsDataURL(file);
      reader.onload = ev => {
        if (fileAvatar) {
          avatarRef.current.style.backgroundImage = `url("${ev.target.result}")`;
          setFormValues(prevState => {
            return { ...prevState, avatar: file, avatar_delete: 1 }
          });
          setHasFileAvatar(true);
        } else if (fileCoverPhoto) {
          eyecatchRef.current.style.backgroundImage = `url("${ev.target.result}")`;
          setFormValues(prevState => {
            return { ...prevState, cover_photo: file, cover_photo_delete: 1 }
          });
          setHasFileCoverPhoto(true);
        }
      }
    }
  }, [fileAvatar, fileCoverPhoto]);

  useEffect(_ => {
    if (data && data.profile) {
      setFormValues(prevState => {
        return { ...prevState,
          description: data.profile.description || '',
          homepage: data.profile.homepage || '',
          ceo: data.profile.ceo || '',
          number_of_employees: data.profile.number_of_employees || null,
          monthestablished: data.profile.established_date ? moment(data.profile.established_date).format('MM') : moment().format('MM'),
          yearestablished: data.profile.established_date ? moment(data.profile.established_date).year() : moment().year(),
          industry_id: data.profile.industry || '',
          facebook: data.profile.facebook || '',
          instagram: data.profile.instagram || '',
          twitter: data.profile.twitter || '',
          avatar: '',
          avatar_delete: null,
          cover_photo: '',
          cover_photo_delete: null,
        }
      });
    }
  }, [data]);

  return (
    <div className="dashboard-section">
      <div className="dashboard-section__content">
        <div className="dashboard-form__container">
          <h3 className="dashboard-form__title">候補者一覧</h3>

          { isLoading ? (
            <Loading className="loading--padded" />
          ) : (
            <Tabs className="dashboard-form__tab" selectedIndex={tabIndex} onSelect={tabIndex => setTabIndex(tabIndex)}>
              <TabList className="dashboard-form__tab-list">
                <Tab className="dashboard-form__tab-list-item" selectedClassName={state.ACTIVE} onClick={_ => handleTabChange(0)}>基本情報</Tab>
                <Tab className="dashboard-form__tab-list-item" selectedClassName={state.ACTIVE} onClick={_ => handleTabChange(1)}>プロフィール</Tab>
              </TabList>

              <TabPanel className="dashboard-form__tab-panel">
                <form className="dashboard-form__main" onSubmit={_ => console.log('Edit profile a')}>
                  <div className="dashboard-form__main-group">
                    <div className="dashboard-form__main-group-label">{`What
                      何をやってい
                      るのか
                    `}
                    </div>
                    <div className="dashboard-form__main-group-cluster">
                      <Textarea className="dashboard-form__main-group-input"
                        value={formValues.what_text}
                        onChange={e => handleChange(e)}
                        name="what_text"
                        row="7"
                      />
                      ...
                    </div>
                  </div>
                  <div className="dashboard-form__main-group">
                    <div className="dashboard-form__main-group-label">{`Why
                      なぜやるのか
                    `}
                    </div>
                    <div className="dashboard-form__main-group-cluster">
                      <Textarea className="dashboard-form__main-group-input"
                        value={formValues.why_text}
                        onChange={e => handleChange(e)}
                        name="why_text"
                        row="7"
                      />
                      ...
                    </div>
                  </div>
                  <div className="dashboard-form__main-group">
                    <div className="dashboard-form__main-group-label">{`How
                      どうやっているか
                    `}
                    </div>
                    <div className="dashboard-form__main-group-cluster">
                      <Textarea className="dashboard-form__main-group-input"
                        value={formValues.how_text}
                        onChange={e => handleChange(e)}
                        name="how_text"
                        row="7"
                      />
                      ...
                    </div>
                  </div>
                </form>
              </TabPanel>
              <TabPanel className="dashboard-form__tab-panel">
                <form className="dashboard-form__main" onSubmit={_ => console.log('Edit profile b')}>
                  <div className="dashboard-form__main-group">
                    <div className="dashboard-form__main-group-label">
                      会社紹介
                    </div>
                    <Textarea className="dashboard-form__main-group-input"
                      value={formValues.description}
                      onChange={e => handleChange(e)}
                      name="description"
                      row="4"
                    />
                  </div>

                  <div className="dashboard-form__main-group">
                    <div className="dashboard-form__main-group-label">
                      HPアドレス
                    </div>
                    <Input className="dashboard-form__main-group-input"
                      value={formValues.homepage}
                      onChange={e => handleChange(e)}
                      name="homepage"
                      type="url"
                    />
                  </div>

                  <div className="dashboard-form__main-group">
                    <div className="dashboard-form__main-group-label">
                      創業者
                    </div>
                    <Input className="dashboard-form__main-group-input"
                      value={formValues.ceo}
                      onChange={e => handleChange(e)}
                      name="ceo"
                      type="text"
                    />
                  </div>

                  <div className="dashboard-form__main-group">
                    <div className="dashboard-form__main-group-label">
                      社員数
                    </div>
                    <Input className="dashboard-form__main-group-input"
                      value={formValues.number_of_employees}
                      onChange={e => handleChange(e)}
                      name="number_of_employees"
                      type="number"
                    />
                  </div>

                  <div className="dashboard-form__main-group">
                    <div className="dashboard-form__main-group-label">
                      設立年月
                    </div>
                    <div className="dashboard-form__main-group-cluster dashboard-form__main-group-cluster--half">
                      <Select options={monthsFilter}
                        styles={defaultSelectStyles}
                        placeholder={formValues.monthestablished}
                        onChange={e => handleSelect(e, 'monthestablished')}
                      />
                      <Select options={yearsFilter}
                        styles={defaultSelectStyles}
                        placeholder={formValues.yearestablished}
                        onChange={e => handleSelect(e, 'yearestablished')}
                      />
                    </div>
                  </div>

                  <div className="dashboard-form__main-group">
                    <div className="dashboard-form__main-group-label">
                      業種・業界
                    </div>
                    <Select options={industryFilter}
                      styles={defaultSelectStyles}
                      placeholder={formValues.industry_id}
                      onChange={e => handleSelect(e, 'industry_id')}
                    />
                  </div>

                  <div className="dashboard-form__main-group">
                    <div className="dashboard-form__main-group-label">
                      Facebook
                    </div>
                    <Input className="dashboard-form__main-group-input"
                      value={formValues.facebook}
                      onChange={e => handleChange(e)}
                      name="facebook"
                      type="url"
                    />
                  </div>

                  <div className="dashboard-form__main-group">
                    <div className="dashboard-form__main-group-label">
                      Instagram
                    </div>
                    <Input className="dashboard-form__main-group-input"
                      value={formValues.instagram}
                      onChange={e => handleChange(e)}
                      name="instagram"
                      type="url"
                    />
                  </div>

                  <div className="dashboard-form__main-group">
                    <div className="dashboard-form__main-group-label">
                      Twitter
                    </div>
                    <Input className="dashboard-form__main-group-input"
                      value={formValues.twitter}
                      onChange={e => handleChange(e)}
                      name="twitter"
                      type="url"
                    />
                  </div>

                  <div className="dashboard-form__main-group">
                    <div className="dashboard-form__main-group-label">
                      会社ロゴ<span>128 x 128 (px)</span>
                    </div>
                    <div className="dashboard-form__main-group-cluster dashboard-form__main-group-cluster--bordered">
                      <input className="input dashboard-form__main-group-input"
                        onChange={e => handleUpdateFile(e, 'avatar')}
                        onClick={e => e.target.value = null}
                        ref={imageInputAvatarRef}
                        accept="image/*"
                        type="file"
                        style={{ display: 'none' }}
                      />
                      <div className="dashboard-form__main-group-avatar">
                        <div className="dashboard-form__main-group-avatar-img" ref={avatarRef} style={{ backgroundImage: `url("${placeholderAvatar}")` }}></div>
                      </div>
                      <div className="dashboard-form__main-group-actions">
                        <Button className="button--pill" onClick={e => handleOpenFile(e, 'avatar')}>
                          <>
                            <i className="icon icon-image text-dark-yellow"></i>
                            アップロード
                          </>
                        </Button>
                        <Button className={`button--link dashboard-form__main-group-actions-button ${!hasFileAvatar ? state.DISABLED : ''}`}
                          onClick={e => handleRemoveFile(e, 'avatar')}>
                          <>
                            <i className="icon icon-cross"></i>
                            画像を削除
                          </>
                        </Button>
                      </div>
                    </div>
                  </div>

                  <div className="dashboard-form__main-group">
                    <div className="dashboard-form__main-group-label">
                      会社ロゴ<span>1055 x 356 (px)</span>
                    </div>
                    <div className="dashboard-form__main-group-cluster dashboard-form__main-group-cluster--bordered">
                      <input className="input dashboard-form__main-group-input"
                        onChange={e => handleUpdateFile(e, 'cover_photo')}
                        onClick={e => e.target.value = null}
                        ref={imageInputCoverRef}
                        accept="image/*"
                        type="file"
                        style={{ display: 'none' }}
                      />
                      <div className="dashboard-form__main-group-eyecatch">
                        <div className="dashboard-form__main-group-eyecatch-img" ref={eyecatchRef} style={{ backgroundImage: `url("${placeholderCover}")` }}></div>
                      </div>
                      <div className="dashboard-form__main-group-actions">
                        <Button className="button--pill" onClick={e => handleOpenFile(e, 'cover_photo')}>
                          <>
                            <i className="icon icon-image text-dark-yellow"></i>
                            アップロード
                          </>
                        </Button>
                        <Button className={`button--link dashboard-form__main-group-actions-button ${!hasFileCoverPhoto ? state.DISABLED : ''}`}
                          onClick={e => handleRemoveFile(e, 'cover_photo')}>
                          <>
                            <i className="icon icon-cross"></i>
                            画像を削除
                          </>
                        </Button>
                      </div>
                    </div>
                  </div>

                </form>
              </TabPanel>

              <div className="dashboard-form__button">
                <Button type="submit" onClick={e => handleSubmit(e)}>更新</Button>
              </div>
            </Tabs>
          )}
        </div>
      </div>
    </div>
  )
}

const mapStateToProps = (state) => ({
  user: state.user
});

export default connect(mapStateToProps)(DashboardProfileForm);
