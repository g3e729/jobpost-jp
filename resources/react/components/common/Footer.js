import React from 'react';
import { NavLink, useLocation } from 'react-router-dom';

import { routes, prefix } from '../../constants/routes';
import { state } from '../../constants/state';

const footerLinks = [
  'terms',
  'help',
  'privacy'
];

const Footer = _ => {
  let location = useLocation();
  let path = location.pathname.substr(prefix.length).replace('/', '');

  return (
    <footer className="l-footer footer">
      <div className="l-footer__top">
        { footerLinks.includes(path) ?
          ( <div className="footer__heading">
              { path.toUpperCase() }
            </div>
          ) : null
        }
        <ul className="footer__menu">
          <li className="footer__menu-item footer__menu-item--external">
            <a href="#" target="_blank">
              運営会社
              <i className="icon icon-external-link"></i>
            </a>
          </li>
          <li className="footer__menu-item">
            <NavLink exact to={routes.TERMS} activeClassName={state.ACTIVE}>
              利用規約
            </NavLink>
          </li>
          <li className="footer__menu-item footer__menu-item--external">
            <a href="#" target="_blank">
              お問い合わせ
              <i className="icon icon-external-link"></i>
            </a>
          </li>
          <li className="footer__menu-item">
            <NavLink exact to={routes.HELP} activeClassName={state.ACTIVE}>
              ヘルプ
            </NavLink>
          </li>
          <li className="footer__menu-item">
            <NavLink exact to={routes.PRIVACY} activeClassName={state.ACTIVE}>
              プライバシー
            </NavLink>
          </li>
        </ul>

        <ul className="footer__sns">
          <li className="footer__sns-item">
            <a href="#" target="_blank">
              <i className="icon icon-twitter"></i>
            </a>
          </li>
          <li className="footer__sns-item">
            <a href="#" target="_blank">
              <i className="icon icon-facebook"></i>
            </a>
          </li>
          <li className="footer__sns-item">
            <a href="#" target="_blank">
              <i className="icon icon-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
      <div className="l-footer__bottom">
        <small className="footer__copyright">Copyright© 2019 Kredo Inc. All rights reserved.</small>
      </div>
    </footer>
  );
}

export default Footer;
