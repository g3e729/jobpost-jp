import React from 'react';
import scrollIntoView from 'smooth-scroll-into-view-if-needed';

import Button from './Button';

const PageUp = _ => {
  const handleClick = _ => {
    const elemRoot = document.querySelector('#root');

    setTimeout(_ => {
      scrollIntoView(elemRoot, { block: 'start',  behavior: 'smooth' });
    }, 5);
  }

  return (
    <div className="pageup u-show-sp">
      <Button className="button--link pageup__button" onClick={_ => handleClick()}>
        <span className="pageup__icon"></span>PAGE TOP
      </Button>
    </div>
  );
}

export default PageUp;
