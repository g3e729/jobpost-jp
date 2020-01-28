import React, { useEffect } from 'react';
import { useDispatch, connect } from 'react-redux';

import Header from './common/Header';
import Footer from './common/Footer';
import Pages from './common/Pages';
import { getUser } from '../actions/user';
import { getFilters } from '../actions/filters';
import { getNotifications } from '../actions/notifications';
import { unSetModal } from '../actions/modal';

const App = ({user}) => {
  const dispatch = useDispatch();

  useEffect(_ => {
    dispatch(getUser());
    dispatch(getFilters());
    dispatch(unSetModal());
  }, []);

  useEffect(() => {
    if (user.isLogged) {
      dispatch(getNotifications());
    }
  }, [user])

  return (
    <div className="l-wrap" id="js-wrap">
      <Header />
      <Pages />
      <Footer />
    </div>
  );
}

const mapStateToProps = (state) => ({
  user: state.user
});

export default connect(mapStateToProps)(App);
