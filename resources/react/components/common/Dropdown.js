import React, { useState, useEffect } from 'react';
import { NavLink } from 'react-router-dom';

import Avatar from './Avatar';
import Button from './Button';
import { routes } from '../../constants/routes';
import { state } from '../../constants/state';

const Dropdown = () => {
  const [dropdown, setDropdown] = useState(false);
  const userType = Math.random() >= 0.1 ? 'student' : 'company';

  useEffect(() => {
    const timer = setTimeout(() => {
      if (dropdown === true)
        setDropdown(false);
    }, 5000);

    return () => clearTimeout(timer);
  }, [dropdown]);

  const handleLogout = _ => {
    const elLogoutForm = document.querySelector('#js-logout-form');

    elLogoutForm.submit();
  }

  return (
    <>
      <Button className="button--link"
        onClick={_ => setDropdown(!dropdown)}
        value={<Avatar className="avatar--header" style={{ backgroundImage: 'url("https://avatars.dicebear.com/v2/male/john.svg")' }}></Avatar>}
      />
      <nav className={`dropdown ${dropdown ? state.ACTIVE : ''}`}>
        { userType === 'student' ? (
          <ul className="dropdown__menu">
            <li className="dropdown__menu-item">
              <NavLink onClick={() => setDropdown(false)} exact to={routes.MY_PROFILE} activeClassName={state.ACTIVE}>
                マイページ
              </NavLink>
            </li>
            <li className="dropdown__menu-item">
              <NavLink onClick={() => setDropdown(false)} exact to={routes.PROFILE_FAV} activeClassName={state.ACTIVE}>
                お気に入りした募集
              </NavLink>
            </li>
            <li className="dropdown__menu-item">
              <NavLink onClick={() => setDropdown(false)} exact to={routes.PROFILE_APPLY} activeClassName={state.ACTIVE}>
                応募した募集
              </NavLink>
            </li>
            <li className="dropdown__menu-item">
              <NavLink onClick={() => setDropdown(false)} exact to={routes.PROFILE_SCOUTS} activeClassName={state.ACTIVE}>
                スカウト一覧
              </NavLink>
            </li>
            <li className="dropdown__menu-item">
              <NavLink onClick={() => setDropdown(false)} exact to={routes.PROFILE_SETTINGS} activeClassName={state.ACTIVE}>
                アカウントの設定
              </NavLink>
            </li>
            <li className="dropdown__menu-item">
              <a onClick={() => handleLogout()}>
                ログアウト
              </a>
            </li>
          </ul>
        ) : (
          <ul className="dropdown__menu">
            <li className="dropdown__menu-item">
              <NavLink onClick={() => setDropdown(false)} exact to={routes.MY_PROFILE} activeClassName={state.ACTIVE}>
                会社ページ
              </NavLink>
            </li>
            <li className="dropdown__menu-item">
              <NavLink onClick={() => setDropdown(false)} exact to={routes.PROFILE_EDIT} activeClassName={state.ACTIVE}>
                会社情報編集
              </NavLink>
            </li>
            <li className="dropdown__menu-item">
              <NavLink onClick={() => setDropdown(false)} exact to={routes.STUDENTS} activeClassName={state.ACTIVE}>
                気になる生徒
              </NavLink>
            </li>
            <li className="dropdown__menu-item">
              <NavLink onClick={() => setDropdown(false)} exact to={routes.PROFILE_SETTINGS} activeClassName={state.ACTIVE}>
                アカウントの設定
              </NavLink>
            </li>
            <li className="dropdown__menu-item">
              <a onClick={() => handleLogout()}>
                ログアウト
              </a>
            </li>
          </ul>
        )}
      </nav>
    </>
  );
}

export default Dropdown;
