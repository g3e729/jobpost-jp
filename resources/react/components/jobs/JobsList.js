import React from 'react';

const JobsList = ({ hasTitle }) => (
  <>
    { hasTitle ? <h3 className="jobs-list__title">募集</h3> : null }
    <ul className={`jobs-list ${hasTitle ? 'jobs-list--titled' : ''}`}>
      { [...Array(5)].map((_, idx) => (
        <li className="jobs-list__item" key={idx}>
          <div className="job-list__item-top">
            <div className="job-list__item-top-left">
              <div className="job-list__item-eyecatch">
                <div className="job-list__item-eyecatch-img" style={{ backgroundImage: 'url("https://lorempixel.com/640/640/business/")' }}></div>
              </div>
            </div>
            <div className="job-list__item-top-right">
              <div className="job-list__item-company">
                <img src="https://lorempixel.com/240/240/city/" alt=""/>
                <div className="job-list__item-company-name">
                  ジーコム株式会社
                </div>
              </div>
              <h4 className="job-list__item-title">
                自社★C2Cマッチングプラットフォーム開発
                【少数精鋭/残業少/フレックス】
              </h4>
            </div>
          </div>
          <div className="job-list__item-content">
            <p className="job-list__item-description">
              恥の多い生涯を送って来ました。自分には、人間の生活というものが、見当つかないのです。自分は東北の田舎に生まれましたので、汽車をはじめて見たのは、よほど大きくなってからでした。自分は停車場のブリッジを、上って、降りて、そうしてそれが線路をまたぎ越えるために造られたものだという事には...全然気づかず、ただそれは停車場の構内を外国の遊戯場みたいに、
            </p>
          </div>
          <div className="job-list__item-footer">
            <ul className="job-list__item-pills">
              <li className="job-list__item-pills-item pill">PHP</li>
              <li className="job-list__item-pills-item pill">東京</li>
              <li className="job-list__item-pills-item pill">3日前</li>
            </ul>
            <div className="job-list__item-fav">
              <span className="pill pill--icon">
                <i className="icon icon-star"></i>1.2k
              </span>
            </div>
          </div>
        </li>
      )) }
    </ul>
  </>
);

export default JobsList;
