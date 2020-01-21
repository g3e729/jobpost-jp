import React, { useState, useEffect } from 'react';
import moment from 'moment';
moment.locale('ja');
import _ from 'lodash';
import { Link, useParams } from 'react-router-dom';
import { useDispatch } from 'react-redux';

import Avatar from '../common/Avatar';
import Button from '../common/Button';
import Pill from '../common/Pill';
import Like from '../../utils/like';
import { state } from '../../constants/state';
import { routes } from '../../constants/routes';
import { modalType } from '../../constants/config';
import { setModal } from '../../actions/modal';

import avatarPlaceholder from '../../../img/avatar-default.png';

const Heading = (props) => {
  const dispatch = useDispatch();
  const params = useParams();
  const {
    type,
    title,
    subTitle,
    isOwner = true,
    isEdit = false,
    isLogged = false,
    hasLiked = false,
    jobData = {},
    accountType = null,
    passedFunction = null,
    children,
    ...rest
  } = props;
  const [hasUserLiked, setHasUserLiked] = useState(false);
  const [userLikes, setUserLikes] = useState(rest['data-likes'] || 0);
  const avatarImg = rest['data-avatar'] || '';
  const coverPhotoImg = rest['data-cover-photo'] || '';

  const handleLike = _.debounce((type) => {
    Like.toggleLike(type, params.id)
      .then(result => {
        passedFunction();
        setUserLikes(result.data.total);
        setHasUserLiked(!hasUserLiked);

        console.log('[Like SUCCESS]', result);
      }).catch(error => console.log('[Like ERROR]', error));
  }, 400);

  const handleModal = (type, id, text, image) => {
    dispatch(setModal(type, id, text, image));
  }

  useEffect(_ => {
    setHasUserLiked(hasLiked);
  }, [hasLiked])

  return (
    <div className={`heading heading--${type || 'default'}`} {...rest}>
      { type && type === 'user' ? (
        <>
          { isEdit ? (
            <div className="heading__edit">
              <Button className="button--eyecatch" onClick={_ => handleModal(modalType.PROFILE_EYECATCH, {image: coverPhotoImg})}>
                <>
                  <i className="icon icon-disk"></i>
                  変更する
                </>
              </Button>
            </div>
          ) : null }
          <div className="heading__user">
            <Avatar className="avatar--profile"
              style={{ backgroundImage: `url("${avatarImg}")` }}
              isEdit={isEdit}
            >
              { isEdit ? (
                <Button className="button--avatar" onClick={_ => handleModal(modalType.PROFILE_AVATAR, {image: avatarImg})}>
                  <>
                    <i className="icon icon-image"></i>
                    変更する
                  </>
                </Button>
              ) : null }
            </Avatar>
            <div className="heading__user-main">
              <h2 className="heading__user-name">{title || 'TODO if remove api auth-token'}</h2>
              <p className="heading__user-position">
                {subTitle}
              </p>
              { isOwner == true ? (
                isEdit ? (
                  <Button className="button--pill heading__user-pill">
                    <>
                      <i className="icon icon-disk text-dark-yellow"></i>
                      更新
                    </>
                  </Button>
                ) : (
                  <Link to={routes.PROFILE_EDIT} className="button button--pill heading__user-pill">
                    <span><i className="icon icon-pencil text-dark-yellow"></i>編集</span>
                  </Link>
                )
              ) : (
                isLogged ? (
                  accountType === 'student' ? (
                    <>
                      <Link to={routes.SCOUTS} className="button button--large heading__user-button">
                        スカウト
                      </Link>
                      <Button className="button--link heading__user-fav" onClick={e => handleLike('student')}>
                        <Pill className={`pill--icon text-medium-black ${hasUserLiked ? state.ACTIVE : ''}`}>
                          <i className="icon icon-star"></i>{userLikes}
                        </Pill>
                      </Button>
                    </>
                  ) : accountType === 'company' ? (
                    <Button className="button--link heading__user-fav" onClick={e => handleLike('company')}>
                      <Pill className={`pill--icon text-medium-black ${hasUserLiked ? state.ACTIVE : ''}`}>
                        <i className="icon icon-star"></i>{userLikes}
                      </Pill>
                    </Button>
                  ) : null
                ) : (
                  <div className="heading__user-fav">
                    <Pill className="pill--icon text-medium-black">
                      <i className="icon icon-star"></i>{userLikes}
                    </Pill>
                  </div>
                )
              )}
            </div>
          </div>
        </>
      ) : type && type === 'job' ? (
        <div className="heading__job">
          <div className="heading__job-main">
            <time className="heading__job-time" datatime={jobData.time}>{moment(jobData.time).format('YYYY/MM/DD')}</time>
            <h2 className="heading__job-title">{title}</h2>
            <div className="heading__job-company">
              <img src={jobData.companyAvatar || avatarPlaceholder} alt=""/>
              <div className="heading__job-company-name">
                {jobData.companyName}
              </div>
            </div>
            <ul className="heading__job-pills">
              { jobData.pills && jobData.pills.programming_language ? <li className="heading__job-pills-item pill">{jobData.pills.programming_language}</li> : null }
              { jobData.pills && jobData.pills.prefecture ? <li className="heading__job-pills-item pill">{jobData.pills.prefecture}</li> : null }
              { jobData.time ? <li className="heading__job-pills-item pill">{moment(jobData.time).fromNow()}</li> : null }
            </ul>

            { isLogged ? (
              <>
                { accountType === 'student' ?
                  (
                    jobData.applied
                      ? <Button className={`button--large heading__job-button ${state.DISABLED}`}>応募済み</Button>
                      : <Button className="button--large heading__job-button" onClick={_ => handleModal(modalType.JOB_APPLY, {id: params.id})}>応募する</Button>
                  )
                : null }
                <Button className="button--link heading__job-fav" onClick={e => handleLike('job')}>
                  <Pill className={`pill--icon text-medium-black ${hasUserLiked ? state.ACTIVE : ''}`}>
                    <i className="icon icon-star"></i>{userLikes}
                  </Pill>
                </Button>
              </>
            ) : (
              <div className="heading__job-fav">
                <Pill className="pill--icon text-medium-black">
                  <i className="icon icon-star"></i>{userLikes}
                </Pill>
              </div>
            )}
          </div>
        </div>
      ) : (
        <>
          <h2 className="heading__title">{title}</h2>
          <p className="heading__title-jp">{subTitle}</p>
        </>
      )}
    </div>
  );
}

export default Heading;
