import React from 'react';

import Page from '../common/Page';
import Heading from '../common/Heading';
import HelpContent from './HelpContent';

const HelpPage = () => (
  <Page>
    <Heading title="HELP" subTitle="ヘルプ"></Heading>
    <HelpContent />
  </Page>
);

export default HelpPage;
