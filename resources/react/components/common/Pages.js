import React from 'react';
import { Switch, Route } from 'react-router-dom';

import ProfilePage from '../profile/ProfilePage';
import CompaniesPage from '../company/CompaniesPage';
import JobsPage from '../jobs/JobsPage';

import AboutPage from '../about/AboutPage';
import TermsPage from '../terms/TermsPage';
import HelpPage from '../help/HelpPage';
import PrivacyPage from '../privacy/PrivacyPage';

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
      <Route
        exact
        path={routes.ABOUT}
        component={AboutPage}
      />
      <Route
        exact
        path={routes.TERMS}
        component={TermsPage}
      />
      <Route
        exact
        path={routes.HELP}
        component={HelpPage}
      />
      <Route
        exact
        path={routes.PRIVACY}
        component={PrivacyPage}
      />
    </Switch>
  </div>
);

export default Pages;
