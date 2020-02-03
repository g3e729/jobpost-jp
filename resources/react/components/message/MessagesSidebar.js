import React, { useEffect, useState, memo } from 'react';
import _ from 'lodash';
import { useDispatch, connect } from 'react-redux';

import Avatar from '../common/Avatar';
import Loading from '../common/Loading';
import Nada from '../common/Nada';
import { state } from '../../constants/state';
import { setActiveChannel } from '../../actions/messages';

const MemoAvatar = memo(props => {
  const {
    accountType,
    companyAvatar,
    applicantAvatar,
  } = props;

  return (
    <Avatar className="avatar--message"
      style={{ backgroundImage: `url("${accountType === 'company' ? applicantAvatar : companyAvatar}")`}}
    />
  )
}, (prevProps, nextProps) => {
  return _.isEqual(prevProps.accountType, nextProps.accountType);
});

const MessagesSidebar = (props) => {
  const dispatch = useDispatch();
  const { isLoading, messages, user } = props;
  const data = messages.messagesData || {};
  const messagesData = data.data || {};
  const accountType = (user.userData && user.userData.account_type) || 'company';
  const [currentChannel, setCurrentChannel] = useState(null);

  const handleChangeChannel = id => {
    setCurrentChannel(id);
    dispatch(setActiveChannel(id));
  }

  useEffect(_ => {
    if (!messages.activeChannel) {
      const activeChannel = (history.state && history.state.state) ? history.state.state.activeChannel : null;
      setCurrentChannel(activeChannel);

      if (activeChannel) {
        dispatch(setActiveChannel(activeChannel))
      };
    } else {
      dispatch(setActiveChannel(messages.activeChannel))
      setCurrentChannel(messages.activeChannel);

    }
  }, [messages.activeChannel])

  return (
    <aside className="messages-sidebar">
      <h3 className="messages-sidebar__header">メッセージ</h3>
      <ul className="messages-sidebar__chatroom">
        { isLoading ? (
          <Loading className="loading--full" />
        ) : (
          !_.isEmpty(messagesData) ? (
            messagesData.map(item => (
              <li className={`messages-sidebar__chatroom-item ${item.id === currentChannel ? state.ACTIVE : ''}`}
                onClick={_ => handleChangeChannel(item.id)} key={item.id}>
                <div className="messages-sidebar__chatroom-item-left">
                  <div className="messages-sidebar__chatroom-item-avatar">
                    <MemoAvatar
                      accountType={accountType}
                      companyAvatar={item.employer.avatar}
                      applicantAvatar={item.applicant.avatar}
                    />
                  </div>
                </div>
                <div className="messages-sidebar__chatroom-item-right">
                  <h4 className="messages-sidebar__chatroom-item-contact">
                    {accountType === 'company' ? item.applicant.display_name : item.employer.display_name}
                  </h4>
                  <p className="messages-sidebar__chatroom-item-message">
                    {_.truncate(item.job_post.title, { 'length': 25, 'separator': '...'})}
                  </p>
                </div>
              </li>
            ))
          ) : (
            <Nada className="nada--full">
              No messages found.
            </Nada>
          )
        )}
      </ul>
    </aside>
  );
}

const mapStateToProps = (state) => ({
  messages: state.messages,
  user: state.user
});

export default connect(mapStateToProps)(MessagesSidebar);
