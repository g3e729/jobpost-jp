import React, { useState } from 'react';
import moment from 'moment';
import { useDispatch, connect } from 'react-redux';

import Avatar from '../common/Avatar';
import Button from '../common/Button';
import Input from '../common/Input';
import Loading from '../common/Loading';
import { state } from '../../constants/state';

import avatarPlaceholder from '../../../img/avatar-default.png';

const MessagesSection = (props) => {
  const { isLoading, messages } = props;
  const [acceptedTerm, setAcceptedTerm] = useState(false);
  const [messageValue, setMessageValue] = useState('');
  const data = messages.messagesData || {};
  const messagesData = data.data || {};

  console.log('messagesData :', messagesData);

  const handleSubmit = _ => {
    console.log('[Message]');
  }

  const handleChange = e => {
    setMessageValue(e.target.value);
  }

  return (
    <div className="messages-section">
      <h3 className="messages-section__header">{isLoading ? null : messagesData[0].recipient.display_name}</h3>
      <div className="messages-section__main">
        <ul className="messages-section__main-list">
          { isLoading ? (
            <Loading className="loading--padded loading--center" />
          ) : (
            messagesData[0].messages.map((item, idx) => (
              <li className="messages-section__main-list-item" key={idx}>
                <div className={`message ${idx % 2 === 1 ? 'message--right': ''}`}>
                  <div className="message__avatar">
                    <Avatar className="avatar--message"
                      style={{ backgroundImage: `url("${messagesData[0].recipient.cover_photo || avatarPlaceholder}")` }}
                    />
                  </div>
                  <div className="message__main">
                    <h4 className="message__name">{messagesData[0].recipient.display_name}</h4>
                    <time className="message__time">{moment(item.created_at).format('YYYY-MM-DD HH:mm')}</time>
                    <p className="message__text">{item.content}</p>
                  </div>
                </div>
              </li>
            ))
          )}
        </ul>
        { isLoading ? null : (
          acceptedTerm || messagesData[0] && messagesData[0].messages.length ? (
            <div className="messages-section__main-form">
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
          ) : (
            <div className="messages-section__main-footer">
              <p className="messages-section__main-footer-intro">
                返信をするには「名前」、「画像」、「動画」、「生年月日」を公開する必要があります。
              </p>
              <Button className="button--large" onClick={_ => setAcceptedTerm(true) }>
                公開する
              </Button>
            </div>
          )
        )}
      </div>
    </div>
  );
}

const mapStateToProps = (state) => ({
  messages: state.messages
});

export default connect(mapStateToProps)(MessagesSection);
