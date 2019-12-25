import React from 'react';
import { css } from 'emotion';

import Embed from '../common/Embed';

const Job = _ => {
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
          ...
        </div>
        <div className="job__main-data">
          <div className="job__main-heading job__main-heading--left">
            <h3 className="job__main-heading-title">勤務地</h3>
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
