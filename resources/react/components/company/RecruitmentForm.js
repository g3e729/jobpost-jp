import React, { useState, useEffect, createRef } from 'react';
import Select from 'react-select';
import _ from 'lodash';
import { connect } from 'react-redux';
import { Link } from 'react-router-dom';
import { useParams, useHistory } from 'react-router-dom';

import Button from '../common/Button';
import Input from '../common/Input';
import Loading from '../common/Loading';
import Nada from '../common/Nada';
import Textarea from '../common/Textarea';
import JobAPI from '../../utils/job';
import { state } from '../../constants/state';
import { prefix, routes } from '../../constants/routes';
import { jobSelectStyles } from '../../constants/config';

import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const RecruitmentForm = ({filters}) => {
  const params = useParams();
  const history = useHistory();
  const [job, setJob] = useState({});
  const [isCreate, setIsCreate] = useState(true);
  const [formValues, setFormValues] = useState({
    title: '',
    description: '',
    cover_photo: '',
    cover_photo_delete: null,
    position: '',
    employment_type: '',
    programming_language: '',
    framework: '',
    database: '',
    environment: '',
    requirements: '',
    number_of_applicants: null,
    salary: null,
    work_time: '',
    holidays: '',
    allowance: '',
    incentive: '',
    salary_increase: '',
    insurance: '',
    contract_period: '',
    screening_flow: '',
    prefecture: '',
    address1: '',
    address2: '',
    address3: null,
    station: '',
  });
  const [file, setFile] = useState('');
  const [hasFile, setHasFile] = useState(false);
  const [isLoading, setIsLoading] = useState(true);
  const [regionsFilter, setRegionsFilter] = useState([]);
  const [statusFilter, setStatusFilter] = useState([]);
  const [positionsFilter, setPositionsFilter] = useState([]);
  const [programmingFilter, setProgrammingFilter] = useState([]);
  const [frameworksFilter, setFrameworksFilter] = useState([]);
  const [databaseFilter, setDatabaseFilter] = useState([]);
  const reader = new FileReader();
  const imageInputRef = createRef();
  const eyecatchRef = createRef();
  const data = (filters.filtersData && filters.filtersData.jobs);

  const handleChange = e => {
    e.persist();

    setFormValues(prevState => {
      return { ...prevState, [e.target.name]: e.target.value }
    });
  }

  const handleSelect = (e, type) => {
    setFormValues(prevState => {
      return { ...prevState, [type]: e.value }
    });
  }

  const handleUpdateFile = e => {
    setFile(e.target.files[0]);
  }

  const handleOpenFile = e => {
    e.preventDefault();

    imageInputRef.current.click();
  }

  const handleRemoveFile = e => {
    e.preventDefault();

    setFile('');
    setFormValues(prevState => {
      return { ...prevState, cover_photo_delete: 1 }
    });
    setHasFile(false);

    eyecatchRef.current.style.backgroundImage = `url("${ecPlaceholder}")`;
  }

  const handleSubmit = _.debounce((e) => {
    e.persist();
    setIsLoading(true);

    // TODO: handle validation

    const formdata = new FormData();
    formdata.append('title', formValues.title);
    formdata.append('description', formValues.description);
    formdata.append('cover_photo', formValues.cover_photo || '');
    if (formValues.cover_photo) {
      formdata.append('cover_photo_delete', parseInt(formValues.cover_photo_delete));
    }
    formdata.append('position', formValues.position);
    formdata.append('employment_type', formValues.employment_type);
    formdata.append('programming_language', formValues.programming_language);
    formdata.append('framework', formValues.framework);
    formdata.append('database', formValues.database);
    formdata.append('environment', formValues.environment);
    formdata.append('requirements', formValues.requirements);
    formdata.append('number_of_applicants', parseInt(formValues.number_of_applicants) || null);
    formdata.append('salary', parseInt(formValues.salary) || null);
    formdata.append('work_time', formValues.work_time);
    formdata.append('holidays', formValues.holidays);
    formdata.append('allowance', formValues.allowance);
    formdata.append('incentive', formValues.incentive);
    formdata.append('salary_increase', formValues.salary_increase);
    formdata.append('insurance', formValues.insurance);
    formdata.append('contract_period', formValues.contract_period);
    formdata.append('screening_flow', formValues.screening_flow);
    formdata.append('prefecture', formValues.prefecture);
    formdata.append('address1', formValues.address1);
    formdata.append('address2', formValues.address2);
    formdata.append('address3', parseInt(formValues.address3) || null);
    formdata.append('station', formValues.station);

    if (isCreate) {
      JobAPI.addJob(formdata)
        .then(result => {
          setIsLoading(false);
          history.push(`${prefix}job/${result.id}`);
        })
        .catch(error => {
          setIsLoading(false);

          console.log('[Job create ERROR] :', error);
        });
    } else {
      const jobId = params.id;

      JobAPI.updateJob(formdata, jobId)
        .then(result => {
          setIsLoading(false);
          history.push(`${prefix}job/${result.id}`);
        })
        .catch(error => {
          setIsLoading(false);

          console.log('[Job update ERROR] :', error)
        });
    }
  }, 400);

  async function getJob() {
    const jobId = params.id;
    const request = await JobAPI.getJob(jobId);

    return request.data;
  }

  useEffect(_ => {
    if (file) {
      reader.readAsDataURL(file);
      reader.onload = ev => {
        eyecatchRef.current.style.backgroundImage = `url("${ev.target.result}")`;
        setFormValues(prevState => {
          return { ...prevState, cover_photo: file, cover_photo_delete: 1 }
        });
        setHasFile(true);
      }
    }
  }, [file]);

  useEffect(_ => {
    if (params.id) {
      setIsCreate(false);

      getJob()
        .then(res => {
          setJob(res);
          setIsLoading(false);

          if (res.cover_photo) {
            setHasFile(true);
          }

          setFormValues({
            title: res.title,
            description: res.description,
            // cover_photo: res.cover_photo, // DISABLE SET
            position: res.position,
            employment_type: res.employment_type,
            programming_language: res.programming_language,
            framework: res.framework,
            database: res.database,
            environment: res.environment,
            requirements: res.requirements,
            number_of_applicants: parseInt(res.number_of_applicants),
            salary: parseInt(res.salary),
            work_time: res.work_time,
            holidays: res.holidays,
            allowance: res.allowance,
            incentive: res.incentive,
            salary_increase: res.salary_increase,
            insurance: res.insurance,
            contract_period: res.contract_period,
            screening_flow: res.screening_flow,
            prefecture: res.prefecture,
            address1: res.address1,
            address2: res.address2,
            address3: parseInt(res.address3),
            station: res.station,
          });
        })
        .catch(error => {
          setIsLoading(false);

          console.log('[Job detail ERROR]', error);
        })
    }

    setIsLoading(false);
  }, [params])

  useEffect(_ => {
    if (data) {
      console.log('data :', data);
      setRegionsFilter(Object.keys(data.regions).map((item, idx) => {
        return {value: item, label: Object.values(data.regions)[idx]};
      }));

      setStatusFilter(Object.keys(data.status).map((item, idx) => {
        return {value: item, label: Object.values(data.status)[idx]};
      }));

      setPositionsFilter(Object.entries(data.positions).map(item => {
        return { value: item[0], label: item[1] };
      }));

      setProgrammingFilter(Object.entries(data.programming_languages).map(item => {
        return { value: item[0], label: item[1] };
      }));

      setFrameworksFilter(Object.entries(data.frameworks).map(item => {
        return { value: item[0], label: item[1] };
      }));

      setDatabaseFilter(Object.keys(data.databases).map((item, idx) => {
        return {value: item, label: Object.values(data.databases)[idx]};
      }));
    }
  }, [data]);

  return (
    <div className="dashboard-section">
      <div className="dashboard-section__content">
        <div className="recruitment-form__container">
          <h3 className="recruitment-form__title">求人フォーム</h3>
          { isLoading ? (
            <Loading className="loading--padded" />
          ) : (
            !job.deleted_at ? (
              <>
                <form className="recruitment-form__main" onSubmit={_ => console.log('Add job')}>

                  <div className="recruitment-form__main-group">
                    <div className="recruitment-form__main-group-label">
                      タイトル
                    </div>
                    <Input className="recruitment-form__main-group-input"
                      value={formValues.title}
                      onChange={e => handleChange(e)}
                      name="title"
                      type="text"
                    />
                  </div>

                  <div className="recruitment-form__main-group">
                    <div className="recruitment-form__main-group-label">
                      アイキャッチ<span>1246 x 420 (px)</span>
                    </div>
                    <div className="recruitment-form__main-group-cluster">
                      <input className="input recruitment-form__main-group-input"
                        onChange={e => handleUpdateFile(e)}
                        onClick={e => e.target.value = null}
                        ref={imageInputRef}
                        accept="image/*"
                        type="file"
                        style={{ display: 'none' }}
                      />
                      <div className="recruitment-form__main-group-eyecatch">
                        <div className="recruitment-form__main-group-eyecatch-img" ref={eyecatchRef} style={{ backgroundImage: `url("${job.cover_photo || ecPlaceholder}")` }}></div>
                      </div>
                      <div className="recruitment-form__main-group-actions">
                        <Button className="button--pill" onClick={e => handleOpenFile(e)}>
                          <>
                            <i className="icon icon-image text-dark-yellow"></i>
                            アップロード
                          </>
                        </Button>
                        <Button className={`button--link recruitment-form__main-group-actions-button ${!hasFile ? state.DISABLED : ''}`}
                          onClick={e => handleRemoveFile(e)}>
                          <>
                            <i className="icon icon-cross"></i>
                            画像を削除
                          </>
                        </Button>
                      </div>

                    </div>

                  </div>

                  <div className="recruitment-form__main-group">
                    <div className="recruitment-form__main-group-label">{`
                      こんなこと
                      やります
                    `}</div>
                    <Textarea className="recruitment-form__main-group-input"
                      value={formValues.description}
                      onChange={e => handleChange(e)}
                      name="description"
                    />
                  </div>

                  <div className="recruitment-form__main-group">
                    <div className="recruitment-form__main-group-label">
                      募集内容
                    </div>
                    <div className="recruitment-form__main-group-cluster">
                      <dl className="recruitment-form__main-group-table">
                        <dt>ポジション</dt>
                        <dd>
                          <Select options={positionsFilter}
                            styles={jobSelectStyles}
                            placeholder={formValues.position}
                            isForm
                            onChange={e => handleSelect(e, 'position')}
                          />
                        </dd>
                        <dt>ステータス</dt>
                        <dd>
                          <Select options={statusFilter}
                            styles={jobSelectStyles}
                            placeholder={formValues.employment_type}
                            isForm
                            onChange={e => handleSelect(e, 'employment_type')}
                          />
                        </dd>
                        <dt>開発環境</dt>
                        <dd>
                          <dl>
                            <dt>言語</dt>
                            <dd>
                              <Select options={programmingFilter}
                                styles={jobSelectStyles}
                                placeholder={formValues.programming_language}
                                isForm
                                onChange={e => handleSelect(e, 'programming_language')}
                              />
                            </dd>
                            <dt>フレームワーク</dt>
                            <dd>
                              <Select options={frameworksFilter}
                                styles={jobSelectStyles}
                                placeholder={formValues.framework}
                                isForm
                                onChange={e => handleSelect(e, 'framework')}
                              />
                            </dd>
                            <dt>データベース</dt>
                            <dd>
                              <Select options={databaseFilter}
                                styles={jobSelectStyles}
                                placeholder={formValues.database}
                                isForm
                                onChange={e => handleSelect(e, 'database')}
                              />
                            </dd>
                            <dt>管理</dt>
                            <dd>
                              <Input
                                value={formValues.environment}
                                onChange={e => handleChange(e)}
                                name="environment"
                                type="text"
                              />
                            </dd>
                          </dl>
                        </dd>
                        <dt>応募要件</dt>
                        <dd>
                          <Textarea
                            value={formValues.requirements}
                            onChange={e => handleChange(e)}
                            name="requirements"
                            row="4"
                          />
                        </dd>
                        <dt>募集人数</dt>
                        <dd className="half">
                          <Input
                            value={formValues.number_of_applicants}
                            onChange={e => handleChange(e)}
                            name="number_of_applicants"
                            type="number"
                          />
                        </dd>
                        <dt>想定年収</dt>
                        <dd className="half">
                          <Input
                            value={formValues.salary}
                            onChange={e => handleChange(e)}
                            name="salary"
                            type="number"
                          />
                        </dd>
                        <dt>勤務時間</dt>
                        <dd className="half">
                          <Textarea
                            value={formValues.work_time}
                            onChange={e => handleChange(e)}
                            name="work_time"
                            row="4"
                          />
                        </dd>
                        <dt>休日、休暇</dt>
                        <dd className="half">
                          <Textarea
                            value={formValues.holidays}
                            onChange={e => handleChange(e)}
                            name="holidays"
                            row="4"
                          />
                        </dd>
                        <dt>諸手当</dt>
                        <dd className="half">
                          <Textarea
                            value={formValues.allowance}
                            onChange={e => handleChange(e)}
                            name="allowance"
                            row="2"
                          />
                        </dd>
                        <dt>インセンティブ</dt>
                        <dd className="half">
                          <Input
                            value={formValues.incentive}
                            onChange={e => handleChange(e)}
                            name="incentive"
                            type="text"
                          />
                        </dd>
                        <dt>昇給・昇格</dt>
                        <dd className="half">
                          <Textarea
                            value={formValues.salary_increase}
                            onChange={e => handleChange(e)}
                            name="salary_increase"
                            row="4"
                          />
                        </dd>
                        <dt>保険</dt>
                        <dd className="half">
                          <Textarea
                            value={formValues.insurance}
                            onChange={e => handleChange(e)}
                            name="insurance"
                            row="4"
                          />
                        </dd>
                        <dt>試用期間</dt>
                        <dd className="half">
                          <Textarea
                            value={formValues.contract_period}
                            onChange={e => handleChange(e)}
                            name="contract_period"
                            row="8"
                          />
                        </dd>
                        <dt>選考フロー</dt>
                        <dd className="half">
                          <Textarea
                            value={formValues.screening_flow}
                            onChange={e => handleChange(e)}
                            name="screening_flow"
                            row="8"
                          />
                        </dd>
                      </dl>
                    </div>
                  </div>

                  <div className="recruitment-form__main-group">
                    <div className="recruitment-form__main-group-label">
                      住所
                    </div>
                    <div className="recruitment-form__main-group-cluster">
                      <Select options={regionsFilter}
                        styles={jobSelectStyles}
                        placeholder=''
                        height='50px'
                        onChange={e => handleSelect(e, 'prefecture')}
                      />

                      <Input className="recruitment-form__main-group-input"
                        value={formValues.address1}
                        onChange={e => handleChange(e)}
                        name="address1"
                        type="text"
                        placeholder="番地まで"
                      />

                      <Input className="recruitment-form__main-group-input"
                        value={formValues.address2}
                        onChange={e => handleChange(e)}
                        name="address2"
                        type="text"
                        placeholder="ビル名、部屋番号"
                      />

                      <Input className="recruitment-form__main-group-input"
                        value={formValues.address3}
                        onChange={e => handleChange(e)}
                        name="address3"
                        type="number"
                        placeholder="郵便番号"
                      />

                    </div>
                  </div>

                  <div className="recruitment-form__main-group">
                    <div className="recruitment-form__main-group-label">
                      最寄駅
                    </div>
                    <Input className="recruitment-form__main-group-input"
                      value={formValues.station}
                      onChange={e => handleChange(e)}
                      name="station"
                      type="text"
                    />
                  </div>

                </form>
                <div className="recruitment-form__button">
                  <Button type="submit" onClick={e => handleSubmit(e)}>送信</Button>
                </div>
              </>
            ) : (
              <Nada className="nada--padded">
                <span className="nada__emphasize">
                Please enable job listing.
                </span>

                <Link className="button button--pill" to={routes.RECRUITMENT}>
                  <span><i className="icon icon-back-curve text-dark-yellow"></i>通知リストに戻る</span>
                </Link>
              </Nada>
            )
          ) }
        </div>
      </div>
    </div>
  );
}

const mapStateToProps = (state) => ({
  filters: state.filters
});

export default connect(mapStateToProps)(RecruitmentForm);
