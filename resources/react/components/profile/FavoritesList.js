import React from 'react';

const FavoritesList = () => (
  <ul className="favorites-list">
    { [...Array(9)].map((_, idx) => (
      <li className="favorites-list__item" key={idx}>
        <div className="favorites">
          <div className="favorites__top">
            <div className="favorites__eyecatch">
              <div className="favorites__eyecatch-img" style={{ backgroundImage: 'url("https://lorempixel.com/640/640/business/")' }}></div>
            </div>
            <h4 className="favorites__title">
              自社★C2Cマッチングプラットフォーム開発
            </h4>
          </div>
          <div className="favorites__content">
            <div className="favorites__company">
              <img src="https://lorempixel.com/240/240/city/" alt=""/>
              <div className="favorites__company-name">
                ジーコム株式会社
              </div>
            </div>
            <p className="favorites__description">恥の多い生涯を送って来ました。自分には、人間の生活というものが、見当つかないのです。自分は東北の田...</p>
          </div>
        </div>
      </li>
    )) }
  </ul>
);

export default FavoritesList;
