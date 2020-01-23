import React, { useEffect, useState } from 'react';

import Page from '../common/Page';
import DashboardSection from './DashboardSection';
import CompanySidebar from './CompanySidebar';
import Student from '../../utils/student';

const DashboardPage = _ => {
  const [isLoading, setIsLoading] = useState(true);
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

        getAppliedStudents()
          .then(resOuter => {
            setAppliedStudents(resOuter);

            getLikedStudents()
              .then(resInner => {
                setLikedStudents(resInner);
                setIsLoading(false);
              })
              .catch(error => {
                setIsLoading(false);

                console.log('[Liked ERROR]', error);
              })

          })
          .catch(error => {
            setIsLoading(false);

            console.log('[Applied ERROR]', error);
          })
      })
      .catch(error => {
        setIsLoading(false);

        console.log('[Scouted ERROR]', error);
      })
  }, [])

  return (
    <Page>
      <div className="l-section l-section--full section">
        <div className="l-container l-container--main l-container--full">
          <CompanySidebar />
          <DashboardSection
            scouted={scoutedStudents}
            appliec={appliedStudents}
            liked={likedStudents}
            isLoading={isLoading}
          />
        </div>
      </div>
    </Page>
  );
}

export default DashboardPage;
