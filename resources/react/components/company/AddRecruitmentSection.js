import React from 'react';

import Button from '../common/Button';
import Input from '../common/Input';
import Textarea from '../common/Textarea';

const AddRecruitmentSection = () => (
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
              name="title"
              type="text"
            />
          </div>

          <div className="recruitment-form__main-group">
            <div className="recruitment-form__main-group-label">
              会社ロゴ<span>1246 x 420 (px)</span>
            </div>
            <Input className="recruitment-form__main-group-input"
              name="comapany_logo"
              type="text"
            />
          </div>

          <div className="recruitment-form__main-group">
            <div className="recruitment-form__main-group-label">{`
              こんなこと
              やります
            `}</div>
            <Textarea className="recruitment-form__main-group-input"
              name="description"
            />
          </div>

          <div className="recruitment-form__main-group">
            <div className="recruitment-form__main-group-label">
              募集内容
            </div>
            <Textarea className="recruitment-form__main-group-input"
              name="description"
            />
          </div>

          <div className="recruitment-form__main-group">
            <div className="recruitment-form__main-group-label">
              住所
            </div>
            <Textarea className="recruitment-form__main-group-input"
              name="description"
            />
          </div>

          <div className="recruitment-form__main-group">
            <div className="recruitment-form__main-group-label">
              最寄駅
            </div>
            <Input className="recruitment-form__main-group-input"
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

export default AddRecruitmentSection;
