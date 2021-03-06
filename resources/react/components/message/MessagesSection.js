import React, { useEffect, useState, memo } from 'react';
import moment from 'moment';
import _ from 'lodash';
import { useDispatch, connect } from 'react-redux';

import Avatar from '../common/Avatar';
import Button from '../common/Button';
import Input from '../common/Input';
import Loading from '../common/Loading';
import { postMessage } from '../../actions/messages';

const MemoAvatar = memo(props => {
  const {
    itemId,
    accountId,
    accountType,
    companyAvatar,
    applicantAvatar,
  } = props;

  return (
    <Avatar className="avatar--message"
      style={{ backgroundImage: `url("${itemId == accountId ? (accountType === 'company' ? companyAvatar : applicantAvatar) : (accountType === 'company' ? applicantAvatar : companyAvatar)}")`}}
    />
  )
}, (prevProps, nextProps) => {
  return (_.isEqual(prevProps.itemId, nextProps.itemId) && _.isEqual(prevProps.accountId, nextProps.accountId));
});

const MessagesSection = (props) => {
  const { isLoading, messages, user } = props;
  const [messagesList, setMessagesList] = useState([]);
  const [currentChannel, setCurrentChannel] = useState(1);
  const [acceptedTerm, setAcceptedTerm] = useState(false);
  const [messageValue, setMessageValue] = useState('');
  const [isPosting, setIsPosting] = useState(false);
  const dispatch = useDispatch();
  const data = messages.messagesData || {};
  const messagesData = data.data || {};
  const accountId = (user.userData && user.userData.id) || 0;
  const accountType = (user.userData && user.userData.account_type) || 'company';

  const handleClick = e => {
    e.preventDefault();
    setIsPosting(true);

    const formdata = new FormData();
    formdata.append('channel_id', currentChannel);
    formdata.append('message', messageValue);

    dispatch(postMessage(formdata, currentChannel))
      .then(_ => {
        setMessageValue('');
        setIsPosting(false);
      })
      .catch(_ => {
        setMessageValue('');
        setIsPosting(false);
      });
  }

  const handleSubmit = _ => {
    console.log('[Message]');
  }

  const handleChange = e => {
    setMessageValue(e.target.value);
  }

  useEffect(() => {
    setAcceptedTerm(false);

    if (!_.isEmpty(messagesData) && messages.activeChannel) {
      setCurrentChannel(messages.activeChannel)
      setMessagesList(messagesData.find(item => item.id === messages.activeChannel) || messagesData[0]);

      if (messagesData.find(item => item.id === messages.activeChannel) &&
        messagesData.find(item => item.id === messages.activeChannel).chat_channel.messages.length) {
          setAcceptedTerm(true)
      }
    }
  }, [messages, messagesData])

  return (
    <div className="messages-section">
      { !_.isEmpty(messagesList) ? (
        <h3 className="messages-section__header">{isLoading ? null : (
          accountType === 'company' ? messagesList.applicant.display_name : messagesList.employer.display_name
        )}</h3>
      ) : null }
      <div className="messages-section__main">
        <ul className="messages-section__main-list">
          { isLoading ? (
            <Loading className="loading--padded loading--center" />
          ) : (
            !_.isEmpty(messagesList) && messagesList.chat_channel.messages.length ? (
              messagesList.chat_channel.messages.map(item => (
                <li className="messages-section__main-list-item" key={item.id}>
                  <div className={`message ${item.user_id == accountId ? 'message--right' : ''}`}>
                    <div className="message__avatar">
                      <MemoAvatar
                        itemId={item.user_id}
                        accountId={accountId}
                        accountType={accountType}
                        companyAvatar={messagesList.employer.avatar}
                        applicantAvatar={messagesList.applicant.avatar}
                      />
                    </div>
                    <div className="message__main">
                      <h4 className="message__name">
                        {item.user_id == accountId ? (accountType === 'company' ? messagesList.employer.display_name : messagesList.applicant.display_name) : (accountType === 'company' ? messagesList.applicant.display_name : messagesList.employer.display_name)}
                      </h4>
                      <time className="message__time">{moment(item.created_at).format('YYYY-MM-DD HH:mm')}</time>
                      <p className="message__text">{item.content}</p>
                    </div>
                  </div>
                </li>
              ))
            ) : null
          )}
        </ul>
        { isLoading ? null : (
          acceptedTerm || !_.isEmpty(messagesList) && messagesList.chat_channel.messages.length ? (
            <div className="messages-section__main-form">
              <form className="messages-section__main-form-main" onSubmit={_ => handleSubmit()}>
                <Input className="messages-section__main-form-input"
                  value={messageValue}
                  onChange={e => handleChange(e)}
                  name="message_value"
                  type="text"
                  placeholder="Type a message"
                />
                <Button className="button--icon" onClick={e => handleClick(e)}>
                  <>
                    <i className="icon icon-paperplane"></i>
                    送信
                  </>
                </Button>
              </form>
            </div>
          ) : (
            isPosting && !acceptedTerm? null : (
              <div className="messages-section__main-footer">
                <p className="messages-section__main-footer-intro">
                  返信をするには「名前」、「画像」、「動画」、「生年月日」を公開する必要があります。
                </p>
                <Button className="button--large" onClick={_ => setAcceptedTerm(true) }>
                  公開する
                </Button>
              </div>
            )
          )
        )}
      </div>
    </div>
  );
}

const mapStateToProps = (state) => ({
  messages: state.messages,
  user: state.user
});

export default connect(mapStateToProps)(MessagesSection);
