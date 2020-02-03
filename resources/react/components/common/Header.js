import React from 'react';
import { NavLink, Link } from 'react-router-dom';
import { connect } from 'react-redux';

import Dropdown from './Dropdown';
import Search from './Search';
import { routes } from '../../constants/routes';
import { state } from '../../constants/state';

import logo from '../../../img/logo-kredo-horizontal.png';
import logoSp from '../../../img/logo-kredo-icon.png';

const Header = (props) => {
  const { user, notifications } = props;
  const accountType = (user.userData && user.userData.account_type) || '';
  const newNotifications = notifications.notificationsData && notifications.notificationsData.unseen_total;

  return (
    <header className="l-header header">
      <div className="l-container l-container--wide flex flex--space-between">
        <div className="l-header__left">
          <h1 className="header__logo">
            <Link to={accountType === 'company' ? routes.DASHBOARD : routes.ROOT}>
              <picture>
                <source srcSet={logo} media="(min-width: 769px)" />
                <img src={logoSp} alt="Kredo" className="header__logo-image" />
              </picture>
            </Link>
          </h1>

          <NavLink exact to={routes.JOBS} className="button button--icon u-show-pc" activeClassName={state.ACTIVE}>
            <i className="icon icon-squares-list"></i>
            募集一覧
          </NavLink>
        </div>
        <div className="l-header__right">
          <Search />

          <ul className="header__actions">
            { accountType && accountType.length && (
              <>
                <li className="header__actions-item">
                  <NavLink exact to={routes.MESSAGES} activeClassName={state.ACTIVE}>
                    <i className="icon icon-mail text-dark-yellow"></i>
                  </NavLink>
                </li>
                <li className="header__actions-item">
                  <NavLink exact to={routes.NOTIFICATIONS} activeClassName={state.ACTIVE}>
                    <i className="icon icon-bell text-dark-yellow">
                      { newNotifications ? <span className="badge badge--bell">{newNotifications}</span> : null }
                    </i>
                  </NavLink>
                </li>
              </>
            )}
            <li className="header__actions-item">
              <Dropdown />
            </li>
          </ul>
        </div>
      </div>
    </header>
  );
}

const mapStateToProps = (state) => ({
  user: state.user,
  notifications: state.notifications
});

export default connect(mapStateToProps)(Header);
