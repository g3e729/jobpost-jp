import React from 'react';
import { Link } from 'react-router-dom';
import Select from 'react-select';

import Avatar from '../common/Avatar';
import Button from '../common/Button';
import Fraction from '../common/Fraction';
import Pagination from '../common/Pagination';
import Pill from '../common/Pill';
import Search from '../common/Search';
import { routes } from '../../constants/routes';
import { dashboardSelectStyles } from '../../constants/config';
import generateRoute from '../../utils/generateRoute';

const filterList = [
  { value: 'chocolate',   label: 'Chocolate' },
  { value: 'strawberry',  label: 'Strawberry' },
  { value: 'vanilla',     label: 'Vanilla' }
];

const ScoutList = _ => (
  <div className="scout-list__container">
    <h3 className="scout-list__title">候補者一覧</h3>
    <div className="scout-list__search">
      <Search placeholder="検索候補" />
    </div>
    <div className="scout-list__filter">
      <ul className="scout-list__filters">
        <li className="scout-list__filters-item">
          <Select options={filterList}
            styles={dashboardSelectStyles}
            placeholder="コース"
            width='97px'
          />
        </li>
        <li className="scout-list__filters-item">
          <Select options={filterList}
            styles={dashboardSelectStyles}
            placeholder="年齢"
            width='82px'
          />
        </li>
        <li className="scout-list__filters-item">
          <Select options={filterList}
            styles={dashboardSelectStyles}
            placeholder="場所"
            width='82px'
          />
        </li>
        <li className="scout-list__filters-item">
          <Select options={filterList}
            styles={dashboardSelectStyles}
            placeholder="留学費用"
            width='112px'
          />
        </li>
        <li className="scout-list__filters-item">
          <Button className="button--link">
            <Pill className="pill--icon text-medium-black">
              <i className="icon icon-star"></i>気になる生徒
            </Pill>
          </Button>
        </li>
      </ul>
      <Fraction numerator="05"
        denominator="45"
      />
    </div>
    <ul className="scout-list">
      { [...Array(5)].map((_, idx) => (
        <li className="scout-list__item" key={idx}>
          <div className="scout-list__item-top">
            <div className="scout-list__item-top-left">
              <div className="scout-list__item-top-avatar">
                <Avatar className="avatar--seeker"
                  style={{ backgroundImage: 'url("https://lorempixel.com/640/640/business/")' }}
                />
              </div>
            </div>
            <div className="scout-list__item-top-right">
              <div className="scout-list__item-top-header">
                <h4 className="scout-list__item-top-name">女性</h4>
                <Pill className="pill--icon">
                  <i className="icon icon-star"></i>1.2k
                </Pill>
              </div>
              <ul className="scout-list__item-top-pills">
                <li className="scout-list__item-top-pills-item">
                  <Pill className="pill--clear">20代</Pill>
                </li>
                <li className="scout-list__item-top-pills-item">
                  <Pill className="pill--clear">PHPコース</Pill>
                </li>
                <li className="scout-list__item-top-pills-item">
                  <Pill className="pill--clear">留学費 50万円</Pill>
                </li>
              </ul>
            </div>
          </div>
          <div className="scout-list__item-content">
            <ul className="scout-list__item-content-list">
              <li className="scout-list__item-content-list-item">
                <h5>自己紹介</h5>
                <p>{`▶︎フォトグラファー
                  ・株式会社BNGパートナーズ
                  ・STB139

                  営業・広報・人事と色々やってきたら、マネージャーの下で色々やる人になりま
                  した。現在Web制作会社のアカウントプランナーチームにて営業補佐/マーケテ
                  ィング/採用を行なっています。

                  またフリーでスポーツ中心のカメラマンも行なっており、バスケを中心にスポー
                  ツ写真、キッズスポーツ大会・合宿などの撮影も行なっています。ポートフォリ
                  オサイト【https://snaxano.wixsite.com/photo】`}</p>
              </li>
              <li className="scout-list__item-content-list-item">
                <h5>この先やってみたいこと</h5>
                <p>好きなことをやり続けたい</p>
              </li>
              <li className="scout-list__item-content-list-item">
                <h5>学歴</h5>
                <p>{`日本工学院専門学校
                  ミュージックアーティスト科`}</p>
              </li>
              <li className="scout-list__item-content-list-item">
                <h5>TOEIC</h5>
                <p>６５０点</p>
              </li>
              <li className="scout-list__item-content-list-item">
                <h5>スキル</h5>
                <div>
                  <dl>
                    <dt>C#</dt>
                    <dd>[趣味or実務１年未満]</dd>
                    <dt>PHP</dt>
                    <dd>[趣味or実務１年未満]</dd>
                    <dt>Ruby</dt>
                    <dd>[趣味or実務１年未満]</dd>
                    <dt>Python2</dt>
                    <dd>[趣味or実務１年未満]</dd>
                    <dt>Python3</dt>
                    <dd>[趣味or実務１年未満]</dd>
                    <dt>Javascript</dt>
                    <dd>[趣味or実務１年未満]</dd>
                    <dt>HTML5+CSS3</dt>
                    <dd>[趣味or実務１年未満]</dd>
                    <dt>Sass</dt>
                    <dd>[趣味or実務１年未満]</dd>
                    <dt>SQL</dt>
                    <dd>[趣味or実務１年未満]</dd>
                    <dt>BASH</dt>
                    <dd>[趣味or実務１年未満]</dd>
                  </dl>
                </div>
              </li>
            </ul>
          </div>
          <div className="scout-list__item-bottom">
            <Link to={generateRoute(routes.STUDENT_DETAIL, { id: 1 })}
              className="button button--more scout-list__item-button">
              もっと見る
            </Link>
          </div>
        </li>
      )) }
    </ul>
    <div className="scout-list__pagination">
      <Pagination />
    </div>
  </div>
);

export default ScoutList;
