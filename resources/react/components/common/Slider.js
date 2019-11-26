import React from 'react';

import Swiper from 'react-id-swiper';
import 'swiper/css/swiper.css';

const Slider = () => {
  const params = {
    noSwiping: true,
    slidesPerView: 1,
    spaceBetween: 60,
    autoplay: {
      delay: 10000,
    },
    loop: true,
    // pagination: {
    //   el: '.swiper-pagination',
    //   clickable: true,
    //   renderBullet: (index, className) => {
    //     return '<span className="' + className + '">' + (index + 1) + '</span>';
    //   }
    // }
  }

  return (
    <div>
      <Swiper {...params}
      >
        { [0, 1, 3].map((_, idx) => {
          return (
            <div className="slider" key={idx}>
              <div className="slider__eyecatch">
                <img src="https://source.unsplash.com/user/erondu/1600x900" alt="Eyecatch1"/>
              </div>
              <div className="slider-content">
                <img src="https://lorempixel.com/240/240/city/" alt="Company Name"/>
                <div className="slider-content__top">
                  <h3 className="slider-content__title">株式会社アクターリアリティ</h3>
                </div>
                <div className="slider-content__main">
                  <p className="slider-content__desc">自社★C2Cマッチングプラットフォーム開発<br/>【少数精鋭/残業少/フレックス】</p>
                </div>
                <div className="slider-content__footer">
                  <ul className="slider-content__pills">
                    <li className="slider-content__pills-item pill pill--active">PHP</li>
                    <li className="slider-content__pills-item pill">東京</li>
                    <li className="slider-content__pills-item pill">3日前</li>
                  </ul>
                  <div className="slider-content__fav">
                    <span className="pill pill--icon">
                      <i className="icon icon-star"></i>1.2k
                    </span>
                  </div>
                </div>
              </div>
            </div>
          );
        }) }
      </Swiper>
    </div>
  );
}

export default Slider;
