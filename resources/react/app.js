import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router } from 'react-router-dom';

import App from './components/App';

if (navigator.appName === 'Microsoft Internet Explorer' ||  !!(navigator.userAgent.match(/Trident/) || navigator.userAgent.match(/rv:11/))) {
  document.write('Please install Google Chrome to view this site.');
}
else {
  ReactDOM.render(
    <Router>
      <App />
    </Router>,
    document.getElementById('root')
  );
}
