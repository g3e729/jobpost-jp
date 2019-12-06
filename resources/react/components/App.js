import React, { useEffect } from 'react';
import { connect } from 'react-redux';
import { compose } from 'recompose';

import { getUser } from '../actions/user';

import Header from './common/Header';
import Footer from './common/Footer';
import Pages from './common/Pages';

const App = () => {
  useEffect(() => {
    getUser();
  }, []);

  return (
    <div className="l-wrap" id="js-wrap">
      <Header />
      <Pages />
      <Footer />
    </div>
  );
}

const mapDispatchToProps = (dispatch) => ({
  getUser: () => {
    return dispatch(getUser());
  }
});

export default compose(
  connect(null, mapDispatchToProps)
)(App);
