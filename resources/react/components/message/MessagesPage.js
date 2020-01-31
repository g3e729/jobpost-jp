import React, { useEffect, useState } from 'react';
import { useDispatch } from 'react-redux';

import Page from '../common/Page';
import MessagesSidebar from './MessagesSidebar';
import MessagesSection from './MessagesSection';
import useInterval from '../../utils/useInterval';
import { getMessages } from '../../actions/messages';

const MessagesPage = _ => {
  const dispatch = useDispatch();
  const [isLoading, setIsLoading] = useState(true);
  const delay = 5000; // TODO: set sweet spot

  useEffect(_ => {
    setIsLoading(true);

    dispatch(getMessages((history.state && history.state.state) ? history.state.state.activeChannel : null))
      .then(_ => setIsLoading(false))
      .catch(_ => setIsLoading(false));

  }, []);

  useInterval(_ => {
    dispatch(getMessages((history.state && history.state.state) ? history.state.state.activeChannel : null))
      .then(_ => setIsLoading(false))
      .catch(_ => setIsLoading(false));
  }, delay);

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
