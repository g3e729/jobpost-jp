import React from 'react';

import Page from '../common/Page';
import Heading from  '../common/Heading';
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
          <div style={{flex: '2', margitRight: '10px', alignSelf: 'stretch'}}>
            <div className="profile-basic">
              <h3 className="profile__title">PROFILE</h3>
              <p className="profile__title-jp">プロフィール</p>
            </div>
            <div className="profile-skills">
              <h3 className="profile__title">COMPUTER SKILLS</h3>
              <p className="profile__title-jp">コンピュータースキル</p>
            </div>
            <div className="profile-language">
              <h3 className="profile__title">LANGUAGE</h3>
              <p className="profile__title-jp">語学</p>
            </div>
            <div className="profile-website">
              <h3 className="profile__title">WEBSITE</h3>
              <p className="profile__title-jp">ウェブサイト</p>
            </div>
            Content<br/>
            Content<br/>
            Content<br/>
            Content<br/>
            Content<br/>
            Content<br/>
            Content<br/>
            Content<br/>
            Content<br/>
            Content<br/>
            Content<br/>
            Content<br/>
            Content<br/>
            Content<br/>
            Content<br/>
            Content<br/>
            Content<br/>
            Content<br/>
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
