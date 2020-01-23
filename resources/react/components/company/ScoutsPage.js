import React, { useEffect } from 'react';
import { useHistory } from 'react-router-dom';


import Page from '../common/Page';
import Heading from '../common/Heading';
import ScoutsSection from './ScoutsSection';
import { prefix } from '../../constants/routes';

const ScoutsPage = _ => {
  const history = useHistory();

  useEffect(_ => {
    if (!localStorage.getItem('scout_id')) {
      history.push(`${prefix}dashboard/scout`);
    }
  }, [])

  return (
    <Page>
      <Heading type={null}
        title="SCOUT"
        subTitle="スカウト"
      />
      <div className="l-section l-section--main section">
        <div className="l-container">
          <ScoutsSection />
        </div>
      </div>
    </Page>
  );
}

export default ScoutsPage;
