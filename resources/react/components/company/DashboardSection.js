import React from 'react';

import Button from '../common/Button';
import SeekerList from './SeekerList';
import { routes } from '../../constants/routes';

const DashboardSection = (props) => {
  const {
    scouted,
    applied,
    liked,
    isLoading = false
  } = props;

  return (
    <div className="dashboard-section">
      <div className="dashboard-section__top">
        <div className="dashboard-section__reminder">
          <div className="dashboard-section__reminder-text">残りのスカウトチケット数</div>
          <div className="dashboard-section__reminder-tickets">29<span>枚</span></div>
          <Button className="button--large">
            チケットの追加
          </Button>
        </div>
      </div>
      <div className="dashboard-section__content">
        <SeekerList title="最近スカウト"
          students={scouted}
          isLoading={isLoading}
          link={{
            pathname: routes.SCOUT,
            search: "?scouted=1",
            state: { fromDashboard: true }
          }} />
        <SeekerList title="最近の応募"
          students={applied}
          isLoading={isLoading}
          link={{
            pathname: routes.SCOUT,
            search: "?applied=1",
            state: { fromDashboard: true }
          }} />
        <SeekerList title="最近のお気に入り"
          students={liked}
          isLoading={isLoading}
          link={{
            pathname: routes.SCOUT,
            search: "?liked=1",
            state: { fromDashboard: true }
          }} />
      </div>
    </div>
  );
}

export default DashboardSection;
