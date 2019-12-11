import React from 'react';
import { Switch, Route } from 'react-router-dom';

import ProfilePage from '../profile/ProfilePage';
import FavoritesPage from '../profile/FavoritesPage';
import ApplyPage from '../profile/ApplyPage';
import ScoutsPage from '../profile/ScoutsPage';
import SettingsPage from '../profile/SettingsPage';

import CompaniesPage from '../company/CompaniesPage';
import CompanyPage from '../company/CompanyPage';

import JobsPage from '../jobs/JobsPage';

import NotificationPage from '../notification/NotificationPage';

import AboutPage from '../about/AboutPage';
import TermsPage from '../terms/TermsPage';
import HelpPage from '../help/HelpPage';
import PrivacyPage from '../privacy/PrivacyPage';

import PageTop from '../service/PageTop';

import { routes } from '../../constants/routes';

const Pages = _ => (
  <div className="pages">
    <PageTop />
    <Switch>
      <Route
        exact
        path={routes.ROOT}
        component={JobsPage}
      />
      <Route
        exact
        path={routes.MY_PROFILE}
        component={ProfilePage}
      />
      <Route
        exact
        path={routes.PROFILE_FAV}
        component={FavoritesPage}
      />
      <Route
        exact
        path={routes.PROFILE_APPLY}
        component={ApplyPage}
      />
      <Route
        exact
        path={routes.PROFILE_SCOUTS}
        component={ScoutsPage}
      />
      <Route
        exact
        path={routes.PROFILE_SETTINGS}
        component={SettingsPage}
      />
      <Route
        exact
        path={routes.COMPANIES}
        component={CompaniesPage}
      />
      <Route
        exact
        path={routes.COMPANIES_DETAIL}
        component={CompanyPage}
      />
      <Route
        exact
        path={routes.JOBS}
        component={JobsPage}
      />
      <Route
        exact
        path={routes.NOTIFICATIONS}
        component={NotificationPage}
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
