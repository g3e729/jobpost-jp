import React from 'react';
import { NavLink } from 'react-router-dom';

import { routes } from '../../constants/routes';
import { state } from '../../constants/state';

const Dashboard = _ => (
  <div className="dashboard">
    <aside className="dashboard__sidebar">
      <div className="dashboard__sidebar-inner">
        <ul className="dashboard__sidebar-menu">
          <li className="dashboard__sidebar-menu-item">
            <NavLink exact to={routes.DASHBOARD} activeClassName={state.ACTIVE}>
              ダッシュボード
            </NavLink>
          </li>
        </ul>
      </div>
    </aside>
    <div className="dashboard__main">content</div>
  </div>
);

export default Dashboard;
