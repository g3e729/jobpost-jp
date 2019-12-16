import React from 'react';

import Avatar from '../common/Avatar';
import Button from '../common/Button';

const Heading = ({ type, title, subTitle, children, ...rest }) => {
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
              <Button className="button--pill heading__user-button">
                <span><i className="icon icon-pencil text-dark-yellow"></i>編集</span>
              </Button>
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
