import React, { useState, useEffect, createRef } from 'react';

import Button from '../common/Button';
import Input from '../common/Input';
import Textarea from '../common/Textarea';
import { state } from '../../constants/state';

import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const AddRecruitmentSection = _ => {
  const [formValues, setFormValues] = useState({
    title: '',
    description: '',
    eyecatch: '',
    position: '',
    programming_language: '',
    framework: '',
    database: '',
    management: '',
    requirements: '',
    total_applicants: '',
    annual_income: '',
    working_hours: '',
    holidays: '',
    benefits: '',
    incentive: '',
    promotion: '',
    insurance: '',
    trial_period: '',
    selection_flow: '',
    address1: '',
    address2: '',
    address3: '',
    nearest_station: '',
  });
  const [file, setFile] = useState('');
  const reader = new FileReader();
  const imageInputRef = createRef();
  const eyecatchRef = createRef();

  const handleChange = e => {
    e.persist();

    setFormValues(prevState => {
      return { ...prevState, [e.target.name]: e.target.value }
    });
  }

  const handleUpdateFile = e => {
    setFile(e.target.files[0]);
  }

  useEffect(_ => {
    if (file) {
      // TODO: Upload file to s3 bucket

      reader.readAsDataURL(file);
      reader.onload = ev => {
        eyecatchRef.current.style.backgroundImage = `url("${ev.target.result}")`;
      }
    }
  }, [file]);

  const handleOpenFile = e => {
    e.preventDefault();

    imageInputRef.current.click();
  }

  const handleRemoveFile = e => {
    e.preventDefault();

    setFile('');
    eyecatchRef.current.style.backgroundImage = `url("${ecPlaceholder}")`;
  }

  return (
    <div className="dashboard-section">
      <div className="dashboard-section__content">
        <div className="recruitment-form__container">
          <h3 className="recruitment-form__title">の編集</h3>
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
                会社ロゴ<span>1246 x 420 (px)</span>
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
                  <div className="recruitment-form__main-group-eyecatch-img" ref={eyecatchRef} style={{ backgroundImage: `url("${ecPlaceholder}")` }}></div>
                </div>
                <div className="recruitment-form__main-group-actions">
                  <Button className="button--pill" onClick={e => handleOpenFile(e)}>
                    <>
                      <i className="icon icon-image text-dark-yellow"></i>
                      アップロード
                    </>
                  </Button>
                  <Button className={`button--link recruitment-form__main-group-actions-button ${!file && state.DISABLED}`}
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
                    <Input
                      value={formValues.position}
                      onChange={e => handleChange(e)}
                      name="position"
                      type="text"
                    />
                  </dd>
                  <dt>開発環境</dt>
                  <dd>
                    <dl>
                      <dt>言語</dt>
                      <dd>
                        <Input
                          value={formValues.programming_language}
                          onChange={e => handleChange(e)}
                          name="programming_language"
                          type="text"
                        />
                      </dd>
                      <dt>フレームワーク</dt>
                      <dd>
                        <Input
                          value={formValues.framework}
                          onChange={e => handleChange(e)}
                          name="framework"
                          type="text"
                        />
                      </dd>
                      <dt>データベース</dt>
                      <dd>
                        <Input
                          value={formValues.database}
                          onChange={e => handleChange(e)}
                          name="database"
                          type="text"
                        />
                      </dd>
                      <dt>管理</dt>
                      <dd>
                        <Input
                          value={formValues.management}
                          onChange={e => handleChange(e)}
                          name="management"
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
                      value={formValues.total_applicants}
                      onChange={e => handleChange(e)}
                      name="total_applicants"
                      type="number"
                    />
                  </dd>
                  <dt>想定年収</dt>
                  <dd className="half">
                    <Input
                      value={formValues.annual_income}
                      onChange={e => handleChange(e)}
                      name="annual_income"
                      type="text"
                    />
                  </dd>
                  <dt>勤務時間</dt>
                  <dd className="half">
                    <Textarea
                      value={formValues.working_hours}
                      onChange={e => handleChange(e)}
                      name="working_hours"
                      row="4"
                    />
                  </dd>
                  <dt>想定年収</dt>
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
                      value={formValues.benefits}
                      onChange={e => handleChange(e)}
                      name="benefits"
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
                      value={formValues.promotion}
                      onChange={e => handleChange(e)}
                      name="promotion"
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
                      value={formValues.trial_period}
                      onChange={e => handleChange(e)}
                      name="trial_period"
                      row="8"
                    />
                  </dd>
                  <dt>選考フロー</dt>
                  <dd className="half">
                    <Textarea
                      value={formValues.selection_flow}
                      onChange={e => handleChange(e)}
                      name="selection_flow"
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
                value={formValues.nearest_station}
                onChange={e => handleChange(e)}
                name="nearest_station"
                type="text"
              />
            </div>

          </form>
          <div className="recruitment-form__button">
            <Button>送信</Button>
          </div>
        </div>
      </div>
    </div>
  );

}

export default AddRecruitmentSection;