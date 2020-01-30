import React, { useState, useEffect } from 'react';
import EdiText from 'react-editext';
import moment from 'moment';
import _ from 'lodash';
import { Link } from 'react-router-dom';
import { css } from 'emotion';
import { useDispatch, connect } from 'react-redux';

import Button from '../common/Button';
import Clipboard from '../common/Clipboard';
import Embed from '../common/Embed';
import Mapped from '../common/Mapped';
import JobsList from '../jobs/JobsList';
import Education from '../../utils/education';
import Job from '../../utils/job';
import Portfolio from '../../utils/portfolio';
import Work from '../../utils/work';
import Youtube from '../../utils/youtube';
import { routes } from '../../constants/routes';
import { sex, skills, state } from '../../constants/state';
import { modalType } from '../../constants/config';
import { setModal } from '../../actions/modal';
import { getUser, updateUser, addUserFeature, updateUserFeature } from '../../actions/user';

import avatarPlaceholder from '../../../img/avatar-default.png';
import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const Profile = (props) => {
  const dispatch = useDispatch();
  const {
    user,
    accountType,
    isEdit = false,
    isOwner = true,
    filters
  } = props;
  const [jobs, setJobs] = useState([]);
  const [isEditing, setIsEditing] = useState(false);
  const [currentPortfolio, setCurrentPortfolio] = useState(null);
  const [formValues, setFormValues] = useState({
    title: '',
    description: ''
  });
  const data = isOwner == true ? (user.userData && user.userData.profile) : user;
  const filterData = filters && filters.filtersData;
  const {
    experiences = [],
    frameworks = [],
    others = [],
    programming_languages = []
  } = (filterData !== undefined && filterData.students);
  const experienceFilter = Object.keys(experiences);
  const frameworkFilter = Object.keys(frameworks);
  const otherFilter = Object.keys(others);
  const programmingFilter = Object.keys(programming_languages);
  const youtube = new Youtube(data.movie_url || '');

  const handleModal = (type, data) => {
    dispatch(setModal(type, data));
  }

  const handleEdit = _ => {
    setIsEditing(true);
  }

  const handleSave = _ => {
    setIsEditing(false);
  }

  const handleSubmit = _.debounce((value, type) => {
    const formdata = new FormData();
    formdata.append(type, (value || ''));

    dispatch(updateUser(formdata));
    setIsEditing(false);
  }, 400)

  const handleAddFeature = _.debounce((value, type) => {
    setFormValues(prevState => {
      return { ...prevState, [type]: value }
    });
  }, 400)

  const handleUpdateFeature = _.debounce((value, type, id) => {
    const formdata = new FormData();
    formdata.append(type, (value || ''));

    dispatch(updateUserFeature(formdata, id));
    setIsEditing(false);
  }, 400)

  const handleDeletePortfolio = id => {
    Portfolio.deletePortfolio(id)
      .then(_ => {
        setTimeout(_ => {
          dispatch(getUser())
        }, 500);
      })
      .catch(error => {
        setIsLoading(false);

        console.log('[Delete portfolio ERROR] :', error);
      });
  }

  const handleDeleteWork = id => {
    Work.deleteWork(id)
      .then(_ => {
        setTimeout(_ => {
          dispatch(getUser())
        }, 500);
      })
      .catch(error => {
        setIsLoading(false);

        console.log('[Delete work ERROR] :', error);
      });
  }

  const handleDeleteEducation = id => {
    Education.deleteEducation(id)
      .then(_ => {
        setTimeout(_ => {
          dispatch(getUser())
        }, 500);
      })
      .catch(error => {
        setIsLoading(false);

        console.log('[Delete education ERROR] :', error);
      });
  }

  async function getFilteredJobs() {
    const companyId = data.id;
    const request = await Job.getFilteredJobs({
      company_profile_id: companyId,
      sort: 'desc'
    });

    return request.data;
  }

  useEffect(_ => {
    if (accountType === 'company') {
      getFilteredJobs()
        .then(res => setJobs(res.data.splice(0, 3)))
        .catch(error => console.log('[Jobs ERROR]', error));
    }
  }, []);

  useEffect(_ => {
    if (formValues.title && formValues.description) {
      const formdata = new FormData();
      formdata.append('title', formValues.title);
      formdata.append('description', formValues.description);

      dispatch(addUserFeature(formdata));
      setIsEditing(false);
      setFormValues({ title: '', description: ''});
    }
  }, [formValues])

  return (
    accountType === 'student' ? (
      <div className="profile">
        <div className="profile__main">
          <div className="profile__main-data">
            <div className="profile__main-heading">
              <h3 className="profile__main-heading-title">PROFILE</h3>
              <p className="profile__main-heading-jp">プロフィール</p>
            </div>
            <ul className="profile__main-list">
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">自己紹介</h3>
                  { isEdit ?
                    <EdiText
                      submitOnEnter
                      value={data.intro_text || ''}
                      type="textarea"
                      onSave={e => handleSubmit(e, 'intro_text')}
                      editing={isEditing}
                      saveButtonContent={<i className="icon icon-checkmark"></i>}
                      cancelButtonContent={<i className="icon icon-close"></i>}
                      editButtonContent={<i className="icon icon-pencil text-dark-yellow"></i>}
                      hideIcons={true}
                    />
                  : <p className="profile__main-list-item-copy">{data.intro_text}</p> }
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">やってみたいこと</h3>
                  { isEdit ?
                    <EdiText
                      submitOnEnter
                      value={data.what_text || ''}
                      type="textarea"
                      onSave={e => handleSubmit(e, 'what_text')}
                      editing={isEditing}
                      saveButtonContent={<i className="icon icon-checkmark"></i>}
                      cancelButtonContent={<i className="icon icon-close"></i>}
                      editButtonContent={<i className="icon icon-pencil text-dark-yellow"></i>}
                      hideIcons={true}
                    />
                  : <p className="profile__main-list-item-copy">{data.what_text}</p> }
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box profile__data">
                  <h3 className="profile__main-list-item-heading">職歴</h3>
                  { isEdit ? (
                    <Button className={`button--pill ${data.work_history && data.work_history.length >= 5 ? state.DISABLED : ''}`} onClick={_ => handleModal(modalType.PROFILE_WORK)}>
                      <>
                        <i className="icon icon-plus text-dark-yellow"></i>
                        追加
                      </>
                    </Button>
                  ) : null }
                  <dl className="profile__data-work">
                    { data.work_history && data.work_history.length > 0 && data.work_history
                      .slice(0,5)
                      .map(item => (
                        <React.Fragment key={item.id}>
                          <dt className="profile__data-work-term">
                            {item.role}
                            { isEdit ? (
                              <Button className="button--pill button--danger profile__data-work-term-button" onClick={_ => handleDeleteWork(item.id)}>
                                <>
                                  <i className="icon icon-cross text-dark-gray"></i>
                                  削除
                                </>
                              </Button>
                            ) : null }
                          </dt>
                          <dd className="profile__data-work-data">
                            <h4>{item.company_name}</h4>
                            <time>{`${moment(item.started_at).format('YYYY/MM')} ${item.ended_at ? `- ${moment(item.ended_at).format('YYYY/MM')}`: 'current'}`}</time>
                            <p>{item.content}</p>
                          </dd>
                        </React.Fragment>
                      ))
                    }
                  </dl>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box profile__data">
                  <h3 className="profile__main-list-item-heading">学歴</h3>
                  { isEdit ? (
                    <Button className={`button--pill ${data.education_history && data.education_history.length >= 1 ? state.DISABLED : ''}`} onClick={_ => handleModal(modalType.PROFILE_EDUCATION)}>
                      <>
                        <i className="icon icon-plus text-dark-yellow"></i>
                        追加
                      </>
                    </Button>
                  ) : null }
                  <dl className="profile__data-work">
                    { data.education_history && data.education_history.length > 0 && data.education_history
                      .slice(0,1)
                      .map(item => (
                        <React.Fragment key={item.id}>
                          <dt className="profile__data-work-term">{item.school_name}
                            { isEdit ? (
                              <Button className="button--pill button--danger profile__data-work-term-button" onClick={_ => handleDeleteEducation(item.id)}>
                                <>
                                  <i className="icon icon-cross text-dark-gray"></i>
                                  削除
                                </>
                              </Button>
                            ) : null }
                          </dt>
                          <dd className="profile__data-work-data">
                            <h4>{item.major}</h4>
                            <time>{moment(item.graduated_at).format('YYYY/MM')}</time>
                            <p>{item.content}</p>
                          </dd>
                        </React.Fragment>
                      ))
                    }
                  </dl>
                </div>
              </li>
              { data.applications_count || isOwner === true ? (
                <li className="profile__main-list-item">
                  <div className="profile__main-list-item-box">
                    <h3 className="profile__main-list-item-heading">ムービー</h3>
                      <div className="profile__data-video">
                        { isEdit ? null : (
                          youtube.isValid() ? (
                            <Embed src={`https://www.youtube.com/embed/${youtube.getHash()}?autoplay=0`}
                              className={`embed--16by9 ${css`margin-bottom: 22px`}`}
                              allowFullScreen />
                          ) : null
                        )}
                        <div className="profile__data-link">
                          { isEdit ?
                            <EdiText
                              submitOnEnter
                              value={data.movie_url || ''}
                              type="text"
                              onSave={e => handleSubmit(e, 'movie_url')}
                              editing={isEditing}
                              saveButtonContent={<i className="icon icon-checkmark"></i>}
                              cancelButtonContent={<i className="icon icon-close"></i>}
                              editButtonContent={<i className="icon icon-pencil text-dark-yellow"></i>}
                              hideIcons={true}
                            />
                          : <a href={data.movie_url} className="button button--profile" target="_blank">{data.movie_url}</a>  }
                          <Clipboard value={data.movie_url} />
                        </div>
                      </div>
                  </div>
                </li>
              ) : null }
            </ul>
          </div>
          <div className="profile__main-data">
            <div className="profile__main-heading">
              <h3 className="profile__main-heading-title">COMPUTER SKILLS</h3>
              <p className="profile__main-heading-jp">コンピュータースキル</p>
            </div>
            <ul className="profile__main-list profile__main-list--half">
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box profile__data">
                  <h3 className="profile__main-list-item-heading">プログラミング言語</h3>
                  { isEdit ? (
                    <Button className="button--pill" onClick={_ => handleModal(modalType.PROFILE_PROGRAMMING, {
                      ...data.skills.filter(item => programmingFilter.includes(item.skill_id))
                    })}>
                      <>
                        <i className="icon icon-plus text-dark-yellow"></i>
                        追加
                      </>
                    </Button>
                  ) : null }
                  <dl className="profile__data-skills">
                    { data.skills && data.skills.length && data.skills
                      .filter(item => {
                        return (programmingFilter.includes(item.skill_id) && item.skill_rate > 1)
                      })
                      .map((item, idx) => (
                        <React.Fragment key={idx}>
                          <dt className="profile__data-skills-term">{Object.values(programming_languages)[idx]}</dt>
                          <dd className="profile__data-skills-data">{skills[item.skill_rate]}</dd>
                        </React.Fragment>
                      ))
                    }
                  </dl>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box profile__data">
                  <h3 className="profile__main-list-item-heading">フレームワーク</h3>
                  { isEdit ? (
                    <Button className="button--pill" onClick={_ => handleModal(modalType.PROFILE_FRAMEWORK, {
                      ...data.skills.filter(item => frameworkFilter.includes(item.skill_id))
                    })}>
                      <>
                        <i className="icon icon-plus text-dark-yellow"></i>
                        追加
                      </>
                    </Button>
                  ) : null }
                  <dl className="profile__data-skills">
                    { data.skills && data.skills.length && data.skills
                      .filter(item => {
                        return (frameworkFilter.includes(item.skill_id) && item.skill_rate > 1)
                      })
                      .map((item, idx) => (
                        <React.Fragment key={idx}>
                          <dt className="profile__data-skills-term">{Object.values(frameworks)[idx]}</dt>
                          <dd className="profile__data-skills-data">{skills[item.skill_rate]}</dd>
                        </React.Fragment>
                      ))
                    }
                  </dl>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box profile__data">
                  <h3 className="profile__main-list-item-heading">その他</h3>
                  { isEdit ? (
                    <Button className="button--pill" onClick={_ => handleModal(modalType.PROFILE_OTHER, {
                      ...data.skills.filter(item => otherFilter.includes(item.skill_id))
                    })}>
                      <>
                        <i className="icon icon-plus text-dark-yellow"></i>
                        追加
                      </>
                    </Button>
                  ) : null }
                  <dl className="profile__data-skills">
                    { data.skills && data.skills.length && data.skills
                      .filter(item => {
                        return (otherFilter.includes(item.skill_id) && item.skill_rate > 1)
                      })
                      .map((item, idx) => (
                        <React.Fragment key={idx}>
                          <dt className="profile__data-skills-term">{Object.values(others)[idx]}</dt>
                          <dd className="profile__data-skills-data">{skills[item.skill_rate]}</dd>
                        </React.Fragment>
                      ))
                    }
                  </dl>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box profile__data">
                  <h3 className="profile__main-list-item-heading">経験分野</h3>
                  { isEdit ? (
                    <Button className="button--pill" onClick={_ => handleModal(modalType.PROFILE_EXPERIENCE, {
                      ...data.skills.filter(item => experienceFilter.includes(item.skill_id))
                    })}>
                      <>
                        <i className="icon icon-plus text-dark-yellow"></i>
                        追加
                      </>
                    </Button>
                  ) : null }
                  <dl className="profile__data-skills profile__data-skills--full">
                    { data.skills && data.skills.length && data.skills
                      .filter(item => {
                        return (experienceFilter.includes(item.skill_id) && item.skill_rate > 1)
                      })
                      .map((item, idx) => (
                        <React.Fragment key={idx}>
                          <dt className="profile__data-skills-term">{Object.values(experiences)[idx]}</dt>
                          <dd className="profile__data-skills-data">{skills[item.skill_rate]}</dd>
                        </React.Fragment>
                      ))
                    }
                  </dl>
                </div>
              </li>
            </ul>
          </div>
          <div className="profile__main-data">
            <div className="profile__main-heading">
              <h3 className="profile__main-heading-title">LANGUAGE</h3>
              <p className="profile__main-heading-jp">語学</p>
            </div>
            <ul className="profile__main-list profile__main-list--half">
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">話せる言語</h3>
                  { isEdit ?
                    <EdiText
                      submitOnEnter
                      value={data.language || ''}
                      type="text"
                      onSave={e => handleSubmit(e, 'language')}
                      editing={isEditing}
                      saveButtonContent={<i className="icon icon-checkmark"></i>}
                      cancelButtonContent={<i className="icon icon-close"></i>}
                      editButtonContent={<i className="icon icon-pencil text-dark-yellow"></i>}
                      hideIcons={true}
                    />
                  : <span className="profile__main-list-item-desc">{data.language}</span>}
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">TOEIC</h3>
                  { isEdit ?
                    <EdiText
                      submitOnEnter
                      value={`${data.toeic_score || 0}`}
                      type="number"
                      onSave={e => handleSubmit(e, 'toeic_score')}
                      editing={isEditing}
                      saveButtonContent={<i className="icon icon-checkmark"></i>}
                      cancelButtonContent={<i className="icon icon-close"></i>}
                      editButtonContent={<i className="icon icon-pencil text-dark-yellow"></i>}
                      hideIcons={true}
                    />
                  : <span className="profile__main-list-item-desc">{data.toeic_score}</span>}
                </div>
              </li>
            </ul>
          </div>
          <div className="profile__main-data">
            <div className="profile__main-heading">
              <h3 className="profile__main-heading-title">WEBSITE</h3>
              <p className="profile__main-heading-jp">ウェブサイト</p>
            </div>
            <ul className="profile__main-list">
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">ポートフォリオ</h3>
                  { isEdit ? (
                    <Button className={`button--pill ${data.portfolios && data.portfolios.length > 3 ? state.DISABLED : ''}`} onClick={_ => handleModal(modalType.PROFILE_PORTFOLIO)}>
                      <>
                        <i className="icon icon-plus text-dark-yellow"></i>
                        追加
                      </>
                    </Button>
                  ) : null }
                  <ul className="profile__data-websites">
                    { data.portfolios && data.portfolios.length > 0 && data.portfolios
                      .slice(0,3)
                      .map(item => (
                        <li className="profile__data-websites-item" key={item.id}>
                          <div className="profile__data-websites-eyecatch">
                            <div className="profile__data-websites-eyecatch-img" style={{ backgroundImage: `url("${item.image || ecPlaceholder}")` }}></div>
                          </div>
                          <div className="profile__data-websites-content">
                            <h4 className="profile__data-websites-name">{item.title}</h4>
                            <p className="profile__data-websites-desc">{item.description}</p>
                            <div className="profile__data-link">
                              <a href={item.url} className="button button--profile" target="_blank">{item.url}</a>
                              <Clipboard value={item.url} />
                            </div>
                          </div>
                          { isEdit ? (
                            <div className="profile__data-websites-action">
                              <Button className="button--pill button--danger" onClick={_ => handleDeletePortfolio(item.id)}>
                                <>
                                  <i className="icon icon-cross text-dark-gray"></i>
                                  削除
                                </>
                              </Button>
                            </div>
                          ) : null }
                        </li>
                      ))
                    }
                  </ul>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">Github</h3>
                  <div className="profile__data-link">
                    { isEdit ?
                      <EdiText
                        submitOnEnter
                        value={data.github || ''}
                        type="text"
                        onSave={e => handleSubmit(e, 'github')}
                        editing={isEditing}
                        saveButtonContent={<i className="icon icon-checkmark"></i>}
                        cancelButtonContent={<i className="icon icon-close"></i>}
                        editButtonContent={<i className="icon icon-pencil text-dark-yellow"></i>}
                        hideIcons={true}
                      />
                    : <a href="{data.github}" className="button button--profile" target="_blank">{data.github}</a> }
                    <Clipboard value={data.github} />
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <aside className="profile__sidebar">
          <div className="profile__sidebar-inner">
            <h3 className="profile__sidebar-header">基本情報</h3>
            <div className="profile__sidebar-content">
              <dl className="profile__sidebar-content-basic">
                <dt className="profile__sidebar-content-basic-term">生年月日</dt>
                <dd className="profile__sidebar-content-basic-data">{moment(data.birthday).format('YYYY/MM/DD')}</dd>
                <dt className="profile__sidebar-content-basic-term">性別</dt>
                <dd className="profile__sidebar-content-basic-data">{sex[`${data.sex}`]}</dd>
                <dt className="profile__sidebar-content-basic-term">住所</dt>
                <dd className="profile__sidebar-content-basic-data">{data.address1}</dd>
                <dt className="profile__sidebar-content-basic-term">ステータス</dt>
                <dd className="profile__sidebar-content-basic-data">{data.student_status}</dd>
              </dl>
              { data.social_media && data.social_media.length ? (
                <ul className="profile__sidebar-content-profile">
                  <li className="profile__sidebar-content-profile-items">
                    <ul className="profile__sidebar-content-sns">
                      { data.social_media.map((item, idx) => (
                        <li className="profile__sidebar-content-sns-item" key={item.id}>
                          <a href={item.url} target="_blank">
                            <i className={`icon icon-${item.social_media}`}></i>
                          </a>
                        </li>
                      ))}
                    </ul>
                  </li>
                </ul>
              ) : null}
            </div>
          </div>
          <div className="profile__sidebar-inner">
            <h3 className="profile__sidebar-header">レッスン</h3>
            <div className="profile__sidebar-content">
              <ul className="profile__sidebar-content-scores">
                <li className="profile__sidebar-content-scores-item">
                  <h4 className="profile__sidebar-content-scores-category">IT</h4>
                  <dl>
                    <dt>受講済み</dt>
                    { Object.values(data.taken_class).map((item, idx) => (
                      <dd key={idx}>{item}</dd>
                    ))}
                    <dt>受講中</dt>
                    <dd>{data.course}</dd>
                  </dl>
                </li>
                <li className="profile__sidebar-content-scores-item">
                  <h4 className="profile__sidebar-content-scores-category">ENGLISH</h4>
                  <dl>
                    <dt>TOEIC</dt>
                    <dd>
                      Reading<span>{data.reading}</span>
                    </dd>
                    <dd>
                      Listening<span>{data.listening}</span>
                    </dd>
                    <dd>
                      Total<span>{data.toeic_score}</span>
                    </dd>
                    <dd>
                      Speaking<span>{data.speaking}</span>
                    </dd>
                    <dd>
                      Writing<span>{data.writing}</span>
                    </dd>
                    <dd>
                      レベル<span>{data.english_level}</span>
                    </dd>
                  </dl>
                </li>
              </ul>
            </div>
          </div>
        </aside>
      </div>
    ) : accountType === 'company' ? (
      <div className="profile">
        <div className="profile__main">
          <div className="profile__main-data">
            <ul className="profile__main-list">
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">我々のミッションは</h3>
                  { isEdit ?
                    <EdiText
                      submitOnEnter
                      value={data.description || ''}
                      type="textarea"
                      onSave={e => handleSubmit(e, 'description')}
                      editing={isEditing}
                      saveButtonContent={<i className="icon icon-checkmark"></i>}
                      cancelButtonContent={<i className="icon icon-close"></i>}
                      editButtonContent={<i className="icon icon-pencil text-dark-yellow"></i>}
                      hideIcons={true}
                    />
                  : <p className="profile__main-list-item-copy">{data.description}</p> }
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box profile__data">
                  <h3 className="profile__main-list-item-heading">特徴</h3>
                  <dl className="profile__data-character">
                    { data.features && data.features.length > 0 && data.features
                      .slice(0,3)
                      .map((item, idx) => (
                        <React.Fragment key={idx}>
                          <dt className="profile__data-skills-term">
                            { isEdit ?
                              <EdiText
                                submitOnEnter
                                value={data.features[idx].title || ''}
                                type="text"
                                onSave={e => handleUpdateFeature(e, 'title', item.id)}
                                editing={isEditing}
                                saveButtonContent={<i className="icon icon-checkmark"></i>}
                                cancelButtonContent={<i className="icon icon-close"></i>}
                                editButtonContent={<i className="icon icon-pencil text-dark-yellow"></i>}
                                hideIcons={true}
                              />
                            : item.title }
                          </dt>
                          <dd className="profile__data-skills-data">
                            { isEdit ?
                              <EdiText
                                submitOnEnter
                                value={data.features[idx].description || ''}
                                type="text"
                                onSave={e => handleUpdateFeature(e, 'description', item.id)}
                                editing={isEditing}
                                saveButtonContent={<i className="icon icon-checkmark"></i>}
                                cancelButtonContent={<i className="icon icon-close"></i>}
                                editButtonContent={<i className="icon icon-pencil text-dark-yellow"></i>}
                                hideIcons={true}
                              />
                            : item.description }
                          </dd>
                        </React.Fragment>
                      ))
                    }
                    { data.features && data.features.length < 3 && [...Array(1)]
                      .map((_, idx) => (
                        <React.Fragment key={idx}>
                          <dt className="profile__data-skills-term">
                            { isEdit ?
                              <EdiText
                                submitOnEnter
                                value={formValues.title}
                                type="text"
                                onSave={e => handleAddFeature(e, 'title')}
                                editing={isEditing}
                                saveButtonContent={<i className="icon icon-checkmark"></i>}
                                cancelButtonContent={<i className="icon icon-close"></i>}
                                editButtonContent={<i className="icon icon-pencil text-dark-yellow"></i>}
                                hideIcons={true}
                              />
                            : null }
                          </dt>
                          <dd className="profile__data-skills-data">
                            { isEdit ?
                              <EdiText
                                submitOnEnter
                                value={formValues.description}
                                type="text"
                                onSave={e => handleAddFeature(e, 'description')}
                                editing={isEditing}
                                saveButtonContent={<i className="icon icon-checkmark"></i>}
                                cancelButtonContent={<i className="icon icon-close"></i>}
                                editButtonContent={<i className="icon icon-pencil text-dark-yellow"></i>}
                                hideIcons={true}
                              />
                            : null }
                          </dd>
                        </React.Fragment>
                      ))
                    }
                  </dl>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">ポートフォリオ</h3>
                  { isEdit ? (
                    <Button className={`button--pill ${data.portfolios && data.portfolios.length >= 3 ? state.DISABLED : ''}`} onClick={_ => handleModal(modalType.PROFILE_PORTFOLIO)}>
                      <>
                        <i className="icon icon-plus text-dark-yellow"></i>
                        追加
                      </>
                    </Button>
                  ) : null }
                  <ul className="profile__data-websites">
                    { data.portfolios && data.portfolios.length > 0 && data.portfolios
                      .slice(0,3)
                      .map(item => (
                        <li className="profile__data-websites-item" key={item.id}>
                          <div className="profile__data-websites-eyecatch">
                            <div className="profile__data-websites-eyecatch-img" style={{ backgroundImage: `url("${item.image || ecPlaceholder}")` }}></div>
                          </div>
                          <div className="profile__data-websites-content">
                            <h4 className="profile__data-websites-name">{item.title}</h4>
                            <p className="profile__data-websites-desc">{item.description}</p>
                            <div className="profile__data-link">
                              <a href={item.url} className="button button--profile" target="_blank">{item.url}</a>
                              <Clipboard value={item.url} />
                            </div>
                          </div>
                          { isEdit ? (
                            <div className="profile__data-websites-action">
                              <Button className="button--pill button--danger" onClick={_ => handleDeletePortfolio(item.id)}>
                                <>
                                  <i className="icon icon-cross text-dark-gray"></i>
                                  削除
                                </>
                              </Button>
                            </div>
                          ) : null }
                        </li>
                      ))
                    }
                  </ul>
                </div>
              </li>
            </ul>
          </div>
          <div className="profile__data profile__data--jobs">
            <div className="profile__data-jobs">
              <div className="profile__data-jobs-content">
                <JobsList jobs={jobs} hasTitle="true" />
              </div>
              <div className="profile__data-jobs-footer">
                <Link to={routes.RECRUITMENT} className="button">
                  もっとみる
                </Link>
              </div>
            </div>
          </div>
        </div>
        <aside className="profile__sidebar profile__sidebar--single">
          <div className="profile__sidebar-inner">
            <h3 className="profile__sidebar-header">企業情報</h3>
            <div className="profile__sidebar-content">
              <ul className="profile__sidebar-content-profile">
                <li className="profile__sidebar-content-profile-items">
                  <div className="profile__sidebar-content-avatar">
                    <img src={data.avatar || avatarPlaceholder} alt=""/>
                    <h4 className="profile__sidebar-content-avatar-name">{data.company_name}</h4>
                  </div>
                </li>
                { data.address1 || data.address2 || data.address3 || data.display_prefecture || data.homepage ? (
                  <li className="profile__sidebar-content-profile-items">
                    { data.address1 || data.address2 || data.address3 || data.display_prefecture ? (
                      <div className="profile__sidebar-content-misc">
                        <i className="icon icon-marker text-dark-yellow"></i>
                        <p className="profile__sidebar-content-misc-copy">{data.address1} {data.address2} {data.address3} {data.display_prefecture}</p>
                      </div>
                    ) : null}
                    { data.prefecture ? (
                      <div className="profile__sidebar-content-misc">
                        <i className="icon icon-globe text-dark-yellow"></i>
                        <p className="profile__sidebar-content-misc-copy">{data.homepage}</p>
                      </div>
                    ) : null}
                  </li>
                ) : null}
                <li className="profile__sidebar-content-profile-items">
                  <div className="profile__sidebar-content-misc">
                    <i className="icon icon-building text-dark-yellow"></i>
                    <p className="profile__sidebar-content-misc-copy">{`${moment(data.created_at).format('YYYY/MM')} に設立
                      ${data.ceo}`}</p>
                  </div>
                </li>
                { data.social_media && data.social_media.length ? (
                  <li className="profile__sidebar-content-profile-items">
                    <ul className="profile__sidebar-content-sns">
                      { data.social_media.map((item, idx) => (
                        <li className="profile__sidebar-content-sns-item" key={item.id}>
                          <a href={item.url} target="_blank">
                            <i className={`icon icon-${item.social_media}`}></i>
                          </a>
                        </li>
                      ))}
                    </ul>
                  </li>
                ) : null }
                <li className="profile__sidebar-content-profile-items">
                  <Mapped
                    address={`${data.address1} ${data.address2}`}
                    zoom={10}
                    height="400px"
                  />
                </li>
              </ul>
            </div>
          </div>
        </aside>
      </div>
    ) : null
  )
}

const mapStateToProps = (state) => ({
  filters: state.filters
});

export default connect(mapStateToProps)(Profile);
