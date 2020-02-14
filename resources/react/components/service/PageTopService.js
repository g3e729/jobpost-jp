import React, { useState, useEffect } from 'react';
import scrollIntoView from 'smooth-scroll-into-view-if-needed';
import { useScrollPosition } from '@n8tb1t/use-scroll-position';
import { useLocation } from 'react-router-dom';

import Button from '../common/Button';
import { values } from '../../constants/config';
import { state } from '../../constants/state';

const PageTopService = _ => {
  const location = useLocation();
  const [hideOnScroll, setHideOnScroll] = useState(false);
  const [initialPathname, setInitialPathname] = useState('');
  const [initialSearch, setInitialSearch] = useState('');
  const elemRoot = document.querySelector('#root');

  useScrollPosition(({ prevPos, currPos }) => {
    const offset = 100;
    const isShow = -currPos.y > (values.mvHeight + offset);

    if (isShow !== hideOnScroll) {
      setHideOnScroll(isShow);
    }
  }, [hideOnScroll]);

  useEffect(_ => {
    if (initialPathname !== location.pathname || (initialPathname === location.pathname && initialSearch !== location.search)) {
      setInitialPathname(location.pathname);
      setInitialSearch(location.search);
    }
  }, [location])

  const handleClick = _ => {
    setTimeout(_ => {
      scrollIntoView(elemRoot, { block: 'start',  behavior: 'smooth' });
    }, 5);
  }

  return (
    <div className={`pagetop ${hideOnScroll ? state.ACTIVE : ''}`}>
      <Button className="button--link" onClick={_ => handleClick()}>
        <span className="pagetop__icon"></span>
      </Button>
    </div>
  );
}

export default PageTopService;
