import React, { useEffect } from 'react';

import scrollIntoView from 'smooth-scroll-into-view-if-needed';
import Page from '../common/Page';
import Heading from '../common/Heading';
import HelpContent from './HelpContent';

const HelpPage = () => {
  useEffect(() => {
    const elemRoot = document.querySelector('#root');

    setTimeout(_ => {
      scrollIntoView(elemRoot, { block: 'start',  behavior: 'smooth' });
    }, 5);
  }, []);

  return (
    <Page>
      <Heading title="HELP" subTitle="ヘルプ"></Heading>
      <HelpContent />
    </Page>
  );
}

export default HelpPage;
