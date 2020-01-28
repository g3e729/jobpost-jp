import React, { useEffect, useState } from 'react';
import { useDispatch, connect } from 'react-redux';

import Avatar from '../common/Avatar';
import Loading from '../common/Loading';
import { state } from '../../constants/state';
import { setActiveChannel } from '../../actions/messages';

import avatarPlaceholder from '../../../img/avatar-default.png';

const MessagesSidebar = (props) => {
  const dispatch = useDispatch();
  const { isLoading, messages } = props;
  const data = messages.messagesData || {};
  const messagesData = data.data || {};
  const [isLoadingTmp, setIsLoadingTmp] = useState(isLoading);
  const [currentChannel, setCurrentChannel] = useState(0);

  const handleChangeChannel = id => {
    setIsLoadingTmp(true);

    dispatch(setActiveChannel(id))
  }

  useEffect(_ => {
    setCurrentChannel(messages.activeChannel)
  }, [messages])

  return (
    <aside className="messages-sidebar">
      <h3 className="messages-sidebar__header">メッセージ</h3>
      <ul className="messages-sidebar__chatroom">
        { isLoading ? (
          <Loading className="loading--full" />
        ) : (
          messagesData.map(item => (
            <li className={`messages-sidebar__chatroom-item ${item.id === currentChannel ? state.ACTIVE : ''}`}
              onClick={_ => handleChangeChannel(item.id)} key={item.id}>
              <div className="messages-sidebar__chatroom-item-left">
                <div className="messages-sidebar__chatroom-item-avatar">
                  <Avatar className="avatar--message"
                    style={{ backgroundImage: `url("${item.chattable.job_post.cover_photo || avatarPlaceholder}")` }}
                  />
                </div>
              </div>
              <div className="messages-sidebar__chatroom-item-right">
                <h4 className="messages-sidebar__chatroom-item-contact">
                  {item.recipient.display_name}
                </h4>
                <p className="messages-sidebar__chatroom-item-message">
                  {item.chattable.job_post.title}
                </p>
              </div>
            </li>
          ))
        )}
      </ul>
    </aside>
  );
}

const mapStateToProps = (state) => ({
  messages: state.messages
});

export default connect(mapStateToProps)(MessagesSidebar);
