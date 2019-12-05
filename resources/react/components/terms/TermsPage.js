import React, { useEffect } from 'react';

import scrollIntoView from 'smooth-scroll-into-view-if-needed';
import Page from '../common/Page';
import Heading from '../common/Heading';
import PageUp from '../common/PageUp';
import TermsContent from './TermsContent';

const TermsPage = () => {
  useEffect(() => {
    const elemRoot = document.querySelector('#root');

    setTimeout(_ => {
      scrollIntoView(elemRoot, { block: 'start',  behavior: 'smooth' });
    }, 5);
  }, []);

  return (
    <Page>
      <Heading type={null}
        title="TERMS OF SERVICE"
        subTitle="利用規約"
      />
      <TermsContent />
      <PageUp />
    </Page>
  );
}

export default TermsPage;
