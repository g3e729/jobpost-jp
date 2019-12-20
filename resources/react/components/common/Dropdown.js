import React, { useState, useEffect } from 'react';
import { NavLink } from 'react-router-dom';
import { connect } from 'react-redux';

import Avatar from './Avatar';
import Button from './Button';
import { routes } from '../../constants/routes';
import { state } from '../../constants/state';
import { logoutUser } from '../../actions/user';
import useInterval from '../../utils/useInterval';

import avatarDefault from '../../../img/avatar-default.png';

const Dropdown = (props) => {
  const [dropdown, setDropdown] = useState(false);
  const [dropdownHover, setDropdownHover] = useState(false);
  const { user, handleLogoutUser } = props;
  const avatar = (user.userData && user.userData.profile && user.userData.profile.avatar) || avatarDefault;
  const accountType = (user.userData && user.userData.account_type) || '';

  useInterval(_ => {
    if (dropdown) {
      setDropdown(false);
    }
  }, dropdownHover ? 5000 : null);

  return (
    accountType && accountType.length ? (
      <>
        <Button className="button--link" onClick={_ => setDropdown(!dropdown)}>
          <Avatar className={`avatar--header ${dropdown ? state.ACTIVE : ''}`}
            style={{ backgroundImage: `url("${avatar}")` }} />
        </Button>
        <nav className={`dropdown ${dropdown ? state.ACTIVE : ''}`} onMouseOver={_ => setDropdownHover(false)} onMouseOut={_ => setDropdownHover(true)}>
          { accountType === 'student' ? (
            <ul className="dropdown__menu">
              <li className="dropdown__menu-item">
                <NavLink onClick={_ => setDropdown(false)} exact to={routes.MY_PROFILE} activeClassName={state.ACTIVE}>
                  マイページ
                </NavLink>
              </li>
              <li className="dropdown__menu-item">
                <NavLink onClick={_ => setDropdown(false)} exact to={routes.PROFILE_FAV} activeClassName={state.ACTIVE}>
                  お気に入りした募集
                </NavLink>
              </li>
              <li className="dropdown__menu-item">
                <NavLink onClick={_ => setDropdown(false)} exact to={routes.PROFILE_APPLY} activeClassName={state.ACTIVE}>
                  応募した募集
                </NavLink>
              </li>
              <li className="dropdown__menu-item">
                <NavLink onClick={_ => setDropdown(false)} exact to={routes.PROFILE_SCOUTS} activeClassName={state.ACTIVE}>
                  スカウト一覧
                </NavLink>
              </li>
              <li className="dropdown__menu-item">
                <NavLink onClick={_ => setDropdown(false)} exact to={routes.PROFILE_SETTINGS} activeClassName={state.ACTIVE}>
                  アカウントの設定
                </NavLink>
              </li>
              <li className="dropdown__menu-item">
                <a onClick={_ => handleLogoutUser()}>
                  ログアウト
                </a>
              </li>
            </ul>
          ) : accountType === 'company' ? (
            <ul className="dropdown__menu">
              <li className="dropdown__menu-item">
                <NavLink onClick={_ => setDropdown(false)} exact to={routes.MY_PROFILE} activeClassName={state.ACTIVE}>
                  会社ページ
                </NavLink>
              </li>
              <li className="dropdown__menu-item">
                <NavLink onClick={_ => setDropdown(false)} exact to={routes.PROFILE_EDIT} activeClassName={state.ACTIVE}>
                  会社情報編集
                </NavLink>
              </li>
              <li className="dropdown__menu-item">
                <NavLink onClick={_ => setDropdown(false)} exact to={routes.CANDIDATES} activeClassName={state.ACTIVE}>
                  気になる生徒
                </NavLink>
              </li>
              <li className="dropdown__menu-item">
                <NavLink onClick={_ => setDropdown(false)} exact to={routes.PROFILE_SETTINGS} activeClassName={state.ACTIVE}>
                  アカウントの設定
                </NavLink>
              </li>
              <li className="dropdown__menu-item">
                <a onClick={_ => handleLogoutUser()}>
                  ログアウト
                </a>
              </li>
            </ul>
          ) : null }
        </nav>
      </>
    ) : (
      <a href="/login" className="button button--outline">
        ログインする
      </a>
    )
  );
}

const mapStateToProps = (state) => ({
  user: state.user
});

const mapDispatchToProps = (dispatch) => ({
  handleLogoutUser: _ => {
    dispatch(logoutUser());
  }
});

export default connect(mapStateToProps, mapDispatchToProps)(Dropdown);
