import React from 'react';
import { Link } from 'react-router-dom';

import Button from '../common/Button';
import Fraction from '../common/Fraction';
import Pagination from '../common/Pagination';
import { routes } from '../../constants/routes';
import { state } from '../../constants/state';

const RecruitmentList = _ => (
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
      <li className="recruitment-list__item recruitment-list__item--header">
        <div className="recruitment-list__item-wrapper">
          <span className="recruitment-list__item-label">タイトル</span>
          <span className="recruitment-list__item-label">ステータス</span>
          <span className="recruitment-list__item-label">応募数</span>
          <span className="recruitment-list__item-label">お気に入り数</span>
        </div>
      </li>
      { [...Array(10)].map((_, idx) => (
      <li className="recruitment-list__item" key={idx}>
        <div className="recruitment-list__item-wrapper">
          <div className="recruitment-list__item-column">
            <div className="recruitment-list__item-column-left">
              <div className="recruitment-list__item-column-eyecatch">
                <div className="recruitment-list__item-column-eyecatch-img" style={{ backgroundImage: 'url("https://lorempixel.com/640/640/business/")' }}></div>
              </div>
            </div>
            <div className="recruitment-list__item-column-right">
              <h4 className="recruitment-list__item-column-title">
                自社★C2Cマッチングプラットフォーム開発
              </h4>
              <div className="recruitment-list__item-column-actions">
                <Link to={routes.RECRUITMENT_EDIT} className="button button--link recruitment-list__item-column-actions-button">
                  <>
                    <i className="icon icon-pencil"></i>
                    編集
                  </>
                </Link>
                <Button className="button--link recruitment-list__item-column-actions-button">
                  <>
                    <i className="icon icon-cross"></i>
                    削除
                  </>
                </Button>
              </div>
            </div>
          </div>
          <div className="recruitment-list__item-column">
            <span className="recruitment-list__item-column-status">
              募集中
            </span>
            {/* <span className="recruitment-list__item-column-status is-disabled">停止する</span> */}
          </div>
          <div className="recruitment-list__item-column">
            <span className="recruitment-list__item-column-applicants">
              3
            </span>
          </div>
          <div className="recruitment-list__item-column">
            <span className="recruitment-list__item-column-favorites">
              7
            </span>
          </div>
        </div>
      </li>
      )) }
    </ul>
    <div className="recruitment-list__pagination">
      <Pagination />
    </div>
  </div>
);

export default RecruitmentList;
