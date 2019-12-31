import React, { useState } from 'react';
import faker from 'faker';
faker.locale = "ja";

import Avatar from '../common/Avatar';
import { state } from '../../constants/state';

const dummyMessages = new Array(10)
  .fill(null)
  .map(e => {
    e = {};
    e.id = faker.random.uuid();
    e.contact = faker.company.companyName();
    e.message = `Apply${faker.lorem.words(2)}`;

    return e;
  })

const MessagesSidebar = _ => {
  const [currentItem, setCurrentItem] = useState(0);

  return (
    <aside className="messages-sidebar">
      <h3 className="messages-sidebar__header">メッセージ</h3>
      <ul className="messages-sidebar__chatroom">
        { dummyMessages.map((item, idx) => (
          <li className={`messages-sidebar__chatroom-item ${idx === currentItem ? state.ACTIVE : ''}`}
            onClick={_ => setCurrentItem(idx)} key={item.id}>
            <div className="messages-sidebar__chatroom-item-left">
              <div className="messages-sidebar__chatroom-item-avatar">
                <Avatar className="avatar--message"
                  style={{ backgroundImage: 'url("https://lorempixel.com/640/640/business/")' }}
                />
              </div>
            </div>
            <div className="messages-sidebar__chatroom-item-right">
              <h4 className="messages-sidebar__chatroom-item-contact">
                {item.contact}
              </h4>
              <p className="messages-sidebar__chatroom-item-message">
                {item.message}
              </p>
            </div>
          </li>
        ))}
      </ul>
    </aside>
  );
}

export default MessagesSidebar;
