import React from 'react';
import { Link } from 'react-router-dom';

import Page from '../common/Page';
import Heading from '../common/Heading';
import { routes } from '../../constants/routes';

import logo from '../../../img/logo-kredo-vertical.png';
import logoSp from '../../../img/logo-kredo-horizontal.png';

const Four0FourPage = _ => (
  <Page>
    <Heading type={null}
      title="404"
      subTitle=""
    />
    <div className="l-section section 404">
      <div className="l-container">
        <h2 className="404__logo">
          <picture>
            <source srcSet={logo} media="(min-width: 769px)" />
            <img src={logoSp} alt="Kredo" className="404__logo-image" />
          </picture>
        </h2>
        <p className="404__desc">お探しのページが見つかりません。</p>
        <Link className="button 404__button" to={routes.ROOT}>
          ホームに戻る
        </Link>
      </div>
    </div>
  </Page>
);

export default Four0FourPage;
