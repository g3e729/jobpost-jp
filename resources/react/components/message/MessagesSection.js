import React, { useState } from 'react';
import faker from 'faker';
faker.locale = "ja";

import Avatar from '../common/Avatar';
import Button from '../common/Button';
import Input from '../common/Input';
import Loading from '../common/Loading';
import { state } from '../../constants/state';

const dummyMessage = {
  id: faker.random.uuid(),
  user: faker.name.firstName(),
  contact: faker.company.companyName(),
  message: `Apply${faker.lorem.words(2)}`,
  messageFull: [
    `Apply${faker.lorem.words(50)}`,
    `Apply${faker.lorem.words(10)}`,
    `Apply${faker.lorem.words(5)}`,
  ]
}

const MessagesSection = ({isLoading}) => {
  const [hasForm, setHasForm] = useState(false);
  const [messageValue, setMessageValue] = useState('');

  const handleSubmit = _ => {
    console.log('[Message]');
  }

  const handleChange = e => {
    setMessageValue(e.target.value);
  }

  return (
    <div className="messages-section">
      <h3 className="messages-section__header">{dummyMessage.contact}</h3>
      <div className="messages-section__main">
        <ul className="messages-section__main-list">
          { isLoading ? (
            <Loading className="loading--padded loading--center" />
          ) : (
            dummyMessage.messageFull.map((item, idx) => (
              <li className="messages-section__main-list-item" key={idx}>
                <div className={`message ${idx % 2 === 1 ? 'message--right': ''}`}>
                  <div className="message__avatar">
                    <Avatar className="avatar--message"
                      style={{ backgroundImage: 'url("https://lorempixel.com/640/640/business/")' }}
                    />
                  </div>
                  <div className="message__main">
                    <h4 className="message__name">{dummyMessage.contact}</h4>
                    <time className="message__time">2019年 9月 12日 16 : 35</time>
                    <p className="message__text">{item}</p>
                  </div>
                </div>
              </li>
            ))
          )}
        </ul>
        <div className={`messages-section__main-footer ${hasForm ? state.HIDDEN : ''}`}>
          <p className="messages-section__main-footer-intro">
            返信をするには「名前」、「画像」、「動画」、「生年月日」を公開する必要があります。
          </p>
          <Button className="button--large" onClick={_ => setHasForm(true) }>
            公開する
          </Button>
        </div>
        <div className={`messages-section__main-form ${!hasForm ? state.HIDDEN : ''}`}>
          <form className="messages-section__main-form-main" onSubmit={_ => handleSubmit()}>
            <Input className="messages-section__main-form-input"
              value={messageValue}
              onChange={e => handleChange(e)}
              name="message_value"
              type="text"
              placeholder="Type a message"
            />
            <Button className="button--icon" type="submit">
              <>
                <i className="icon icon-paperplane"></i>
                送信
              </>
            </Button>
          </form>
        </div>
      </div>
    </div>
  );
}

export default MessagesSection;
