import React, { useEffect } from 'react';

import scrollIntoView from 'smooth-scroll-into-view-if-needed';
import Page from '../common/Page';
import Heading from '../common/Heading';

const AboutPage = () => {
  useEffect(() => {
    const elemRoot = document.querySelector('#root');

    setTimeout(_ => {
      scrollIntoView(elemRoot, { block: 'start',  behavior: 'smooth' });
    }, 5);
  }, []);

  return (
    <Page>
      <Heading title="ABOUT" subTitle="およそ"></Heading>
    </Page>
  );
}

export default AboutPage;
