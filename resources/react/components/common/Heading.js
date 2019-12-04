import React from 'react';

import Avatar from '../common/Avatar';
import Button from '../common/Button';

const Heading = ({ type, children, title, subTitle, ...props }) => {
  const avatarImg = props['data-avatar'] || '';

  return (
    <div className={`heading heading--${type || 'default'}`} {...props}>
      { type && type === 'user' ? (
          <div className="heading-content">
            <Avatar className="avatar--profile"
              style={{ backgroundImage: `url("${avatarImg}")` }}
            />
            <div className="heading-content__main">
              <h2 className="heading-content__name">{title}</h2>
              <p className="heading-content__position">
                {subTitle}
              </p>
              <Button className="button--pill heading-content__button"
                value={<span><i className="icon icon-pencil text-dark-yellow"></i>編集</span>}
              />
            </div>
          </div>
        ) : (
          <React.Fragment>
            <h2 className="heading__title text-dark-yellow">{title}</h2>
            <p className="heading__title-jp">{subTitle}</p>
          </React.Fragment>
        )
      }
    </div>
  );
}

export default Heading;
