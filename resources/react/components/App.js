import React, { Component } from 'react';

import Header from './common/Header';
import Footer from './common/Footer';
import Pages from './common/Pages';

const App = () => (
  <div className="l-wrap" id="js-wrap">
    <Header />
    <Pages />
    <Footer />
  </div>
);

export default App;

