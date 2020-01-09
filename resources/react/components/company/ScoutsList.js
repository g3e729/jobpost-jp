import React, { useState } from 'react';
import faker from 'faker';
faker.locale = "ja";
import { useDispatch } from 'react-redux';

import Button from '../common/Button';
import { state } from '../../constants/state';
import { modalType } from '../../constants/config';
import { setModal } from '../../actions/modal';

const dummyScouts = new Array(10)
  .fill(null)
  .map(e => {
    e = {};
    e.id = faker.random.uuid();
    e.title = faker.random.words();
    e.company = faker.company.companyName();

    return e;
  })

const ScoutsList = _ => {
  const dispatch = useDispatch();
  const [currentItem, setCurrentItem] = useState(null);

  const handleClick = (idx) => {
    dispatch(setModal(modalType.STUDENT_SCOUT));
  }

  return (
    <ul className="scouts-list">
      { dummyScouts.map(item => (
        <li className="scouts-list__item" onMouseOver={_ => setCurrentItem(item.id)} onMouseOut={_ => setCurrentItem(null)} key={item.id}>
          <div className="scouts">
            <div className="scouts__left">
              <div className="scouts__left-inner">
                <div className="scouts__eyecatch">
                  <div className="scouts__eyecatch-img" style={{ backgroundImage: 'url("https://lorempixel.com/640/640/business/")' }}></div>
                </div>
              </div>
              <div className="scouts__left-inner">
                <div className="scouts__company">
                  <img src="https://lorempixel.com/240/240/city/" alt=""/>
                  <div className="scouts__company-name">
                    {item.company}
                  </div>
                </div>
                <h4 className="scouts__title">{item.title}</h4>
              </div>
            </div>
            <div className="scouts__right">
              <dl className={`scouts__list ${currentItem === item.id ? state.HIDDEN : ''}`}>
                <dt className="scouts__list-term">ポジション</dt>
                <dd className="scouts__list-data">バックエンド</dd>
                <dt className="scouts__list-term">言語</dt>
                <dd className="scouts__list-data">PHP</dd>
                <dt className="scouts__list-term">フレームワーク</dt>
                <dd className="scouts__list-data">Laravel</dd>
                <dt className="scouts__list-term">エリア</dt>
                <dd className="scouts__list-data">東京</dd>
                <dt className="scouts__list-term">年収</dt>
                <dd className="scouts__list-data">450万円</dd>
              </dl>
              <div className={`scouts__action ${currentItem === item.id ? state.ACTIVE : ''}`}>
                <Button onClick={_ => handleClick(item.id)}>
                  応募する
                </Button>
              </div>
            </div>
          </div>
        </li>
      )) }
    </ul>
  );
}

export default ScoutsList;
