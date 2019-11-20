import React from 'react';

const Footer = () => {
  return (
    <footer className="l-footer footer">
      <div className="l-footer__top">
        <h2 className="footer__heading">ABOUT</h2>

        <ul className="footer-menu">
          <li className="footer-menu__item is-active">
            <a href="#">運営会社</a>
          </li>
          <li className="footer-menu__item">
            <a href="#">利用規約</a>
          </li>
          <li className="footer-menu__item">
            <a href="#">ヘルプ</a>
          </li>
          <li className="footer-menu__item">
            <a href="#">プライバシー</a>
          </li>
        </ul>

        <ul className="footer-sns">
          <li className="footer-sns__item">
            <a href="#">
              <i className="icon icon-twitter"></i>
            </a>
          </li>
          <li className="footer-sns__item">
            <a href="#">
              <i className="icon icon-facebook"></i>
            </a>
          </li>
          <li className="footer-sns__item">
            <a href="#">
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

export default Footer;
