import React, { useState, useEffect } from 'react';
import { connect } from 'react-redux';

import { accessTable } from '../constants/routes';

const requireAuth = (ComposedComponent) => {
  const Authenticate = (props) => {
    const [canAccess, setCanAccess] = useState(false);
    const { user, match } = props;

    useEffect(_ => {
      if (Object.keys(user).length && !user.isLogged) {
        props.history.push('/login');

        window.location.reload();
      }

      if (Object.keys(user).length && user.isLogged) {
        const accessPages = accessTable
          .filter(el => Object.keys(el).includes(user.userData.accountType))
          .map(el => Object.values(el))
          .flat(2);

        if (!accessPages.includes(match.path)) {
          props.history.push('/app/profile');
        } else {
          setCanAccess(true);
        }
      }
    }, [user]);

    return (
      canAccess ? <ComposedComponent {...props} /> : null
    );
  }

  const mapStateToProps = (state) => ({
    user: state.user
  });

  return connect(mapStateToProps)(Authenticate);
}

export default requireAuth;
