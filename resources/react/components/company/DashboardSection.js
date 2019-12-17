import React from 'react';

import Button from '../common/Button';
import SeekerList from './SeekerList';
import { routes } from '../../constants/routes';

const DashboardSection = _ => (
  <div className={`dashboard-section dashboard`}>
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
      <SeekerList title="最近スカウト" link={routes.SAMPLE} />
      <SeekerList title="最近の応募" link={routes.SAMPLE} />
      <SeekerList title="最近のお気に入り" link={routes.SAMPLE} />
    </div>
  </div>
);

export default DashboardSection;
