import React, { useEffect } from 'react';
import scrollIntoView from 'smooth-scroll-into-view-if-needed';

import Page from '../common/Page';
import Heading from '../common/Heading';
import PageUp from '../common/PageUp';
import Help from './Help';

const HelpPage = _ => {
  useEffect(_ => {
    const elemRoot = document.querySelector('#root');

    setTimeout(_ => {
      scrollIntoView(elemRoot, { block: 'start',  behavior: 'smooth' });
    }, 100);
  }, []);

  return (
    <Page>
      <Heading type={null}
        title="HELP"
        subTitle="ヘルプ"
      />
      <Help />
      <PageUp />
    </Page>
  );
}

export default HelpPage;
