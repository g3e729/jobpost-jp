import React from 'react';
import { Link, useParams } from 'react-router-dom';

import Avatar from '../common/Avatar';
import Button from '../common/Button';
import Pill from '../common/Pill';
import Like from '../../utils/like';
import { routes } from '../../constants/routes';

const Heading = ({
  type,
  title,
  subTitle,
  isOwner = true,
  isEdit = false,
  isLogged = false,
  accountType = null,
  passedFunction = null,
  children,
  ...rest
}) => {
  const params = useParams();
  let userLikes = rest['data-likes'] || 0;
  const avatarImg = rest['data-avatar'] || '';

  const handleClick = (e, type) => {
    Like.toggleLike(type, params.id)
      .then((result) => {
        passedFunction();
        userLikes = result.data.total;

        console.log('[Liked]', result);
      }).catch(error => {
        console.log('[Liked ERROR]', error);
      });
  }

  return (
    <div className={`heading heading--${type || 'default'}`} {...rest}>
      { type && type === 'user' ? (
        <div className="heading__user">
          <Avatar className="avatar--profile"
            style={{ backgroundImage: `url("${avatarImg}")` }}
          />
          <div className="heading__user-main">
            <h2 className="heading__user-name">{title || 'TODO if remove api auth-token'}</h2>
            <p className="heading__user-position">
              {subTitle}
            </p>
            { isOwner == true ? (
              isEdit ? (
                <Link to={routes.PROFILE_EDIT} className="button button--pill heading__user-pill">
                  <span><i className="icon icon-toodo text-dark-yellow"></i>更新</span>
                </Link>
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
                    <Button className="button--link heading__user-fav" onClick={e => handleClick(e, 'student')}>
                      <Pill className="pill--icon text-medium-black">
                        <i className="icon icon-star"></i>{userLikes}
                      </Pill>
                    </Button>
                  </>
                ) : accountType === 'company' ? (
                  <Button className="button--link heading__user-fav" onClick={e => handleClick(e, 'company')}>
                    <Pill className="pill--icon text-medium-black">
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
      ) : type && type === 'job' ? (
        <div className="heading__job">
          <div className="heading__job-main">
            <time className="heading__job-time">2019/07/24</time>
            <h2 className="heading__job-title">自社★C2Cマッチングプラットフォーム開発【少数精鋭/残業少/フレックス】</h2>
            <div className="heading__job-company">
              <img src="https://lorempixel.com/240/240/city/" alt=""/>
              <div className="heading__job-company-name">
                株式会社アクターリアリティ
              </div>
            </div>
            <ul className="heading__job-pills">
              <li className="heading__job-pills-item pill">PHP</li>
              <li className="heading__job-pills-item pill">東京</li>
              <li className="heading__job-pills-item pill">3日前</li>
            </ul>

            { isLogged ? (
              accountType === 'student' ? (
                <>
                  <Button className="button--large heading__job-button">応募する</Button>
                  <Button className="button--link heading__job-fav" onClick={e => handleClick(e, 'job')}>
                    <Pill className="pill--icon text-medium-black">
                      <i className="icon icon-star"></i>{userLikes}
                    </Pill>
                  </Button>
                </>
              ) : (
                <Button className="button--link heading__job-fav" onClick={e => handleClick(e, 'job')}>
                  <Pill className="pill--icon text-medium-black">
                    <i className="icon icon-star"></i>{userLikes}
                  </Pill>
                </Button>
              )
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
