import React from 'react';

import Page from '../common/Page';
import Heading from  '../common/Heading';
import Clipboard from  '../common/Clipboard';
import ProfileContent from './ProfileContent';

const ProfilePage = () => (
  <Page>
    <Heading type="student"
      style={{ backgroundImage: 'url("https://lorempixel.com/1800/600/people/")' }}
      data-avatar="https://lorempixel.com/1800/600/people/"
      title="田中義人"
      subTitle={<span><i className="icon icon-book text-dark-yellow"></i>PHPコース</span>}
    />
    <section className="l-section l-section--profile section">
      <div className="l-container l-container--main">
        <ProfileContent>
          <div className="profile" style={{flex: '2', margitRight: '10px', alignSelf: 'stretch'}}>
            <div className="profile-data">
              <div className="profile-data__heading">
                <h3 className="profile-data__heading-title">PROFILE</h3>
                <p className="profile-data__heading-jp">プロフィール</p>
              </div>
              <ul className="profile-data__section">
                <li className="profile-data__section-item">
                  <div className="profile-data__section-box">
                    1
                  </div>
                </li>
                <li className="profile-data__section-item">
                  <div className="profile-data__section-box">
                    2
                  </div>
                </li>
                <li className="profile-data__section-item">
                  <div className="profile-data__section-box">
                    3
                  </div>
                </li>
                <li className="profile-data__section-item">
                  <div className="profile-data__section-box">
                    4
                  </div>
                </li>
                <li className="profile-data__section-item">
                  <div className="profile-data__section-box">
                    5
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
          <aside className="sidebar sidebar--multiple">
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
      </div>
    </section>
  </Page>
)

export default ProfilePage;
