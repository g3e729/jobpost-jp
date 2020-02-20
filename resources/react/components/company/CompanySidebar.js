import React from 'react';
import { Link, NavLink } from 'react-router-dom';

import { routes } from '../../constants/routes';
import { state } from '../../constants/state';

const CompanySidebar = _ => (
  <aside className="company-sidebar">
    <ul className="company-sidebar__menu">
      <li className="company-sidebar__menu-item">
        <NavLink exact to={routes.DASHBOARD} activeClassName={state.ACTIVE}>
          ダッシュボード
        </NavLink>
      </li>
      <li className="company-sidebar__menu-item">
        <NavLink to={routes.RECRUITMENT} activeClassName={state.ACTIVE}>
          募集
        </NavLink>
      </li>
      <li className="company-sidebar__menu-item">
        <NavLink exact to={routes.CANDIDATES} activeClassName={state.ACTIVE}>
          候補者
        </NavLink>
      </li>
      <li className="company-sidebar__menu-item">
        <NavLink exact to={routes.SCOUT} activeClassName={state.ACTIVE}>
          スカウト
        </NavLink>
      </li>
      <li className="company-sidebar__menu-item">
        <NavLink exact to={routes.MY_PROFILE} activeClassName={state.ACTIVE}>
          会社ページ
        </NavLink>
      </li>
      <li className="company-sidebar__menu-item">
        <NavLink exact to={routes.DASHBOARD_PROFILE} activeClassName={state.ACTIVE}>
          会社情報編集
        </NavLink>
      </li>
      <li className="company-sidebar__menu-item">
        <Link to={routes.HELP}>
          ヘルプ
        </Link>
      </li>
      <li className="company-sidebar__menu-item">
        <a href="https://docs.google.com/forms/d/16ej6ZdxOwVbfByHDaxPtGkP9st_DnH509WecmU018k4/edit?usp=sharing" target="_blank">
          お問い合わせ
          <i className="icon icon-external-link"></i>
        </a>
      </li>
    </ul>
  </aside>
);

export default CompanySidebar;
