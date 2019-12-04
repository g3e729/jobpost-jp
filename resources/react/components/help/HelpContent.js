import React from 'react';

const HelpContent = () => (
  <section className="l-section section">
    <div className="l-container">
      <ul className="help">
        { [0, 1, 3, 4].map((_, idx) => (
          <React.Fragment key={idx}>
            <li className="help__item">
              <h3 className="help__item-question">手数料はかかりますか？</h3>
              <p className="help__item-answer">売上に関する手数料は無料です。</p>
              <span className="help__item-note">※無料期間は、終了２週間前に告知致します。</span>
            </li>
            <li className="help__item">
              <h3 className="help__item-question">手数料はかかりますか？</h3>
              <p className="help__item-answer">本規約は、当社が提供する全てのサービス（以下「本サービス」といいます）の利用条件を定めるものであり、本サービスを利用する全てのお客様に適用されます。以下を注意してお読みください。</p>
            </li>
          </React.Fragment>
        )) }
      </ul>
    </div>
  </section>
);

export default HelpContent;
