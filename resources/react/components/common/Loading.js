import React from 'react';
import SelfBuildingSquareSpinner from '@bit/bondz.react-epic-spinners.self-building-square-spinner';

const Loading = ({ className, color = '#fdb834', size = 50 }) => (
  <div className={`loading ${className || ''}`}>
    <SelfBuildingSquareSpinner
      color={color}
      size={size}
    />
  </div>
);

export default Loading;
