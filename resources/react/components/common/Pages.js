import React from 'react';
import { Switch, Route } from 'react-router-dom';
import { connect } from 'react-redux';

import JobsPage from '../jobs/JobsPage';
import JobPage from '../jobs/JobPage';

import ProfilePage from '../profile/ProfilePage';
import EditProfilePage from '../profile/EditProfilePage';
import SettingsPage from '../profile/SettingsPage';

import StudentPage from '../student/StudentPage';
import FavoritesPage from '../student/FavoritesPage';
import ApplicationsPage from '../student/ApplicationsPage';
import ScoutsPage from '../student/ScoutsPage';

import CompanyPage from '../company/CompanyPage';
import DashboardPage from '../company/DashboardPage';
import DashboardProfilePage from '../company/DashboardProfilePage';
import RecruitmentPage from '../company/RecruitmentPage';
import AddRecruitmentPage from '../company/AddRecruitmentPage';
import EditRecruitmentPage from '../company/EditRecruitmentPage';
import CandidatesPage from '../company/CandidatesPage';
import ScoutPage from '../company/ScoutPage';
import CScoutsPage from '../company/ScoutsPage';

import SearchPage from '../search/SearchPage';

import MessagesPage from '../message/MessagesPage';

import NotificationsPage from '../notification/NotificationsPage';
import NotificationPage from '../notification/NotificationPage';

import TermsPage from '../terms/TermsPage';
import HelpPage from '../help/HelpPage';
import PrivacyPage from '../privacy/PrivacyPage';

import Four0FourPage from '../common/404';

import ModalService from '../service/ModalService';
import NotificationService from '../service/NotificationService';
import PageTopService from '../service/PageTopService';
import requireAuth from '../../utils/requireAuth';

import { routes } from '../../constants/routes';

const Pages = ({user}) => (
  <div className="pages">
    <ModalService />
    { user.isLogged ? <NotificationService /> : null }
    <PageTopService />
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
        path={routes.PROFILE_EDIT}
        component={requireAuth(EditProfilePage)}
      />
      <Route
        exact
        path={routes.PROFILE_SETTINGS}
        component={requireAuth(SettingsPage)}
      />
      <Route
        exact
        path={routes.STUDENT_DETAIL}
        component={StudentPage}
      />
      <Route
        exact
        path={routes.PROFILE_FAV}
        component={requireAuth(FavoritesPage)}
      />
      <Route
        exact
        path={routes.PROFILE_APPLICATIONS}
        component={requireAuth(ApplicationsPage)}
      />
      <Route
        exact
        path={routes.PROFILE_SCOUTS}
        component={requireAuth(ScoutsPage)}
      />
      <Route
        exact
        path={routes.COMPANY_DETAIL}
        component={CompanyPage}
      />
      <Route
        exact
        path={routes.DASHBOARD}
        component={requireAuth(DashboardPage)}
      />
      <Route
        exact
        path={routes.DASHBOARD_PROFILE}
        component={requireAuth(DashboardProfilePage)}
      />
      <Route
        exact
        path={routes.RECRUITMENT}
        component={requireAuth(RecruitmentPage)}
      />
      <Route
        exact
        path={routes.RECRUITMENT_ADD}
        component={requireAuth(AddRecruitmentPage)}
      />
      <Route
        exact
        path={routes.RECRUITMENT_EDIT}
        component={requireAuth(EditRecruitmentPage)}
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
        path={routes.SCOUTS}
        component={requireAuth(CScoutsPage)}
      />
      <Route
        exact
        path={routes.SEARCH}
        component={SearchPage}
      />
      <Route
        exact
        path={routes.MESSAGES}
        component={requireAuth(MessagesPage)}
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
      <Route component={Four0FourPage} />
    </Switch>
  </div>
);

const mapStateToProps = (state) => ({
  user: state.user
});

export default connect(mapStateToProps)(Pages);
