import React, { useState } from 'react';
import _ from 'lodash';
import Swiper from 'react-id-swiper';
import 'swiper/css/swiper.css';
import moment from 'moment';
moment.locale('ja');
import { connect } from 'react-redux';

import Button from '../common/Button';
import Loading from './Loading';
import Pill from './Pill';
import Like from '../../utils/like';
import { state } from '../../constants/state';

import avatarPlaceholder from '../../../img/avatar-default.png';
import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const Slider = (props) => {
  const {
    jobs,
    user,
    isLoading
  } = props;
  const [jobsTmp, setJobsTmp] = useState(jobs);
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

  const handleLike = _.debounce((type, id) => {
    Like.toggleLike(type, id)
      .then(result => {
        setJobsTmp(jobsTmp.map(job => {
          if (job.id == id) {
            return { ...job,
              likes_count: result.data.total,
              hasUserLiked: !job.hasUserLiked
            }
          }

          return job;
        }));

        console.log('[Like SUCCESS]', result);
      }).catch(error => console.log('[Like ERROR]', error));
  }, 400);

  return (
    isLoading ? (
      <Loading />
    ) : (
      jobsTmp.length ? (
        <Swiper {...params}>
        { jobsTmp.map(job => (
          <div className="slider" key={job.id}>
            <div className="slider__eyecatch">
              <div className="slider__eyecatch-img" style={{ backgroundImage: `url("${job.cover_photo || ecPlaceholder}")` }}></div>
            </div>
            <div className="slider-content">
              <img src={job.company.avatar || avatarPlaceholder} alt="Company Name"/>
              <div className="slider-content__top">
                <h3 className="slider-content__title">{job.company.company_name}</h3>
              </div>
              <div className="slider-content__main">
                <p className="slider-content__desc">{job.title}</p>
              </div>
              <div className="slider-content__footer">
                <ul className="slider-content__pills">
                  { job.programming_language ? (
                    <li className="slider-content__pills-item"><Pill className="pill--active">{job.programming_language}</Pill></li>
                  ) : null }
                  { job.prefecture ? (
                    <li className="slider-content__pills-item"><Pill>{job.prefecture}</Pill></li>
                  ) : null }
                  { job.created_at ? (
                    <li className="slider-content__pills-item"><Pill>{moment(job.created_at).fromNow()}</Pill></li>
                  ) : null }
                </ul>
                <div className="slider-content__fav">
                  { user && user.isLogged ? (
                    <Button className="button--link" onClick={e => handleLike('job', job.id)}>
                      <Pill className={`pill--icon text-medium-black ${job.hasUserLiked ? state.ACTIVE : ''}`}>
                        <i className="icon icon-star"></i>{job.likes_count}
                      </Pill>
                    </Button>
                  ) : (
                    <Pill className="pill--icon">
                      <i className="icon icon-star"></i>{job.likes_count}
                    </Pill>
                  )}
                </div>
              </div>
            </div>
          </div>
        ))}
        </Swiper>
      ) : null
    )
  );
}

const mapStateToProps = (state) => ({
  user: state.user
});

export default connect(mapStateToProps)(Slider);
