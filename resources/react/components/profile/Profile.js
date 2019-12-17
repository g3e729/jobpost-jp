import React from 'react';
import { css } from 'emotion';

import Clipboard from '../common/Clipboard';
import Embed from '../common/Embed';
import Button from '../common/Button';
import JobsList from '../jobs/JobsList';

const Profile = (props) => {
  const { user, accountType } = props;
  var data = user.userData;

  console.log(data);

  return (
    accountType === 'student' ? (
      <div className="profile">
        <div className="profile__main">
          <div className="profile__main-data">
            <div className="profile__main-heading">
              <h3 className="profile__main-heading-title">PROFILE</h3>
              <p className="profile__main-heading-jp">プロフィール</p>
            </div>
            <ul className="profile__main-list">
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">自己紹介</h3>
                  <p className="profile__main-list-item-copy">{data.profile.intro_text}</p>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">やってみたいこと</h3>
                  <p className="profile__main-list-item-copy">{data.profile.what_text}</p>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box profile__data">
                  <h3 className="profile__main-list-item-heading">職歴</h3>
                  <dl className="profile__data-work">
                    <dt className="profile__data-work-term">社長室　広報</dt>
                    <dd className="profile__data-work-data">
                      <h4>株式会社ＢＮＧパートナーズ （馬鹿が日本を元気にする）</h4>
                      <time>2015-10</time>
                      <p>{`自社の良いところを知ってもらいたい。という思いから社長室で広報と人材開発室で採用/広報に携わっています。そのためにイベント企画/運営やメディア発信、自社ブログの運用を行い、知名度のUPだけでなく認知度の向上に努めています。
                        ほかにも自社内のメンバーにより深く自社を知ってもらうために社内広報誌の発刊、メンバー誌のリニューアル等を行い、自社の理解度を深めました。`}</p>
                    </dd>
                    <dt className="profile__data-work-term">スタッフ</dt>
                    <dd className="profile__data-work-data">
                      <h4>STB 139 スイートベイジル</h4>
                      <time>2014-05</time>
                      <p>{`主に日本のミュージシャンの演奏を鑑賞しながら飲食も楽しめるライブレストラン。好きなミュージシャンや音楽を生で感じ、お客さんにも楽しんでもらえるようにしていました。2014.5.25閉館とともに退職しました。`}</p>
                    </dd>
                  </dl>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box profile__data">
                  <h3 className="profile__main-list-item-heading">学歴</h3>
                  <dl className="profile__data-work">
                    <dt className="profile__data-work-term">日本工学院専門学校</dt>
                    <dd className="profile__data-work-data">
                      <h4>ミュージックアーティスト科</h4>
                      <time>2013 - 2016</time>
                      <p>{`作曲・編曲を専攻していました。得意分野はバンド編成での歌物。2年次には合唱曲プロジェクトを始動。またゴスペルにも参加。専攻外ながらもバンド活動に参加し赤坂BRITZや川崎チッタ等のライブハウスでの演奏も行ないました。
                        担当はキーボードとちょっと歌。`}</p>
                    </dd>
                  </dl>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">ムービー</h3>
                  <div className="profile__data-video">
                    <Embed src="https://www.youtube.com/embed/zpOULjyy-n8"
                      className={`embed--16by9 ${css`margin-bottom: 22px`}`}
                      allowFullScreen />
                    <div className="profile__data-link">
                      <a href="https://github.com/MyznEiji" className="button button--profile" target="_blank">https://github.com/MyznEiji</a>
                      <Clipboard value="https://github.com/MyznEiji" />
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div className="profile__main-data">
            <div className="profile__main-heading">
              <h3 className="profile__main-heading-title">COMPUTER SKILLS</h3>
              <p className="profile__main-heading-jp">コンピュータースキル</p>
            </div>
            <ul className="profile__main-list profile__main-list--half">
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box profile__data">
                  <h3 className="profile__main-list-item-heading">プログラミング言語</h3>
                  <dl className="profile__data-skills">
                    <dt className="profile__data-skills-term">C＃</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">PHP</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Ruby</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Python 2</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Python 3</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Javascript</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">HTML +CSS3</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Sass</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">SQL</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Bash</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                  </dl>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box profile__data">
                  <h3 className="profile__main-list-item-heading">フレームワーク</h3>
                  <dl className="profile__data-skills">
                    <dt className="profile__data-skills-term">Laravel</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Ruby on Rails</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Django</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Flask</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Unity</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Vue.js</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Bootstrap</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Tensorflow</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                  </dl>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box profile__data">
                  <h3 className="profile__main-list-item-heading">その他</h3>
                  <dl className="profile__data-skills">
                    <dt className="profile__data-skills-term">Linux</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Mac OS X</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Cent OS</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Debian</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Apache</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">nginx</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Unicorn</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Amazon Web Service</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">WordPress</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Vim</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                  </dl>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box profile__data">
                  <h3 className="profile__main-list-item-heading">経験分野</h3>
                  <dl className="profile__data-skills profile__data-skills--full">
                    <dt className="profile__data-skills-term">Web開発（サーバサイドエンジニア） 　</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">Web開発（フロントエンドエンジニア）</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">研究開発（画像処理,自然言語処理,機械学習,AIなど）</dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                    <dt className="profile__data-skills-term">コンシューマーゲーム開発 </dt>
                    <dd className="profile__data-skills-data">1年以内</dd>
                  </dl>
                </div>
              </li>
            </ul>
          </div>
          <div className="profile__main-data">
            <div className="profile__main-heading">
              <h3 className="profile__main-heading-title">LANGUAGE</h3>
              <p className="profile__main-heading-jp">語学</p>
            </div>
            <ul className="profile__main-list profile__main-list--half">
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">話し言葉</h3>
                  <span className="profile__main-list-item-desc">英語、中国語</span>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">TOEIC</h3>
                  <span className="profile__main-list-item-desc">６５０点</span>
                </div>
              </li>
            </ul>
          </div>
          <div className="profile__main-data">
            <div className="profile__main-heading">
              <h3 className="profile__main-heading-title">WEBSITE</h3>
              <p className="profile__main-heading-jp">ウェブサイト</p>
            </div>
            <ul className="profile__main-list">
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">ポートフォリオ</h3>
                  <ul className="profile__data-websites">
                    <li className="profile__data-websites-item">
                      <div className="profile__data-websites-eyecatch">
                        <div className="profile__data-websites-eyecatch-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
                      </div>
                      <div className="profile__data-websites-content">
                        <h4 className="profile__data-websites-name">Myzn.io</h4>
                        <p className="profile__data-websites-desc">自分の情報まとめて掲載しているページ</p>
                        <div className="profile__data-link">
                          <a href="https://github.com/MyznEiji" className="button button--profile" target="_blank">https://github.com/MyznEiji</a>
                          <Clipboard value="https://github.com/MyznEiji" />
                        </div>
                      </div>
                    </li>
                    <li className="profile__data-websites-item">
                      <div className="profile__data-websites-eyecatch">
                        <div className="profile__data-websites-eyecatch-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
                      </div>
                      <div className="profile__data-websites-content">
                        <h4 className="profile__data-websites-name">Myzn.io</h4>
                        <p className="profile__data-websites-desc">自分の情報まとめて掲載しているページ</p>
                        <div className="profile__data-link">
                          <a href="https://github.com/MyznEiji" className="button button--profile" target="_blank">https://github.com/MyznEiji</a>
                          <Clipboard value="https://github.com/MyznEiji" />
                        </div>
                      </div>
                    </li>
                    <li className="profile__data-websites-item">
                      <div className="profile__data-websites-eyecatch">
                        <div className="profile__data-websites-eyecatch-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
                      </div>
                      <div className="profile__data-websites-content">
                        <h4 className="profile__data-websites-name">Myzn.io</h4>
                        <p className="profile__data-websites-desc">自分の情報まとめて掲載しているページ</p>
                        <div className="profile__data-link">
                          <a href="https://github.com/MyznEiji" className="button button--profile" target="_blank">https://github.com/MyznEiji</a>
                          <Clipboard value="https://github.com/MyznEiji" />
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">Github</h3>
                  <div className="profile__data-link">
                    <a href="{data.profile.github}" className="button button--profile" target="_blank">{data.profile.github}</a>
                    <Clipboard value="{data.profile.github}" />
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <aside className="profile__sidebar">
          <div className="profile__sidebar-inner">
            <h3 className="profile__sidebar-header">基本情報</h3>
            <div className="profile__sidebar-content">
              <dl className="profile__sidebar-content-basic">
                <dt className="profile__sidebar-content-basic-term">生年月日</dt>
                <dd className="profile__sidebar-content-basic-data">{data.profile.birthday}</dd>
                <dt className="profile__sidebar-content-basic-term">性別</dt>
                <dd className="profile__sidebar-content-basic-data">{data.profile.sex}</dd>
                <dt className="profile__sidebar-content-basic-term">住所</dt>
                <dd className="profile__sidebar-content-basic-data">{data.profile.address1}</dd>
                <dt className="profile__sidebar-content-basic-term">ステータス</dt>
                <dd className="profile__sidebar-content-basic-data">{data.profile.student_status}</dd>
              </dl>
            </div>
          </div>
          <div className="profile__sidebar-inner">
            <h3 className="profile__sidebar-header">レッスン</h3>
            <div className="profile__sidebar-content">
              <ul className="profile__sidebar-content-scores">
                <li className="profile__sidebar-content-scores-item">
                  <h4 className="profile__sidebar-content-scores-category">IT</h4>
                  <dl>
                    <dt>受講済み</dt>
                    <dd>Basic</dd>
                    <dd>Develop 1</dd>
                    <dt>受講中</dt>
                    <dd>Develop 2</dd>
                  </dl>
                </li>
                <li className="profile__sidebar-content-scores-item">
                  <h4 className="profile__sidebar-content-scores-category">ENGLISH</h4>
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
      </div>
    ) : accountType === 'company' ? (
      <div className="profile">
        <div className="profile__main">
          <div className="profile__main-data">
            <ul className="profile__main-list">
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">我々のミッションは</h3>
                  <p className="profile__main-list-item-copy">{data.profile.description}</p>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box profile__data">
                  <h3 className="profile__main-list-item-heading">特徴</h3>
                  <dl className="profile__data-character">
                    <dt className="profile__data-character-term">フラットな組織</dt>
                    <dd className="profile__data-character-data">{data.profile.what_text}</dd>
                    <dt className="profile__data-character-term">メンバーの多様性</dt>
                    <dd className="profile__data-character-data">{data.profile.why_text}</dd>
                    <dt className="profile__data-character-term">こだわりのある オフィス</dt>
                    <dd className="profile__data-character-data">{data.profile.how_text}</dd>
                  </dl>
                </div>
              </li>
              <li className="profile__main-list-item">
                <div className="profile__main-list-item-box">
                  <h3 className="profile__main-list-item-heading">ポートフォリオ</h3>
                  <ul className="profile__data-websites">
                    <li className="profile__data-websites-item">
                      <div className="profile__data-websites-eyecatch">
                        <div className="profile__data-websites-eyecatch-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
                      </div>
                      <div className="profile__data-websites-content">
                        <h4 className="profile__data-websites-name">Myzn.io</h4>
                        <p className="profile__data-websites-desc">自分の情報まとめて掲載しているページ</p>
                        <div className="profile__data-link">
                          <a href="https://github.com/MyznEiji" className="button button--profile" target="_blank">https://github.com/MyznEiji</a>
                          <Clipboard value="https://github.com/MyznEiji" />
                        </div>
                      </div>
                    </li>
                    <li className="profile__data-websites-item">
                      <div className="profile__data-websites-eyecatch">
                        <div className="profile__data-websites-eyecatch-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
                      </div>
                      <div className="profile__data-websites-content">
                        <h4 className="profile__data-websites-name">Myzn.io</h4>
                        <p className="profile__data-websites-desc">自分の情報まとめて掲載しているページ</p>
                        <div className="profile__data-link">
                          <a href="https://github.com/MyznEiji" className="button button--profile" target="_blank">https://github.com/MyznEiji</a>
                          <Clipboard value="https://github.com/MyznEiji" />
                        </div>
                      </div>
                    </li>
                    <li className="profile__data-websites-item">
                      <div className="profile__data-websites-eyecatch">
                        <div className="profile__data-websites-eyecatch-img" style={{ backgroundImage: 'url("https://source.unsplash.com/user/erondu/1600x900")' }}></div>
                      </div>
                      <div className="profile__data-websites-content">
                        <h4 className="profile__data-websites-name">Myzn.io</h4>
                        <p className="profile__data-websites-desc">自分の情報まとめて掲載しているページ</p>
                        <div className="profile__data-link">
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
          <div className="profile__data profile__data--jobs">
            <div className="profile__data-jobs">
              <div className="profile__data-jobs-content">
                <JobsList hasTitle="true" />
              </div>
              <div className="profile__data-jobs-footer">
                <Button>
                  もっとみる
                </Button>
              </div>
            </div>
          </div>
        </div>
        <aside className="profile__sidebar profile__sidebar--single">
          <div className="profile__sidebar-inner">
            <h3 className="profile__sidebar-header">企業情報</h3>
            <div className="profile__sidebar-content">
              <ul className="profile__sidebar-content-company">
                <li className="profile__sidebar-content-company-items">
                  <div className="profile__sidebar-content-avatar">
                    <img src="https://lorempixel.com/240/240/city/" alt=""/>
                    <h4 className="profile__sidebar-content-avatar-name">株式会社アクターリアリティ</h4>
                  </div>
                </li>
                <li className="profile__sidebar-content-company-items">
                  <div className="profile__sidebar-content-misc">
                    <i className="icon icon-marker text-dark-yellow"></i>
                    <p className="profile__sidebar-content-misc-copy">{`東京都港区芝2-13-4 住友不動産芝ビル4号館 9F`}</p>
                  </div>
                  <div className="profile__sidebar-content-misc">
                    <i className="icon icon-globe text-dark-yellow"></i>
                    <p className="profile__sidebar-content-misc-copy">{`https://hogehoge.com`}</p>
                  </div>
                </li>
                <li className="profile__sidebar-content-company-items">
                  <div className="profile__sidebar-content-misc">
                    <i className="icon icon-building text-dark-yellow"></i>
                    <p className="profile__sidebar-content-misc-copy">{`2008/1 に設立
                      飯田 悠司 が創業
                    `}</p>
                  </div>
                </li>
                <li className="profile__sidebar-content-company-items">
                  <ul className="profile__sidebar-content-sns">
                    <li className="profile__sidebar-content-sns-item">
                      <a href="#" target="_blank">
                        <i className="icon icon-twitter"></i>
                      </a>
                    </li>
                    <li className="profile__sidebar-content-sns-item">
                      <a href="#" target="_blank">
                        <i className="icon icon-facebook"></i>
                      </a>
                    </li>
                    <li className="profile__sidebar-content-sns-item">
                      <a href="#" target="_blank">
                        <i className="icon icon-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </li>
                <li className="profile__sidebar-content-company-items">
                  <div className="profile__sidebar-content-company-map">
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
    ) : null
  )
}
export default Profile;
