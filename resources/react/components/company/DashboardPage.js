import React, { useEffect, useState } from 'react';

import Page from '../common/Page';
import DashboardSection from './DashboardSection';
import CompanySidebar from './CompanySidebar';
import Student from '../../utils/student';

const DashboardPage = _ => {
  const [isScoutedLoading, setIsScoutedLoading] = useState(true);
  const [isAppliedLoading, setIsAppliedLoading] = useState(true);
  const [isLikedLoading, setIsLikedLoading] = useState(true);
  const [scoutedStudents, setScoutedStudents] = useState([]);
  const [appliedStudents, setAppliedStudents] = useState([]);
  const [likedStudents, setLikedStudents] = useState([]);

  async function getScoutedStudents() {
    const request = await Student.getFilteredStudents({scouted: 1});

    return request.data;
  }

  async function getAppliedStudents() {
    const request = await Student.getFilteredStudents({applied: 1});

    return request.data;
  }

  async function getLikedStudents() {
    const request = await Student.getFilteredStudents({liked: 1});

    return request.data;
  }

  useState(_ => {
    getScoutedStudents()
      .then(res => {
        setScoutedStudents(res);
        setIsScoutedLoading(false);
      })
      .catch(error => {
        setIsScoutedLoading(false);

        console.log('[Scouted ERROR]', error);
      })

    getAppliedStudents()
      .then(resOuter => {
        setAppliedStudents(resOuter);
        setIsAppliedLoading(false);
      })
      .catch(error => {
        setIsAppliedLoading(false);

        console.log('[Applied ERROR]', error);
      })

    getLikedStudents()
      .then(resInner => {
        setLikedStudents(resInner);
        setIsLikedLoading(false);
      })
      .catch(error => {
        setIsLikedLoading(false);

        console.log('[Liked ERROR]', error);
      })
  }, [])

  return (
    <Page>
      <div className="l-section l-section--full section">
        <div className="l-container l-container--main l-container--full">
          <CompanySidebar />
          <DashboardSection
            scouted={scoutedStudents}
            applied={appliedStudents}
            liked={likedStudents}
            isScoutedLoading={isScoutedLoading}
            isAppliedLoading={isAppliedLoading}
            isLikedLoading={isLikedLoading}
          />
        </div>
      </div>
    </Page>
  );
}

export default DashboardPage;
