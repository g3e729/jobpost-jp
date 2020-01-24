import React from 'react';
import { useDispatch, connect } from 'react-redux';

import Button from '../common/Button';
import SeekerList from './SeekerList';
import { routes } from '../../constants/routes';
import { modalType } from '../../constants/config';
import { setModal } from '../../actions/modal';

const DashboardSection = (props) => {
  const {
    scouted,
    applied,
    liked,
    isLoading = false,
    user
  } = props;
  const dispatch = useDispatch();
  const tickets = (user.userData && user.userData.profile && user.userData.profile.available_tickets) || 0;

  const handleAddTickets = _ => {
    dispatch(setModal(modalType.STUDENT_SCOUT));
  }

  return (
    <div className="dashboard-section">
      <div className="dashboard-section__top">
        <div className="dashboard-section__reminder">
          <div className="dashboard-section__reminder-text">残りのスカウトチケット数</div>
          <div className="dashboard-section__reminder-tickets">{tickets}<span>枚</span></div>
          <Button className="button--large" onClick={_ => handleAddTickets()}>
            チケットの追加
          </Button>
        </div>
      </div>
      <div className="dashboard-section__content">
        <SeekerList title="最近スカウト"
          students={scouted}
          isLoading={isLoading}
          link={{
            pathname: routes.CANDIDATES,
            search: "?scouted=1",
            state: { fromDashboard: true }
          }} />
        <SeekerList title="最近の応募"
          students={applied}
          isLoading={isLoading}
          link={{
            pathname: routes.CANDIDATES,
            search: "?applied=1",
            state: { fromDashboard: true }
          }} />
        <SeekerList title="最近のお気に入り"
          students={liked}
          isLoading={isLoading}
          link={{
            pathname: routes.CANDIDATES,
            search: "?liked=1",
            state: { fromDashboard: true }
          }} />
      </div>
    </div>
  );
}

const mapStateToProps = (state) => ({
  user: state.user
});

export default connect(mapStateToProps)(DashboardSection);
