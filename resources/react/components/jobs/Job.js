import React from 'react';
import { css } from 'emotion';

import Embed from '../common/Embed';

const Job = (props) => {
  const { job } = props;

  return (
    <div className="job">
      <div className="job__main">
        <div className="job__main-data">
          <div className="job__main-heading">
            <span className="job__main-heading-en">WHAT</span>
            <h3 className="job__main-heading-title">何をやっているのか？</h3>
          </div>
          <div className="job__main-images">
            <div className="job__main-images-holder">
              <div className="job__main-images-holder-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
            </div>
            <div className="job__main-images-holder">
              <div className="job__main-images-holder-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
            </div>
          </div>
          <p className="job__main-desc">恥の多い生涯を送って来ました。自分には、人間の生活というものが、見当つかないのです。自分は東北の田舎に生れましたので、汽車をはじめて見たのは、よほど大きくなってからでした。自分は停車場のブリッジを、上って、降りて、そうしてそれが線路をまたぎ越えるために造られたものだという事には全然気づかず、ただそれは停車場の構内を外国の遊戯場みたいに、複雑に楽しく、ハイカラにするためにのみ、設備せられてあるものだ</p>
        </div>
        <div className="job__main-data">
          <div className="job__main-heading">
            <span className="job__main-heading-en">WHY</span>
            <h3 className="job__main-heading-title">なぜやるのか</h3>
          </div>
          <div className="job__main-images">
            <div className="job__main-images-holder job__main-images-holder--full">
              <div className="job__main-images-holder-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
            </div>
          </div>
          <p className="job__main-desc">恥の多い生涯を送って来ました。自分には、人間の生活というものが、見当つかないのです。自分は東北の田舎に生れましたので、汽車をはじめて見たのは、よほど大きくなってからでした。自分は停車場のブリッジを、上って、降りて、そうしてそれが線路をまたぎ越えるために造られたものだという事には全然気づかず、ただそれは停車場の構内を外国の遊戯場みたいに、複雑に楽しく、ハイカラにするためにのみ、設備せられてあるものだ</p>
        </div>
        <div className="job__main-data">
          <div className="job__main-heading">
            <span className="job__main-heading-en">HOW</span>
            <h3 className="job__main-heading-title">どうやっているか</h3>
          </div>
          <div className="job__main-images">
            <div className="job__main-images-holder">
              <div className="job__main-images-holder-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
            </div>
            <div className="job__main-images-holder">
              <div className="job__main-images-holder-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
            </div>
          </div>
          <p className="job__main-desc">恥の多い生涯を送って来ました。自分には、人間の生活というものが、見当つかないのです。自分は東北の田舎に生れましたので、汽車をはじめて見たのは、よほど大きくなってからでした。自分は停車場のブリッジを、上って、降りて、そうしてそれが線路をまたぎ越えるために造られたものだという事には全然気づかず、ただそれは停車場の構内を外国の遊戯場みたいに、複雑に楽しく、ハイカラにするためにのみ、設備せられてあるものだ</p>
        </div>
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
                <dd>Github, Google Drive</dd>
              </dl>
            </dd>
            <dt className="job__main-list-term">応募要件</dt>
            <dd className="job__main-list-data">{`何らかのシステム開発経験　実務３年以上
              周囲とのコミュニケーションを図りながら業務対応可能な方
              決まった作業をキチンとこなすことが出来る方`}</dd>
            <dt className="job__main-list-term">募集人数</dt>
            <dd className="job__main-list-data job__main-list-data--half">{`WEBエンジニア
              【リーダー候補】`}</dd>
            <dt className="job__main-list-term">想定年収</dt>
            <dd className="job__main-list-data job__main-list-data--half">{`500万 〜 600万円`}</dd>
            <dt className="job__main-list-term">勤務時間</dt>
            <dd className="job__main-list-data job__main-list-data--half">{`10:00〜19:00
              （コアタイム
              11:00~16:00）
              `}</dd>
            <dt className="job__main-list-term">想定年収</dt>
            <dd className="job__main-list-data job__main-list-data--half">{`・完全週休2日制（土日）
              ・祝日
              ・年末年始休暇
              ・有給休暇
              ・慶弔休暇
              ・GW休暇
              ・夏期休暇`}</dd>
            <dt className="job__main-list-term">諸手当</dt>
            <dd className="job__main-list-data job__main-list-data--half">{`交通費支給
              （上限2万円）`}</dd>
            <dt className="job__main-list-term">インセンティブ</dt>
            <dd className="job__main-list-data job__main-list-data--half">{`なし`}</dd>
            <dt className="job__main-list-term">昇給・昇格</dt>
            <dd className="job__main-list-data job__main-list-data--half">{`昇格査定あり：
              年2回（12月、6月）`}</dd>
            <dt className="job__main-list-term">保険</dt>
            <dd className="job__main-list-data job__main-list-data--half">{`健康保険
              厚生年金加入
              雇用保険
              労災保険適用`}</dd>
            <dt className="job__main-list-term">試用期間</dt>
            <dd className="job__main-list-data job__main-list-data--half">{`6ヶ月`}</dd>
            <dt className="job__main-list-term">選考フロー</dt>
            <dd className="job__main-list-data job__main-list-data--half">{`カジュアル面談：
              人事、エンジニアチ
              ームリーダー
              ▼
              2次：社長
              ▼
              内定

              ※選考フロー、
              面接回数は状況に
              応じて変更になる
              可能性があります`}</dd>
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
              <dt>住所</dt>
              <dd>東京都港区六本木5-2-3 マガジンハウス六本木ビル7F選考フロー</dd>
              <dt>最寄駅</dt>
              <dd>{`東京メトロ日比谷線「六本木駅」3番出口より徒歩3分
                ・都営地下鉄大江戸線「六本木駅」5番出口より徒歩3分`}</dd>
            </dl>

          </div>
          <p className="job__main-desc">外苑東通り沿いを東京タワーの方面に進み、タリーズさん、セブンイレブンさんを右手に通過し、1階に三菱東京UFJ銀行のATMが入ったビルの7Fです。</p>
        </div>
      </div>
      <aside className="job__sidebar">
        <div className="job__sidebar-inner">
          <h3 className="job__sidebar-header">企業情報</h3>
          <div className="job__sidebar-content">
            <ul className="job__sidebar-content-company">
            <li className="job__sidebar-content-company-items">
              <div className="job__sidebar-content-avatar">
                <img src="https://lorempixel.com/240/240/city/" alt=""/>
                <h4 className="job__sidebar-content-avatar-name">株式会社アクターリアリティ</h4>
              </div>
            </li>
            <li className="job__sidebar-content-company-items">
              <div className="job__sidebar-content-misc">
                <i className="icon icon-marker text-dark-yellow"></i>
                <p className="job__sidebar-content-misc-copy">{`東京都港区芝2-13-4 住友不動産芝ビル4号館 9F`}</p>
              </div>
              <div className="job__sidebar-content-misc">
                <i className="icon icon-globe text-dark-yellow"></i>
                <p className="job__sidebar-content-misc-copy">{`https://hogehoge.com`}</p>
              </div>
            </li>
            <li className="job__sidebar-content-company-items">
              <div className="job__sidebar-content-misc">
                <i className="icon icon-building text-dark-yellow"></i>
                <p className="job__sidebar-content-misc-copy">{`2008/1 に設立
                  飯田 悠司 が創業
                `}</p>
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
