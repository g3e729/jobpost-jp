import React, { useEffect } from 'react';
import { useDispatch } from 'react-redux';

import { getUser } from '../actions/user';

import Header from './common/Header';
import Footer from './common/Footer';
import Pages from './common/Pages';

const App = _ => {
  const dispatch = useDispatch();

  useEffect(_ => {
    dispatch(getUser());
  }, []);

  return (
    <div className="l-wrap" id="js-wrap">
      <Header />
      <Pages />
      <Footer />
    </div>
  );
}

export default App;
