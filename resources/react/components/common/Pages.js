import React from 'react';
import { Switch, Route } from 'react-router-dom';

import JobsPage from '../jobs/JobsPage';
import JobPage from '../jobs/JobPage';

import ProfilePage from '../profile/ProfilePage';
import SettingsPage from '../profile/SettingsPage';

import StudentPage from '../student/StudentPage';
import FavoritesPage from '../student/FavoritesPage';
import ApplyPage from '../student/ApplyPage';
import ScoutsPage from '../student/ScoutsPage';

import CompanyPage from '../company/CompanyPage';
import DashboardPage from '../company/DashboardPage';
import RecruitmentPage from '../company/RecruitmentPage';
import CandidatesPage from '../company/CandidatesPage';
import ScoutPage from '../company/ScoutPage';

import NotificationsPage from '../notification/NotificationsPage';
import NotificationPage from '../notification/NotificationPage';

import TermsPage from '../terms/TermsPage';
import HelpPage from '../help/HelpPage';
import PrivacyPage from '../privacy/PrivacyPage';

import PageTop from '../service/PageTop';
import requireAuth from '../../utils/requireAuth';

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
        path={routes.JOBS}
        component={JobsPage}
      />
      <Route
        exact
        path={routes.JOB_DETAIL}
        component={JobPage}
      />
      <Route
        exact
        path={routes.MY_PROFILE}
        component={requireAuth(ProfilePage)}
      />
      <Route
        exact
        path={routes.PROFILE_SETTINGS}
        component={requireAuth(SettingsPage)}
      />
      <Route
        exact
        path={routes.STUDENT_DETAIL}
        component={requireAuth(StudentPage)}
      />
      <Route
        exact
        path={routes.PROFILE_FAV}
        component={requireAuth(FavoritesPage)}
      />
      <Route
        exact
        path={routes.PROFILE_APPLY}
        component={requireAuth(ApplyPage)}
      />
      <Route
        exact
        path={routes.PROFILE_SCOUTS}
        component={requireAuth(ScoutsPage)}
      />
      <Route
        exact
        path={routes.COMPANY_DETAIL}
        component={requireAuth(CompanyPage)}
      />
      <Route
        exact
        path={routes.DASHBOARD}
        component={requireAuth(DashboardPage)}
      />
      <Route
        exact
        path={routes.RECRUITMENT}
        component={requireAuth(RecruitmentPage)}
      />
      <Route
        exact
        path={routes.CANDIDATES}
        component={requireAuth(CandidatesPage)}
      />
      <Route
        exact
        path={routes.SCOUT}
        component={requireAuth(ScoutPage)}
      />
      <Route
        exact
        path={routes.NOTIFICATIONS}
        component={requireAuth(NotificationsPage)}
      />
      <Route
        exact
        path={routes.NOTIFICATIONS_DETAIL}
        component={requireAuth(NotificationPage)}
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
