import React, { Component } from 'react';
import { withRouter } from 'react-router';

import Header from './common/Header';
import Footer from './common/Footer';
import Pages from './common/Pages';

class App extends Component {
  render() {
    return(
      <div className="l-wrap" id="js-wrap">
        <Header />
        <Pages />
        <Footer />
      </div>
    );
  }
}

export default withRouter(App);

