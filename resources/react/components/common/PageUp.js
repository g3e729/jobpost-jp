import React from 'react';

import scrollIntoView from 'smooth-scroll-into-view-if-needed';
import Button from './Button';

const PageUp = () => {
  const handleClick = _ => {
    const elemRoot = document.querySelector('#root');

    setTimeout(() => {
      scrollIntoView(elemRoot, { block: 'start',  behavior: 'smooth' });
    }, 5);
  }

  return (
    <div className="pageup u-show-sp">
      <Button className="button--link pageup__button"
        onClick={() => handleClick()}
        value={
          <React.Fragment>
            <span className="pageup__icon"></span>PAGE TOP
          </React.Fragment>
        }
      />
    </div>
  );
}

export default PageUp;
