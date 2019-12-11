import React from 'react';
import { NavLink, Link } from 'react-router-dom';
import { connect } from 'react-redux';

import Dropdown from './Dropdown';
import Search from './Search';
import { routes } from '../../constants/routes';
import { state } from '../../constants/state';

import logo from '../../../img/logo-kredo-new.png';
import logoSp from '../../../img/logo-kredo-icon-sp.png';

const Header = (props) => {
  const { user } = props;
  const accountType = (user.userData && user.userData.accountType) || '';

  return (
    <header className="l-header header">
      <div className="l-container l-container--wide flex flex--space-between">
        <div className="l-header__left">
          <h1 className="header__logo">
            <Link to={routes.ROOT}>
              <picture>
                <source srcSet={logo} media="(min-width: 769px)" />
                <img src={logoSp} alt="Kredo" className="header__logo-image" />
              </picture>
            </Link>
          </h1>

          <NavLink exact to={routes.JOBS} className="button button--list u-show-pc" activeClassName={state.ACTIVE}>
            <i className="icon icon-squares-list"></i>
            募集一覧
          </NavLink>
        </div>
        <div className="l-header__right">
          <Search />

          <ul className="header-actions">
            { accountType && accountType.length && (
              <>
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
              </>
            )}
            <li className="header-actions__item">
              <Dropdown />
            </li>
          </ul>
        </div>
      </div>
    </header>
  );
}

const mapStateToProps = (state) => ({
  user: state.user
});

export default connect(mapStateToProps)(Header);
