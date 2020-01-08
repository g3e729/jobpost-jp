import React, { useEffect } from 'react';
import { useDispatch } from 'react-redux';

import Header from './common/Header';
import Footer from './common/Footer';
import Pages from './common/Pages';
import { getUser } from '../actions/user';
import { getFilters } from '../actions/filters';
import { unsetModal } from '../actions/modal';

const App = _ => {
  const dispatch = useDispatch();

  useEffect(_ => {
    dispatch(getUser());
    dispatch(getFilters());
    dispatch(unsetModal());
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
