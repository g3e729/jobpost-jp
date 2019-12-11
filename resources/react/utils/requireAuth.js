import React, { useEffect } from 'react';
import { connect } from 'react-redux';

const requireAuth = (ComposedComponent) => {
  const Authenticate = (props) => {
    const { user } = props;

    useEffect(_ => {
      if (Object.keys(user).length && !user.isLogged) {
        props.history.push('/login');

        window.location.reload();
      }
    }, [user]);

    return (
      <ComposedComponent {...props} />
    );
  }

  const mapStateToProps = (state) => ({
    user: state.user
  });

  return connect(mapStateToProps)(Authenticate);
}

export default requireAuth;
