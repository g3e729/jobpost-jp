import React from 'react';

import Pagination from '../common/Pagination';
import Button from '../common/Button';
import { state } from '../constants/state';

const JobsList = () => {
  return (
    <div className="jobs-list">
      <div className="jobs-list__top">
        <div className="jobs-list__fraction">
          <span className="jobs-list__fraction-numeration">10</span> / 75
        </div>
        <div className="jobs-list__actions">
          <Button className={`button--link jobs-list__actions-button ${state.ACTIVE}`}
            value={`新着順`}
          />
          <Button className="button--link jobs-list__actions-button"
            value={`人気順`}
          />
        </div>
      </div>
      <div className="jobs-list__content">
        <ul className="jobs-list__posts">
          { [1, 2, 3, 4, 5].map((_, idx) => {
            return (
              <li className="jobs-list__posts-item" key={idx}>
                <div className="jobs">
                  <div className="jobs__top">
                    <div className="jobs__top-left">
                      <div className="jobs__eyecatch">
                        <div className="jobs__eyecatch-img" style={{ backgroundImage: 'url("https://lorempixel.com/640/640/business/")' }}></div>
                      </div>
                    </div>
                    <div className="jobs__top-right">
                      <div className="jobs__company">
                        <img src="https://lorempixel.com/240/240/city/" alt=""/>
                        <div className="jobs__company-name">
                          ジーコム株式会社
                        </div>
                      </div>
                      <div className="jobs__title">
                        自社★C2Cマッチングプラットフォーム開発
                        【少数精鋭/残業少/フレックス】
                      </div>
                    </div>
                  </div>
                  <div className="jobs__content">
                    <div className="jobs__description">
                      恥の多い生涯を送って来ました。自分には、人間の生活というものが、見当つかないのです。自分は東北の田舎に生まれましたので、汽車をはじめて見たのは、よほど大きくなってからでした。自分は停車場のブリッジを、上って、降りて、そうしてそれが線路をまたぎ越えるために造られたものだという事には...全然気づかず、ただそれは停車場の構内を外国の遊戯場みたいに、
                    </div>
                  </div>
                  <div className="jobs__footer">
                    <ul className="jobs__pills">
                      <li className="jobs__pills-item pill">PHP</li>
                      <li className="jobs__pills-item pill">東京</li>
                      <li className="jobs__pills-item pill">3日前</li>
                    </ul>
                    <div className="jobs__fav">
                      <span className="pill pill--icon">
                        <i className="icon icon-star"></i>1.2k
                      </span>
                    </div>
                  </div>
                </div>
              </li>
            );
          }) }
        </ul>
      </div>
      <div className="jobs-list__footer">
        <Pagination />
      </div>
    </div>
  );
}

export default JobsList;
