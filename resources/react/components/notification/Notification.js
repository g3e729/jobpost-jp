import React from 'react';
import { Link } from 'react-router-dom';

import { routes } from '../../constants/routes';

const Notification = _ => (
  <div className="notification">
    <div className="notification__top">
      <h2 className="notification__title">Kredoブログを更新しました。</h2>
      <time className="notification__schedule" dateTime="2019-07-24">2019/07/24</time>
    </div>
    <p className="notification__desc">「AI（人工知能）時代にプログラマーは失業？生き残るための方法とAIエンジニアを目指す方法」を更新

      <a href="https://kredo.jp/media/ai-programmer-survive/" target="_blank">https://kredo.jp/media/ai-programmer-survive/</a>
    </p>

    <Link className="button button--pill notification__button" to={routes.NOTIFICATIONS}>
      <span><i className="icon icon-back-curve text-dark-yellow"></i>通知リストに戻る</span>
    </Link>
  </div>
);

export default Notification;
