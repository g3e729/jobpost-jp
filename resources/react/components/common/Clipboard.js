import React, { useState } from 'react';
import { CopyToClipboard } from 'react-copy-to-clipboard';
import { css } from 'emotion';

import Button from './Button';

const Clipboard = ({ value }) => {
  const [copied, setCopied] = useState(false);

  return (
    <Button className="button--link">
      <CopyToClipboard text={value}
        onCopy={_ => {
          setCopied(true);

          console.log('[Copy text]', value);
        }}>
        <i className={`icon icon-duplicate text-dark-yellow ${css`font-size: 12px`}`}></i>
      </CopyToClipboard>
    </Button>
  );
}

export default Clipboard;
