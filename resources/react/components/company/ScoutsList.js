import React, { useState } from 'react';
import { useDispatch } from 'react-redux';

import Button from '../common/Button';
import Loading from '../common/Loading';
import { state } from '../../constants/state';
import { modalType } from '../../constants/config';
import { setModal } from '../../actions/modal';

import avatarPlaceholder from '../../../img/avatar-default.png';
import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const ScoutsList = ({data}) => {
  const dispatch = useDispatch();
  const [currentItem, setCurrentItem] = useState(null);
  const jobsData = data.data || {};

  const handleClick = (id) => {
    dispatch(setModal(modalType.STUDENT_SCOUT, {id}));
  }

  return (
    <ul className="scouts-list">
      { jobsData.map(item => (
        <li className="scouts-list__item" onMouseOver={_ => setCurrentItem(item.id)} onMouseOut={_ => setCurrentItem(null)} key={item.id}>
          <div className="scouts">
            <div className="scouts__left">
              <div className="scouts__left-inner">
                <div className="scouts__eyecatch">
                  <div className="scouts__eyecatch-img" style={{ backgroundImage: `url("${item.cover_photo || ecPlaceholder}")` }}></div>
                </div>
              </div>
              <div className="scouts__left-inner">
                <div className="scouts__company">
                  <img src={avatarPlaceholder} alt=""/>
                  <div className="scouts__company-name">
                    title
                  </div>
                </div>
                <h4 className="scouts__title">{item.title}</h4>
              </div>
            </div>
            <div className="scouts__right">
              <dl className={`scouts__list ${currentItem === item.id ? state.HIDDEN : ''}`}>
                { item.position ? (
                  <>
                    <dt className="scouts__list-term">ポジション</dt>
                    <dd className="scouts__list-data">{item.position}</dd>
                  </>
                ) : null }
                { item.programming_language ? (
                  <>
                    <dt className="scouts__list-term">言語</dt>
                    <dd className="scouts__list-data">{item.programming_language}</dd>
                  </>
                ) : null }
                { item.framework ? (
                  <>
                    <dt className="scouts__list-term">フレームワーク</dt>
                    <dd className="scouts__list-data">{item.framework}</dd>
                  </>
                ) : null }
                { item.display_prefecture ? (
                  <>
                    <dt className="scouts__list-term">エリア</dt>
                    <dd className="scouts__list-data">{item.display_prefecture}</dd>
                  </>
                ) : null }
                { item.salary ? (
                  <>
                    <dt className="scouts__list-term">フレームワーク</dt>
                    <dd className="scouts__list-data">{item.salary}万円</dd>
                  </>
                ) : null }
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
  )
}

export default ScoutsList;
