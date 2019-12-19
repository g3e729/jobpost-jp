import React from 'react';
import { Link } from 'react-router-dom';

import Button from '../common/Button';
import Fraction from '../common/Fraction';
import Pagination from '../common/Pagination';
import { routes } from '../../constants/routes';
import { state } from '../../constants/state';

const RecruitmentList = () => (
  <div className="recruitment-list__container">
    <h3 className="recruitment-list__title">募集一覧</h3>
    <div className="recruitment-list__action">
      <ul className="recruitment-list__actions">
        <li className="recruitment-list__actions-item">
          <Link to={routes.RECRUITMENT_ADD} className="button button--icon">
            <>
              <i className="icon icon-plus"></i>
              新規作成
            </>
          </Link>
        </li>
        <li className="recruitment-list__actions-item">
          <Button className={`button--link recruitment-list__actions-item-button ${state.ACTIVE}`}>
            すべて
          </Button>
        </li>
        <li className="recruitment-list__actions-item">
          <Button className={`button--link recruitment-list__actions-item-button`}>
            募集中
          </Button>
        </li>
        <li className="recruitment-list__actions-item">
          <Button className={`button--link recruitment-list__actions-item-button`}>
            停止中
          </Button>
        </li>
      </ul>
      <Fraction numerator="10"
        denominator="45"
      />
    </div>
    <ul className="recruitment-list">
      <li className="recruitment-list__item">
        sample
      </li>
    </ul>
    <div className="recruitment-list__pagination">
      <Pagination />
    </div>
  </div>
);

export default RecruitmentList;
