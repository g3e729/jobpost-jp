import React from 'react';
import { NavLink, Link } from 'react-router-dom';

import Avatar from './Avatar';
import Search from './Search';
import { routes } from '../constants/routes';

const Header = () => (
  <header className="l-header header">
    <div className="l-container l-container--wide flex flex--space-between">
      <div className="l-header__left">
        <h1 className="header__logo">
          <Link to={routes.PROFILE}>
            <img src="../img/logo-kredo-new.png" alt="Kredo" className="header__logo-image"/>
          </Link>
        </h1>

        <NavLink exact to={routes.JOBS} className="button button--list" activeClassName="is-active">
          <i className="icon icon-squares-list"></i>
          募集一覧
        </NavLink>
      </div>
      <div className="l-header__right">
        <Search />

        <ul className="header-actions">
          <li className="header-actions__item">
            <NavLink exact to={routes.MESSAGES} activeClassName="is-active">
              <i className="icon icon-mail text-orange"></i>
            </NavLink>
          </li>
          <li className="header-actions__item">
            <NavLink exact to={routes.NOTIFICATIONS} activeClassName="is-active">
              <i className="icon icon-bell text-orange">
                <span className="badge badge--bell">10</span>
              </i>
            </NavLink>
          </li>
          <li className="header-actions__item">
            <Avatar className="avatar--header" style={{backgroundImage: 'url("http://i.pravatar.cc/300")' }}></Avatar>
          </li>
        </ul>
      </div>
    </div>
  </header>
)

export default Header;
