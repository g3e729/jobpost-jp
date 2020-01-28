import React, { useEffect, useState } from 'react';
import { useDispatch } from 'react-redux';

import Page from '../common/Page';
import MessagesSidebar from './MessagesSidebar';
import MessagesSection from './MessagesSection';
import { getMessages } from '../../actions/messages';

const MessagesPage = _ => {
  const dispatch = useDispatch();
  const [isLoading, setIsLoading] = useState(true);

  useEffect(_ => {
    setIsLoading(true);

    dispatch(getMessages())
      .then(_ => setIsLoading(false))
      .catch(_ => setIsLoading(false));

  }, [location]);

  return (
    <Page>
      <div className="l-section l-section--full section">
        <div className="l-container l-container--main l-container--full">
          <MessagesSidebar isLoading={isLoading} />
          <MessagesSection isLoading={isLoading} />
        </div>
      </div>
    </Page>
  );
}

export default MessagesPage;
