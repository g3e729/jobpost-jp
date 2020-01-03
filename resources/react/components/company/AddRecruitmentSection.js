import React, { useState } from 'react';

import Button from '../common/Button';
import Input from '../common/Input';
import Textarea from '../common/Textarea';

import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const AddRecruitmentSection = _ => {
  const [formValues, setFormValues] = useState({
    title: '',
    description: '',
    address1: '',
    address2: '',
    address3: '',
    nearest_station: '',
  });

  const handleChange = e => {
    e.persist();

    setFormValues(prevState => {
      return { ...prevState, [e.target.name]: e.target.value }
    });
  }

  return (
    <div className="dashboard-section">
      <div className="dashboard-section__content">
        <div className="recruitment-form__container">
          <h3 className="recruitment-form__title">の編集</h3>
          <form className="recruitment-form__main" onSubmit={_ => console.log('Add')}>

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
                {/* <Input className="recruitment-form__main-group-input"
                  name="company_logo"
                  type="file"
                /> */}
                <div className="recruitment-form__main-group-eyecatch">
                  <div className="recruitment-form__main-group-eyecatch-img" style={{ backgroundImage: `url("${ecPlaceholder}")` }}></div>
                </div>
                <div className="recruitment-form__main-group-actions">
                  <Button className="button--pill">
                    <>
                      <i className="icon icon-image text-dark-yellow"></i>
                      アップロード
                    </>
                  </Button>
                  <Button className="button--link recruitment-form__main-group-actions-button">
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
                Table
                {/* <Textarea className="recruitment-form__main-group-input"
                  name="description"
                /> */}
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
