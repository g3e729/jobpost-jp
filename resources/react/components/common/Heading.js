import React from 'react';

import Avatar from '../common/Avatar';
import Button from '../common/Button';
import Pill from '../common/Pill';

const Heading = ({ type, title, subTitle, isOwner = true, accountType = null, children, ...rest }) => {
  const avatarImg = rest['data-avatar'] || '';

  return (
    <div className={`heading heading--${type || 'default'}`} {...rest}>
      { type && type === 'user' ? (
          <div className="heading__user">
            <Avatar className="avatar--profile"
              style={{ backgroundImage: `url("${avatarImg}")` }}
            />
            <div className="heading__user-main">
              <h2 className="heading__user-name">{title}</h2>
              <p className="heading__user-position">
                {subTitle}
              </p>
              { isOwner == true ? (
                <Button className="button--pill heading__user-pill">
                  <span><i className="icon icon-pencil text-dark-yellow"></i>編集</span>
                </Button>
              ) : (
                accountType === 'student' ? (
                  <>
                    <Button className="button--large heading__user-button">スカウト</Button>
                    <Button className="button--link heading__user-fav">
                      <Pill className="pill--icon text-medium-black">
                        <i className="icon icon-star"></i>1.2k
                      </Pill>
                    </Button>
                  </>
                ) : null
              )}
            </div>
          </div>
        ) : (
          <>
            <h2 className="heading__title">{title}</h2>
            <p className="heading__title-jp">{subTitle}</p>
          </>
        )
      }
    </div>
  );
}

export default Heading;
