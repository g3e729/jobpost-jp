import React, { Component } from 'react';
import { NavLink, withRouter } from 'react-router-dom';

import { footerLinks } from '../constants/enums';
import { state } from '../constants/state';
import { routes, prefix } from '../constants/routes';

class Footer extends Component {
  render() {
    let { location } = this.props;
    let path = location.pathname.substr(prefix.length).replace('/', '');

    return (
      <footer className="l-footer footer">
        <div className="l-footer__top">
          { footerLinks.includes(path) ?
            ( <h2 className="footer__heading">
                { path.toUpperCase() }
              </h2>
            ) : null
          }
          <ul className="footer-menu">
            <li className="footer-menu__item">
              <NavLink exact to={routes.ABOUT} activeClassName={state.ACTIVE}>
                運営会社
              </NavLink>
            </li>
            <li className="footer-menu__item">
              <NavLink exact to={routes.TERMS} activeClassName={state.ACTIVE}>
                利用規約
              </NavLink>
            </li>
            <li className="footer-menu__item">
              <a href="#" target="_blank">
                お問い合わせ
              </a>
            </li>
            <li className="footer-menu__item">
              <NavLink exact to={routes.HELP} activeClassName={state.ACTIVE}>
                ヘルプ
              </NavLink>
            </li>
            <li className="footer-menu__item">
              <NavLink exact to={routes.PRIVACY} activeClassName={state.ACTIVE}>
                プライバシー
              </NavLink>
            </li>
          </ul>

          <ul className="footer-sns">
            <li className="footer-sns__item">
              <a href="#" target="_blank">
                <i className="icon icon-twitter"></i>
              </a>
            </li>
            <li className="footer-sns__item">
              <a href="#" target="_blank">
                <i className="icon icon-facebook"></i>
              </a>
            </li>
            <li className="footer-sns__item">
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
    )
  }
}

export default withRouter(Footer);
