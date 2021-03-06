import React, { useEffect, useState } from 'react';
import moment from 'moment';
import { connect } from 'react-redux';

import Mapped from '../common/Mapped';

import avatarPlaceholder from '../../../img/avatar-default.png';

const Job = (props) => {
  const { job, filters } = props;
  const data = (filters.filtersData && filters.filtersData.jobs);
  const [positions, setPositions] = useState([]);
  const [programming, setProgramming] = useState([]);
  const [frameworks, setFrameworks] = useState([]);
  const [databases, setDatabases] = useState([]);
  const company = job.company;

  useEffect(_ => {
    if (data) {
      setPositions(data.positions);
      setProgramming(data.programming_languages);
      setFrameworks(data.frameworks);
      setDatabases(data.databases);
    }
  }, [data])

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
            <h3 className="job__main-heading-title">こんなことやります</h3>
          </div>
          <div className="job__main-description" dangerouslySetInnerHTML={{ __html: job.description }} />
        </div>
        <div className="job__main-data">
          <div className="job__main-heading job__main-heading--left">
            <h3 className="job__main-heading-title">募集内容</h3>
          </div>
          <dl className="job__main-list job__main-list--table">
            <dt className="job__main-list-term">ポジション</dt>
            <dd className="job__main-list-data">{positions[job.position]}</dd>
            <dt className="job__main-list-term">ステータス</dt>
            <dd className="job__main-list-data">{job.display_employment_type}</dd>
            <dt className="job__main-list-term">開発環境</dt>
            <dd className="job__main-list-data">
              <dl>
                <dt>言語</dt>
                <dd>{programming[job.programming_language]}</dd>
                <dt>フレームワーク</dt>
                <dd>{frameworks[job.framework]}</dd>
                <dt>データベース</dt>
                <dd>{databases[job.database]}</dd>
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
            <Mapped
              address={`${job.address1} ${job.address2}`}
              zoom={10}
              height="235px"
            />
            <dl className="job__main-address-list">
              { job.address1 || job.address2 || job.display_prefecture ? (
                <>
                  <dt>住所</dt>
                  <dd>{job.display_prefecture} {job.address1} {job.address2}</dd>
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
            { company.address1 || company.address2 || company.display_prefecture || company.homepage ? (
              <li className="job__sidebar-content-company-items">
                { company.address1 || company.address2 || company.display_prefecture ? (
                  <div className="job__sidebar-content-misc">
                    <i className="icon icon-marker text-dark-yellow"></i>
                    <p className="job__sidebar-content-misc-copy">{company.display_prefecture} {company.address1} {company.address2}</p>
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
              <Mapped
                address={`${company.address1} ${company.address2}`}
                zoom={10}
                height="400px"
              />
            </li>
            </ul>
          </div>
        </div>

      </aside>
    </div>
  );
}

const mapStateToProps = (state) => ({
  filters: state.filters
});

export default connect(mapStateToProps)(Job);
