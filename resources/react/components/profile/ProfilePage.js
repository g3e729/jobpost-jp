import React from 'react';
import { css } from 'emotion';

import Page from '../common/Page';
import Heading from '../common/Heading';
import Clipboard from '../common/Clipboard';
import Embed from '../common/Embed';
import Button from '../common/Button';
import ProfileContent from './ProfileContent';
import JobsList from '../jobs/JobsList';

const ProfilePage = () => {
  const userType = Math.random() >= 0.5 ? 'student' : 'company';

  return (
    <Page>
      { userType === 'student' ? (
          <Heading type="user"
            style={{ backgroundImage: 'url("https://lorempixel.com/1800/600/people/")' }}
            data-avatar="https://lorempixel.com/1800/600/people/"
            title="田中義人"
            subTitle={<span><i className="icon icon-book text-dark-yellow"></i>PHPコース</span>}
          />
        ) : (
          <Heading type="user"
            style={{ backgroundImage: 'url("https://lorempixel.com/1800/600/people/")' }}
            data-avatar="https://lorempixel.com/1800/600/people/"
            title="株式会社アクターリアリティ"
            subTitle={<span><span className="heading-content__position-location">東京</span>https://hogehoge.com</span>}
          />
        )
      }
      <section className="l-section l-section--profile section">
        <div className="l-container l-container--main">
          { userType === 'student' ? (
            <ProfileContent>
              <div className="profile">
                <div className="profile-data">
                  <div className="profile-data__heading">
                    <h3 className="profile-data__heading-title">PROFILE</h3>
                    <p className="profile-data__heading-jp">プロフィール</p>
                  </div>
                  <ul className="profile-data__section">
                    <li className="profile-data__section-item">
                      <div className="profile-data__section-box">
                        <h3 className="profile-data__section-heading">自己紹介</h3>
                        <p className="profile-data__section-copy">{`フォトグラファー
                        ・株式会社BNGパートナーズ
                        ・STB139

                          営業・広報・人事と色々やってきたら、マネージャーの下で色々やる人になりました。現在Web制作会社のアカウントプランナーチームにて営業補佐/マーケティング/採用を行なっています。

                          またフリーでスポーツ中心のカメラマンも行なっており、バスケを中心にスポーツ写真、キッズスポーツ大会・合宿などの撮影も行なっています。ポートフォリオサイト【https://snaxano.wixsite.com/photo】
                        `}</p>
                      </div>
                    </li>
                    <li className="profile-data__section-item">
                      <div className="profile-data__section-box">
                        <h3 className="profile-data__section-heading">やってみたいこと</h3>
                        <p className="profile-data__section-copy">好きなことをやり続けたい</p>
                      </div>
                    </li>
                    <li className="profile-data__section-item">
                      <div className="profile-data__section-box">
                        <h3 className="profile-data__section-heading">職歴</h3>
                        <dl className="profile-data__work">
                          <dt className="profile-data__work-term">社長室　広報</dt>
                          <dd className="profile-data__work-data">
                            <h4>株式会社ＢＮＧパートナーズ （馬鹿が日本を元気にする）</h4>
                            <time>2015-10</time>
                            <p>{`自社の良いところを知ってもらいたい。という思いから社長室で広報と人材開発室で採用/広報に携わっています。そのためにイベント企画/運営やメディア発信、自社ブログの運用を行い、知名度のUPだけでなく認知度の向上に努めています。
                              ほかにも自社内のメンバーにより深く自社を知ってもらうために社内広報誌の発刊、メンバー誌のリニューアル等を行い、自社の理解度を深めました。`}</p>
                          </dd>
                          <dt className="profile-data__work-term">スタッフ</dt>
                          <dd className="profile-data__work-data">
                            <h4>STB 139 スイートベイジル</h4>
                            <time>2014-05</time>
                            <p>{`主に日本のミュージシャンの演奏を鑑賞しながら飲食も楽しめるライブレストラン。好きなミュージシャンや音楽を生で感じ、お客さんにも楽しんでもらえるようにしていました。2014.5.25閉館とともに退職しました。`}</p>
                          </dd>
                        </dl>
                      </div>
                    </li>
                    <li className="profile-data__section-item">
                      <div className="profile-data__section-box">
                        <h3 className="profile-data__section-heading">学歴</h3>
                        <dl className="profile-data__work">
                          <dt className="profile-data__work-term">日本工学院専門学校</dt>
                          <dd className="profile-data__work-data">
                            <h4>ミュージックアーティスト科</h4>
                            <time>2013 - 2016</time>
                            <p>{`作曲・編曲を専攻していました。得意分野はバンド編成での歌物。2年次には合唱曲プロジェクトを始動。またゴスペルにも参加。専攻外ながらもバンド活動に参加し赤坂BRITZや川崎チッタ等のライブハウスでの演奏も行ないました。
                              担当はキーボードとちょっと歌。`}</p>
                          </dd>
                        </dl>
                      </div>
                    </li>
                    <li className="profile-data__section-item">
                      <div className="profile-data__section-box">
                        <h3 className="profile-data__section-heading">ムービー</h3>
                        <div className="profile-data__video">
                          <Embed src="https://www.youtube.com/embed/zpOULjyy-n8"
                            className={`embed--16by9 ${css`margin-bottom: 22px`}`}
                            allowFullScreen />
                          <div className="profile-data__link">
                            <a href="https://github.com/MyznEiji" className="button button--profile" target="_blank">https://github.com/MyznEiji</a>
                            <Clipboard value="https://github.com/MyznEiji" />
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div className="profile-data">
                  <div className="profile-data__heading">
                    <h3 className="profile-data__heading-title">COMPUTER SKILLS</h3>
                    <p className="profile-data__heading-jp">コンピュータースキル</p>
                  </div>
                  <ul className="profile-data__section profile-data__section--half">
                    <li className="profile-data__section-item">
                      <div className="profile-data__section-box">
                        <h3 className="profile-data__section-heading">プログラミング言語</h3>
                        <dl className="profile-data__skills">
                          <dt className="profile-data__skills-term">C＃</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">PHP</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Ruby</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Python 2</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Python 3</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Javascript</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">HTML +CSS3</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Sass</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">SQL</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Bash</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                        </dl>
                      </div>
                    </li>
                    <li className="profile-data__section-item">
                      <div className="profile-data__section-box">
                        <h3 className="profile-data__section-heading">フレームワーク</h3>
                        <dl className="profile-data__skills">
                          <dt className="profile-data__skills-term">Laravel</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Ruby on Rails</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Django</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Flask</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Unity</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Vue.js</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Bootstrap</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Tensorflow</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                        </dl>
                      </div>
                    </li>
                    <li className="profile-data__section-item">
                      <div className="profile-data__section-box">
                        <h3 className="profile-data__section-heading">その他</h3>
                        <dl className="profile-data__skills">
                          <dt className="profile-data__skills-term">Linux</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Mac OS X</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Cent OS</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Debian</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Apache</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">nginx</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Unicorn</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Amazon Web Service</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">WordPress</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Vim</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                        </dl>
                      </div>
                    </li>
                    <li className="profile-data__section-item">
                      <div className="profile-data__section-box">
                        <h3 className="profile-data__section-heading">経験分野</h3>
                        <dl className="profile-data__skills profile-data__skills--full">
                          <dt className="profile-data__skills-term">Web開発（サーバサイドエンジニア） 　</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">Web開発（フロントエンドエンジニア）</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">研究開発（画像処理,自然言語処理,機械学習,AIなど）</dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                          <dt className="profile-data__skills-term">コンシューマーゲーム開発 </dt>
                          <dd className="profile-data__skills-data">1年以内</dd>
                        </dl>
                      </div>
                    </li>
                  </ul>
                </div>
                <div className="profile-data">
                  <div className="profile-data__heading">
                    <h3 className="profile-data__heading-title">LANGUAGE</h3>
                    <p className="profile-data__heading-jp">語学</p>
                  </div>
                  <ul className="profile-data__section profile-data__section--half">
                    <li className="profile-data__section-item">
                      <div className="profile-data__section-box">
                        <h3 className="profile-data__section-heading">話し言葉</h3>
                        <span className="profile-data__section-desc">英語、中国語</span>
                      </div>
                    </li>
                    <li className="profile-data__section-item">
                      <div className="profile-data__section-box">
                        <h3 className="profile-data__section-heading">TOEIC</h3>
                        <span className="profile-data__section-desc">６５０点</span>
                      </div>
                    </li>
                  </ul>
                </div>
                <div className="profile-data">
                  <div className="profile-data__heading">
                    <h3 className="profile-data__heading-title">WEBSITE</h3>
                    <p className="profile-data__heading-jp">ウェブサイト</p>
                  </div>
                  <ul className="profile-data__section">
                    <li className="profile-data__section-item">
                      <div className="profile-data__section-box">
                        <h3 className="profile-data__section-heading">ポートフォリオ</h3>
                        <ul className="profile-data__websites">
                          <li className="profile-data__websites-item">
                            <div className="profile-data__websites-eyecatch">
                              <div className="profile-data__websites-eyecatch-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
                            </div>
                            <div className="profile-data__websites-content">
                              <h4 className="profile-data__websites-name">Myzn.io</h4>
                              <p className="profile-data__websites-desc">自分の情報まとめて掲載しているページ</p>
                              <div className="profile-data__link">
                                <a href="https://github.com/MyznEiji" className="button button--profile" target="_blank">https://github.com/MyznEiji</a>
                                <Clipboard value="https://github.com/MyznEiji" />
                              </div>
                            </div>
                          </li>
                          <li className="profile-data__websites-item">
                            <div className="profile-data__websites-eyecatch">
                              <div className="profile-data__websites-eyecatch-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
                            </div>
                            <div className="profile-data__websites-content">
                              <h4 className="profile-data__websites-name">Myzn.io</h4>
                              <p className="profile-data__websites-desc">自分の情報まとめて掲載しているページ</p>
                              <div className="profile-data__link">
                                <a href="https://github.com/MyznEiji" className="button button--profile" target="_blank">https://github.com/MyznEiji</a>
                                <Clipboard value="https://github.com/MyznEiji" />
                              </div>
                            </div>
                          </li>
                          <li className="profile-data__websites-item">
                            <div className="profile-data__websites-eyecatch">
                              <div className="profile-data__websites-eyecatch-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
                            </div>
                            <div className="profile-data__websites-content">
                              <h4 className="profile-data__websites-name">Myzn.io</h4>
                              <p className="profile-data__websites-desc">自分の情報まとめて掲載しているページ</p>
                              <div className="profile-data__link">
                                <a href="https://github.com/MyznEiji" className="button button--profile" target="_blank">https://github.com/MyznEiji</a>
                                <Clipboard value="https://github.com/MyznEiji" />
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li className="profile-data__section-item">
                      <div className="profile-data__section-box">
                        <h3 className="profile-data__section-heading">Github</h3>
                        <div className="profile-data__link">
                          <a href="https://github.com/MyznEiji" className="button button--profile" target="_blank">https://github.com/MyznEiji</a>
                          <Clipboard value="https://github.com/MyznEiji" />
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <aside className="sidebar">
                <div className="sidebar__inner">
                  <h3 className="sidebar__header">基本情報</h3>
                  <div className="sidebar-content">
                    <dl className="sidebar-content__basic">
                      <dt className="sidebar-content__basic-term">生年月日</dt>
                      <dd className="sidebar-content__basic-data">1995.08.14</dd>
                      <dt className="sidebar-content__basic-term">性別</dt>
                      <dd className="sidebar-content__basic-data">男</dd>
                      <dt className="sidebar-content__basic-term">住所</dt>
                      <dd className="sidebar-content__basic-data">東京</dd>
                      <dt className="sidebar-content__basic-term">ステータス</dt>
                      <dd className="sidebar-content__basic-data">在学中</dd>
                    </dl>
                  </div>
                </div>
                <div className="sidebar__inner">
                  <h3 className="sidebar__header">レッスン</h3>
                  <div className="sidebar-content">
                    <ul className="sidebar-content__scores">
                      <li className="sidebar-content__scores-item">
                        <h4 className="sidebar-content__scores-category">IT</h4>
                        <dl>
                          <dt>受講済み</dt>
                          <dd>Basic</dd>
                          <dd>Develop 1</dd>
                          <dt>受講中</dt>
                          <dd>Develop 2</dd>
                        </dl>
                      </li>
                      <li className="sidebar-content__scores-item">
                        <h4 className="sidebar-content__scores-category">ENGLISH</h4>
                        <dl>
                          <dt>TOEIC</dt>
                          <dd>
                            Reading<span>80点(CEFR - B1)</span>
                          </dd>
                          <dd>
                            Listening<span>70点(CEFR- B2)</span>
                          </dd>
                          <dd>
                            Total<span>65点(CEFR- B1)</span>
                          </dd>
                          <dd>
                            Speaking<span>65点(CEFR- A2)</span>
                          </dd>
                          <dd>
                            Writing<span>40点(CEFR - A2)</span>
                          </dd>
                          <dd>
                            レベル<span>CEFR - B1</span>
                          </dd>
                        </dl>
                      </li>
                    </ul>
                  </div>
                </div>
              </aside>
            </ProfileContent>
          ) : (
            <ProfileContent>
              <div className="profile">
                <div className="profile-data">
                  <ul className="profile-data__section">
                    <li className="profile-data__section-item">
                      <div className="profile-data__section-box">
                        <h3 className="profile-data__section-heading">我々のミッションは</h3>
                        <p className="profile-data__section-copy">{`『古く非効率となってしまっている旧態依然とした酒類業界の仕組みを、テクノロジーによって現代社会に最適化すること』です。
                          酒販業×WEBをベースに様々な事業展開を考えております。
                        `}</p>
                      </div>
                    </li>
                    <li className="profile-data__section-item">
                      <div className="profile-data__section-box">
                        <h3 className="profile-data__section-heading">特徴</h3>
                        <dl className="profile-data__character">
                          <dt className="profile-data__character-term">フラットな組織</dt>
                          <dd className="profile-data__character-data">{`チームラボには部長も課長もいない、多次元的な体制です。
                            なので「部長はああ言ってるけど本当はこっちにした方がいい」って、みんながわかっている状況は世の中にかなり存在していますが、そのようなストレスはありません。
                            プロジェクトチーム単位で動いていて、エンジニア、デザイナー、カタリストのメンバーで構成されています。
                            指示をする、管理職的な立場の人は存在せず、みんながモノをつくるメンバーです。
                          `}</dd>
                          <dt className="profile-data__character-term">メンバーの多様性</dt>
                          <dd className="profile-data__character-data">{`プログラマ、エンジニア、CGアニメーター、絵師、数学者、建築家、UI/UXデザイナー、グラフィックデザイナー、編集者など、デジタル社会の様々な分野のスペシャリストから構成されています。海外からのメンバーが増えていて、全体の15%を占めています。`}</dd>
                          <dt className="profile-data__character-term">こだわりのある オフィス</dt>
                          <dd className="profile-data__character-data">{`職能の垣根を越えて、会話して、一緒に考えることができるスペースとなるよう設計されています。 ミーティングスペースやワークスペースには壁がなく、話していると隣の席の声も自然と耳に入ってきますので、会議の参加者以外のたまたま通りがかったメンバーや、違う会議に出席しているメンバーが意見を言う事もあります。 メンバー同士がつながることで新たなアイデアが生まれ、問題解決のヒントとなることを重要視しています。`}</dd>
                        </dl>
                      </div>
                    </li>
                    <li className="profile-data__section-item">
                      <div className="profile-data__section-box">
                        <h3 className="profile-data__section-heading">ポートフォリオ</h3>
                        <ul className="profile-data__websites">
                          <li className="profile-data__websites-item">
                            <div className="profile-data__websites-eyecatch">
                              <div className="profile-data__websites-eyecatch-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
                            </div>
                            <div className="profile-data__websites-content">
                              <h4 className="profile-data__websites-name">Myzn.io</h4>
                              <p className="profile-data__websites-desc">自分の情報まとめて掲載しているページ</p>
                              <div className="profile-data__link">
                                <a href="https://github.com/MyznEiji" className="button button--profile" target="_blank">https://github.com/MyznEiji</a>
                                <Clipboard value="https://github.com/MyznEiji" />
                              </div>
                            </div>
                          </li>
                          <li className="profile-data__websites-item">
                            <div className="profile-data__websites-eyecatch">
                              <div className="profile-data__websites-eyecatch-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
                            </div>
                            <div className="profile-data__websites-content">
                              <h4 className="profile-data__websites-name">Myzn.io</h4>
                              <p className="profile-data__websites-desc">自分の情報まとめて掲載しているページ</p>
                              <div className="profile-data__link">
                                <a href="https://github.com/MyznEiji" className="button button--profile" target="_blank">https://github.com/MyznEiji</a>
                                <Clipboard value="https://github.com/MyznEiji" />
                              </div>
                            </div>
                          </li>
                          <li className="profile-data__websites-item">
                            <div className="profile-data__websites-eyecatch">
                              <div className="profile-data__websites-eyecatch-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
                            </div>
                            <div className="profile-data__websites-content">
                              <h4 className="profile-data__websites-name">Myzn.io</h4>
                              <p className="profile-data__websites-desc">自分の情報まとめて掲載しているページ</p>
                              <div className="profile-data__link">
                                <a href="https://github.com/MyznEiji" className="button button--profile" target="_blank">https://github.com/MyznEiji</a>
                                <Clipboard value="https://github.com/MyznEiji" />
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
                <div className="profile-data profile-data--jobs">
                  <div className="profile-data__jobs">
                    <div className="profile-data__jobs-content">
                      <JobsList hasTitle="true" />
                    </div>
                    <div className="profile-data__jobs-footer">
                      <Button value="もっとみる" />
                    </div>
                  </div>
                </div>
              </div>
              <aside className="sidebar sidebar--single">
                <div className="sidebar__inner">
                  <h3 className="sidebar__header">企業情報</h3>
                  <div className="sidebar-content">
                    <ul className="sidebar-content__company">
                      <li className="sidebar-content__company-items">
                        <div className="sidebar-content__avatar">
                          <img src="https://lorempixel.com/240/240/city/" alt=""/>
                          <h4 className="sidebar-content__avatar-name">株式会社アクターリアリティ</h4>
                        </div>
                      </li>
                      <li className="sidebar-content__company-items">
                        <div className="sidebar-content__misc">
                          <i className="icon icon-marker text-dark-yellow"></i>
                          <p className="sidebar-content__misc-copy">{`東京都港区芝2-13-4 住友不動産芝ビル4号館 9F`}</p>
                        </div>
                        <div className="sidebar-content__misc">
                          <i className="icon icon-globe text-dark-yellow"></i>
                          <p className="sidebar-content__misc-copy">{`https://hogehoge.com`}</p>
                        </div>
                      </li>
                      <li className="sidebar-content__company-items">
                        <div className="sidebar-content__misc">
                          <i className="icon icon-building text-dark-yellow"></i>
                          <p className="sidebar-content__misc-copy">{`2008/1 に設立
                            飯田 悠司 が創業
                          `}</p>
                        </div>
                      </li>
                      <li className="sidebar-content__company-items">
                        <ul className="sidebar-content__sns">
                          <li className="sidebar-content__sns-item">
                            <a href="#" target="_blank">
                              <i className="icon icon-twitter"></i>
                            </a>
                          </li>
                          <li className="sidebar-content__sns-item">
                            <a href="#" target="_blank">
                              <i className="icon icon-facebook"></i>
                            </a>
                          </li>
                          <li className="sidebar-content__sns-item">
                            <a href="#" target="_blank">
                              <i className="icon icon-instagram"></i>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li className="sidebar-content__company-items">
                        <div className="sidebar-content__company-map">
                          <Embed src="https://maps.google.com/maps?q=chicago&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            className={`embed--4by3 ${css`height: 400px;`}`}
                            allowFullScreen />
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </aside>
            </ProfileContent>
          )}
        </div>
      </section>
    </Page>
  );
}

export default ProfilePage;
