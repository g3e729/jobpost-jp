import React from 'react';
import { Switch, Route } from 'react-router-dom';

import ProfilePage from '../profile/ProfilePage';
import CompaniesPage from '../company/CompaniesPage';
import JobsPage from '../jobs/JobsPage';

import { routes } from '../constants/routes';

const Pages = () => (
  <div className="pages">
    <Switch>
      <Route
        exact
        path={routes.PROFILE}
        component={ProfilePage}
      />
      <Route
        exact
        path={routes.COMPANIES}
        component={CompaniesPage}
      />
      <Route
        exact
        path={routes.JOBS}
        component={JobsPage}
      />
    </Switch>
  </div>
);

export default Pages;
