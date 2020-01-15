import React from 'react';
import moment from 'moment';
import { css } from 'emotion';

import Embed from '../common/Embed';

import avatarPlaceholder from '../../../img/avatar-default.png';

const Job = (props) => {
  const { job } = props;
  const company = job.company;

  return (
    <div className="job">
      <div className="job__main">
        { company.what_photos.length || company.what_text ? (
          <div className="job__main-data">
            <div className="job__main-heading">
              <span className="job__main-heading-en">WHAT</span>
              <h3 className="job__main-heading-title">何をやっているのか？</h3>
            </div>
            { company.what_photos.length ? (
              <div className="job__main-images">
                { company.what_photos.map((image, idx) => (
                  <div className="job__main-images-holder" key={idx}>
                    <div className="job__main-images-holder-img" style={{ backgroundImage: `url("${image}")` }}></div>
                  </div>
                ))}
              </div>
            ) : null}
            <p className="job__main-desc">{company.what_text}</p>
          </div>
        ) : null }
        { company.why_photos.length || company.why_text ? (
          <div className="job__main-data">
            <div className="job__main-heading">
              <span className="job__main-heading-en">WHY</span>
              <h3 className="job__main-heading-title">なぜやるのか</h3>
            </div>
            { company.why_photos.length ? (
              <div className="job__main-images">
                { company.why_photos.map((image, idx) => (
                  <div className="job__main-images-holder" key={idx}>
                    <div className="job__main-images-holder-img" style={{ backgroundImage: `url("${image}")` }}></div>
                  </div>
                ))}
              </div>
            ) : null}
            <p className="job__main-desc">{company.why_text}</p>
          </div>
        ) : null }
        { company.how_photos.length || company.how_text ? (
          <div className="job__main-data">
            <div className="job__main-heading">
              <span className="job__main-heading-en">HOW</span>
              <h3 className="job__main-heading-title">どうやっているか</h3>
            </div>
            { company.how_photos.length ? (
              <div className="job__main-images">
                { company.how_photos.map((image, idx) => (
                  <div className="job__main-images-holder" key={idx}>
                    <div className="job__main-images-holder-img" style={{ backgroundImage: `url("${image}")` }}></div>
                  </div>
                ))}
              </div>
            ) : null}
            <p className="job__main-desc">{company.how_text}</p>
          </div>
        ) : null }
        <div className="job__main-data">
          <div className="job__main-heading job__main-heading--left">
            <h3 className="job__main-heading-title">こんなことをやります</h3>
          </div>
          <p className="job__main-desc">{`ベテラン/若手/転籍/復職など、様々なメンバーを纏めるリーダー候補を募集中！
            組込・制御系設計開発のリーダーとして若手を含むメンバーの取り纏

            め、進捗/工数管理等をしていただきます。
            （主なプロジェクト例）`}</p>
          <ul className="job__main-list">
            <li className="job__main-list-item">情報機器関連の組込開発</li>
            <li className="job__main-list-item">自動車ECU/カーナビゲーションの組込開発</li>
            <li className="job__main-list-item">産業用工作機械のソフトウェア開発</li>
          </ul>
        </div>
        <div className="job__main-data">
          <div className="job__main-heading job__main-heading--left">
            <h3 className="job__main-heading-title">募集内容</h3>
          </div>
          <dl className="job__main-list job__main-list--table">
            <dt className="job__main-list-term">ポジション</dt>
            <dd className="job__main-list-data">{job.position}</dd>
            <dt className="job__main-list-term">開発環境</dt>
            <dd className="job__main-list-data">
              <dl>
                <dt>言語</dt>
                <dd>{job.programming_language}</dd>
                <dt>フレームワーク</dt>
                <dd>{job.framework}</dd>
                <dt>データベース</dt>
                <dd>{job.database}</dd>
                <dt>管理</dt>
                <dd>{job.environment}</dd>
              </dl>
            </dd>
            <dt className="job__main-list-term">応募要件</dt>
            <dd className="job__main-list-data">{job.requirements}</dd>
            <dt className="job__main-list-term">募集人数</dt>
            <dd className="job__main-list-data job__main-list-data--half">{job.number_of_applicants}</dd>
            <dt className="job__main-list-term">想定年収</dt>
            <dd className="job__main-list-data job__main-list-data--half">{job.salary}</dd>
            <dt className="job__main-list-term">勤務時間</dt>
            <dd className="job__main-list-data job__main-list-data--half">{job.work_time}</dd>
            <dt className="job__main-list-term">休日、休暇</dt>
            <dd className="job__main-list-data job__main-list-data--half">{job.holidays}</dd>
            <dt className="job__main-list-term">諸手当</dt>
            <dd className="job__main-list-data job__main-list-data--half">{job.allowance}</dd>
            <dt className="job__main-list-term">インセンティブ</dt>
            <dd className="job__main-list-data job__main-list-data--half">{job.incentive}</dd>
            <dt className="job__main-list-term">昇給・昇格</dt>
            <dd className="job__main-list-data job__main-list-data--half">{job.salary_increase}</dd>
            <dt className="job__main-list-term">保険</dt>
            <dd className="job__main-list-data job__main-list-data--half">{job.insurance}</dd>
            <dt className="job__main-list-term">試用期間</dt>
            <dd className="job__main-list-data job__main-list-data--half">{job.contract_period}</dd>
            <dt className="job__main-list-term">選考フロー</dt>
            <dd className="job__main-list-data job__main-list-data--half">{job.screening_flow}</dd>
          </dl>
        </div>
        <div className="job__main-data">
          <div className="job__main-heading job__main-heading--left">
            <h3 className="job__main-heading-title">勤務地</h3>
          </div>
          <div className="job__main-address">
            <div className="job__main-address-holder">
              <Embed src="https://maps.google.com/maps?q=東京都港区六本木5-2-3 マガジンハウス六本木ビル7F選考フロー&t=&z=5&ie=UTF8&output=embed"
                className={`embed--4by3 ${css`height: 235px;`}`}
                allowFullScreen />
            </div>
            <dl className="job__main-address-list">
              { job.address1 || job.address2 || job.address3 || job.prefecture ? (
                <>
                  <dt>住所</dt>
                  <dd>{job.address1} {job.address2} {job.address3} {job.prefecture}</dd>
                </>
              ) : null }
              { job.station ? (
                <>
                  <dt>最寄駅</dt>
                  <dd>{job.station}</dd>
                </>
              ) : null }
            </dl>

          </div>
        </div>
      </div>
      <aside className="job__sidebar">
        <div className="job__sidebar-inner">
          <h3 className="job__sidebar-header">企業情報</h3>
          <div className="job__sidebar-content">
            <ul className="job__sidebar-content-company">
            <li className="job__sidebar-content-company-items">
              <div className="job__sidebar-content-avatar">
                <img src={company.avatar || avatarPlaceholder}  alt=""/>
                <h4 className="job__sidebar-content-avatar-name">{company.company_name}</h4>
              </div>
            </li>
            { company.address1 || company.address2 || company.address3 || company.prefecture || company.homepage ? (
              <li className="job__sidebar-content-company-items">
                { company.address1 || company.address2 || company.address3 || company.prefecture ? (
                  <div className="job__sidebar-content-misc">
                    <i className="icon icon-marker text-dark-yellow"></i>
                    <p className="job__sidebar-content-misc-copy">{company.address1} {company.address2} {company.address3} {company.prefecture}</p>
                  </div>
                ) : null}
                { company.homepage ? (
                  <div className="job__sidebar-content-misc">
                    <i className="icon icon-globe text-dark-yellow"></i>
                    <p className="job__sidebar-content-misc-copy">{company.homepage}</p>
                  </div>
                ) : null}
              </li>
            ) : null}
            <li className="job__sidebar-content-company-items">
              <div className="job__sidebar-content-misc">
                <i className="icon icon-building text-dark-yellow"></i>
                <p className="job__sidebar-content-misc-copy">{`${moment(company.created_at).format('YYYY/MM')} に設立
                  ${company.ceo}`}</p>
              </div>
            </li>
            <li className="job__sidebar-content-company-items">
              <div className="job__sidebar-content-company-map">
                <Embed src="https://maps.google.com/maps?q=chicago&t=&z=13&ie=UTF8&iwloc=&output=embed"
                  className={`embed--4by3 ${css`height: 400px;`}`}
                  allowFullScreen />
              </div>
            </li>
            </ul>
          </div>
        </div>

      </aside>
    </div>
  );
}

export default Job;
