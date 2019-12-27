import React from 'react';
import faker from 'faker';
faker.locale = "ja";

const dummyMessages = new Array(10)
  .fill(null)
  .map(e => {
    e = {};
    e.id = faker.random.uuid();
    e.company = faker.company.companyName();
    e.message = `Apply${faker.lorem.words(2)}`;

    return e;
  })

const MessagesSidebar = _ => (
  <aside className="messages-sidebar">
    <h3 className="messages-sidebar__header">メッセージ</h3>
    <ul className="messages-sidebar__chatroom">
      { dummyMessages.map((item) => (
        <li className="messages-sidebar__chatroom-item" key={item.id}>
          {item.message}
        </li>
      ))}
    </ul>
  </aside>
);

export default MessagesSidebar;
