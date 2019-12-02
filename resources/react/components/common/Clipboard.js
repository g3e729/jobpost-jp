import React, { useState } from 'react';
import { CopyToClipboard } from 'react-copy-to-clipboard';
import { css } from 'emotion';

import Button from './Button';

const Clipboard = ({ value }) => {
  const [copied, setCopied] = useState(false);

  return (
    <Button className="button--link"
      value={
        <CopyToClipboard text={value}
          onCopy={() => setCopied(true)}>
          <i className={`icon icon-duplicate text-dark-yellow ${css`font-size: 12px`}`}></i>
        </CopyToClipboard>
      }
    />
  );
}

export default Clipboard;
