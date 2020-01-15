import React from 'react';
import PulseLoader from "react-spinners/PulseLoader";

const Loading = ({ className, color = '#fdb834', size = 15, margin = 5 }) => (
  <div className={`loading ${className || ''}`}>
    <PulseLoader
      color={color}
      size={size}
      margin={margin}
      loading={true}
    />
  </div>
);

export default Loading;
