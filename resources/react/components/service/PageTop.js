import React, { useState } from 'react';
import scrollIntoView from 'smooth-scroll-into-view-if-needed';
import { useScrollPosition } from '@n8tb1t/use-scroll-position';

import Button from '../common/Button';
import { values } from '../../constants/config';
import { state } from '../../constants/state';

const PageTop = _ => {
  const [hideOnScroll, setHideOnScroll] = useState(false);

  useScrollPosition(({ prevPos, currPos }) => {
    const offset = 100;
    const isShow = -currPos.y > (values.mvHeight + offset);

    if (isShow !== hideOnScroll) {
      setHideOnScroll(isShow);
    }
  }, [hideOnScroll]);

  const handleClick = _ => {
    const elemRoot = document.querySelector('#root');

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

export default PageTop;
