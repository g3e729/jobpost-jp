import React, { useState, useEffect } from 'react';
import { NavLink, Link } from 'react-router-dom';

import Dropdown from './Dropdown';
import Search from './Search';
import { routes } from '../constants/routes';
import { state } from '../constants/state';

import logo from '../../../img/logo-kredo-new.png';

const Header = () => {
  return (
    <header className="l-header header">
      <div className="l-container l-container--wide flex flex--space-between">
        <div className="l-header__left">
          <h1 className="header__logo">
            <Link to={routes.ROOT}>
              <img src={logo} alt="Kredo" className="header__logo-image"/>
            </Link>
          </h1>

          <NavLink exact to={routes.JOBS} className="button button--list" activeClassName={state.ACTIVE}>
            <i className="icon icon-squares-list"></i>
            募集一覧
          </NavLink>
        </div>
        <div className="l-header__right">
          <Search />

          <ul className="header-actions">
            <li className="header-actions__item">
              <NavLink exact to={routes.MESSAGES} activeClassName={state.ACTIVE}>
                <i className="icon icon-mail text-dark-yellow"></i>
              </NavLink>
            </li>
            <li className="header-actions__item">
              <NavLink exact to={routes.NOTIFICATIONS} activeClassName={state.ACTIVE}>
                <i className="icon icon-bell text-dark-yellow">
                  <span className="badge badge--bell">10</span>
                </i>
              </NavLink>
            </li>
            <li className="header-actions__item">
              <Dropdown />
            </li>
          </ul>
        </div>
      </div>
    </header>
  );
}

export default Header;
