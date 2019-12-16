import React from 'react';
import { NavLink } from 'react-router-dom';

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
        <NavLink exact to={routes.RECRUITMENT} activeClassName={state.ACTIVE}>
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
    </ul>
  </aside>
);

export default CompanySidebar;
