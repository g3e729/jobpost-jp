import React from 'react';
import { Link } from 'react-router-dom';

import Avatar from './Avatar';
import { routes } from '../constants/routes';

const Header = () => (
  <header className="l-header header">
    <div className="l-container l-container--wide flex flex-space-between">
      <div className="l-header__left">
        <h1 className="header__logo">
          <Link to={routes.PROFILE}>
            <img src="../img/logo-kredo-new.png"
              alt="Kredo"
              className="header__logo-image"/>
          </Link>
        </h1>

        <Link to={routes.JOBS}
          className="button button--list"
        >
          募集一覧
        </Link>
      </div>
      <div className="l-header__right">
        <Avatar className="avatar--header"
          style={{backgroundImage: 'url("http://i.pravatar.cc/300")' }}>
        </Avatar>
      </div>
    </div>
  </header>
)

export default Header;
