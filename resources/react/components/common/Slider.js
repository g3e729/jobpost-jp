import React from 'react';
import Swiper from 'react-id-swiper';
import 'swiper/css/swiper.css';

import Pill from './Pill';

const Slider = _ => {
  const params = {
    noSwiping: true,
    slidesPerView: 1,
    spaceBetween: 60,
    autoplay: {
      delay: 10000,
    },
    loop: true,
    pagination: {
      el: '.swiper-pagination.slider-pagination',
      clickable: true,
      renderBullet: (index, className) => {
        return (
          `
          <div class="slider-pagination__item">
            <div class="slider-pagination__item-number">
              0${index + 1}
            </div>
            <div class="slider-pagination__item-bg">
              <svg x="0px" y="0px" viewBox="0 0 100 100" class="slider-pagination__item-svg">
                <path class="path-progress" d="M50,10c22.1,0,40,17.9,40,40S72.1,90,50,90S10,72.1,10,50S27.9,10,50,10" />
                <path class="path-bg" d="M50,10c22.1,0,40,17.9,40,40S72.1,90,50,90S10,72.1,10,50S27.9,10,50,10" />
              </svg>
            </div>
            <div class="slider-pagination__item-line"></div>
          </div>
          `
        )
      }
    }
  }

  return (
    <Swiper {...params}>
      { [0, 1, 3].map((_, idx) => (
        <div className="slider" key={idx}>
          <div className="slider__eyecatch">
            <div className="slider__eyecatch-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
          </div>
          <div className="slider-content">
            <img src="https://lorempixel.com/240/240/city/" alt="Company Name"/>
            <div className="slider-content__top">
              <h3 className="slider-content__title">株式会社アクターリアリティ {idx + 1}</h3>
            </div>
            <div className="slider-content__main">
              <p className="slider-content__desc">自社★C2Cマッチングプラットフォーム開発<br/>【少数精鋭/残業少/フレックス】</p>
            </div>
            <div className="slider-content__footer">
              <ul className="slider-content__pills">
                <li className="slider-content__pills-item">
                  <Pill className="pill--active">PHP</Pill>
                </li>
                <li className="slider-content__pills-item">
                  <Pill>東京</Pill>
                </li>
                <li className="slider-content__pills-item">
                  <Pill>3日前</Pill>
                </li>
              </ul>
              <div className="slider-content__fav">
                <Pill className="pill--icon">
                  <i className="icon icon-star"></i>1.2k
                </Pill>
              </div>
            </div>
          </div>
        </div>
      )) }
    </Swiper>
  );
}

export default Slider;
