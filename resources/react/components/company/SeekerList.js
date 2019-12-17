import React from 'react';
import { Link } from 'react-router-dom';

import Avatar from '../common/Avatar';
import Button from '../common/Button';

const SeekerList = ({title, link}) => {
  return (
    <div className="seeker-list__container">
      { title ? <h3 className="seeker-list__title">{title}</h3> : null }
      <ul className="seeker-list">
        { [1, 2, 3, 4, 5].map((_, idx) => (
          <li className="seeker-list__item" key={idx}>
            <div className="seeker-list__item-left">
              <div className="seeker-list__item-avatar">
                <Avatar className="avatar--seeker"
                  style={{ backgroundImage: 'url("https://lorempixel.com/640/640/business/")' }}
                />
              </div>
            </div>
            <div className="seeker-list__item-right">
              <div className="seeker-list__item-right-top">
                <h4 className="seeker-list__item-name">田中義人さんをスカウトしました。</h4>
                <span className="pill">Develop1コース</span>
              </div>
              <div className="seeker-list__item-right-bottom">
                <p className="seeker-list__item-description">自社★C2Cマッチングプラットフォーム開発</p>
                <span className="seeker-list__item-tag">でのスカウト</span>
                <time className="seeker-list__item-time">約13時間前</time>
              </div>
            </div>
          </li>
        )) }
      </ul>
      <div className="seeker-list__button">
        <Link to={link}>
          <Button>もっと見る</Button>
        </Link>
      </div>
    </div>
  );
}

export default SeekerList;
