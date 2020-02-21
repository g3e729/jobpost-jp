import React, { useEffect } from 'react';
import scrollIntoView from 'smooth-scroll-into-view-if-needed';

import Page from '../common/Page';
import Heading from '../common/Heading';
import PageUp from '../common/PageUp';
import PostingPolicy from './PostingPolicy';

const PostingPolicyPage = _ => {
  useEffect(_ => {
    const elemRoot = document.querySelector('#root');

    setTimeout(_ => {
      scrollIntoView(elemRoot, { block: 'start',  behavior: 'smooth' });
    }, 5);
  }, []);

  return (
    <Page>
      <Heading type={null}
        title="Posting Policy"
        subTitle="表記規定"
      />
      <PostingPolicy />
      <PageUp />
    </Page>
  );
}

export default PostingPolicyPage;
