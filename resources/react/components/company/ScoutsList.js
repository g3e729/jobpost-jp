import React, { useEffect, useState } from 'react';
import { useHistory } from 'react-router-dom';
import { useDispatch, connect } from 'react-redux';

import Button from '../common/Button';
import { state } from '../../constants/state';
import { routes } from '../../constants/routes';
import { modalType } from '../../constants/config';
import { setModal } from '../../actions/modal';

import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const ScoutsList = (props) => {
  const history = useHistory();
  const dispatch = useDispatch();
  const { data, filters } = props;
  const filtersData = (filters.filtersData && filters.filtersData.jobs);
  const [positions, setPositions] = useState([]);
  const [programming, setProgramming] = useState([]);
  const [frameworks, setFrameworks] = useState([]);
  const [jobsTmp, setJobsTmp] = useState([]);
  const jobsData = data.data || {};

  const handleClick = (id) => {
    dispatch(setModal(modalType.STUDENT_SCOUT, {id, text: localStorage.getItem('seeker_name')}));
  }

  const handleOpenChat = (item) => {
    history.push({
      pathname: routes.MESSAGES,
      state: { activeChannel: item.applicants.find(item => item.chat_channel).id || 0 }
    });
  }

  useEffect(_ => {
    if (filtersData) {
      setPositions(filtersData.positions);
      setProgramming(filtersData.programming_languages);
      setFrameworks(filtersData.frameworks);
    }
  }, [filtersData])

  useEffect(_ => {
    const seekerID = localStorage.getItem('seeker_id');

    setJobsTmp(jobsData
      .map(job => {
        return {
          ...job,
          isScouted: job.applicants.some(applicant => {
            return applicant.seeker_profile_id == seekerID
          })
        }
      })
      .sort((currJob, nextJob) => {
        return (currJob.isScouted === nextJob.isScouted)? 0 : currJob.isScouted ? 1 : -1;
      })
    );
  }, [jobsData])

  return (
    <ul className="scouts-list">
      { jobsTmp.map(item => (
        <li className="scouts-list__item" onMouseOver={_ => setCurrentItem(item.id)} onMouseOut={_ => setCurrentItem(null)} key={item.id}>
          <div className={`scouts ${item.isScouted ? state.ACTIVE : ''}`}>
            <div className="scouts__left">
              <div className="scouts__left-inner">
                <div className="scouts__eyecatch">
                  <div className="scouts__eyecatch-img" style={{ backgroundImage: `url("${item.cover_photo || ecPlaceholder}")` }}></div>
                </div>
              </div>
              <div className="scouts__left-inner">
                <h4 className="scouts__title">{item.title}</h4>
                <p className="scouts__desc">
                  {_.truncate(item.description, { 'length': 125, 'separator': '...'})}
                </p>
              </div>
            </div>
            <div className="scouts__right">
              <dl className={`scouts__list ${currentItem === item.id ? state.HIDDEN : ''}`}>
                { item.position ? (
                  <>
                    <dt className="scouts__list-term">ポジション</dt>
                    <dd className="scouts__list-data">{positions[item.position]}</dd>
                  </>
                ) : null }
                { item.programming_language ? (
                  <>
                    <dt className="scouts__list-term">言語</dt>
                    <dd className="scouts__list-data">{programming[item.programming_language]}</dd>
                  </>
                ) : null }
                { item.framework ? (
                  <>
                    <dt className="scouts__list-term">フレームワーク</dt>
                    <dd className="scouts__list-data">{frameworks[item.framework]}</dd>
                  </>
                ) : null }
                { item.display_prefecture ? (
                  <>
                    <dt className="scouts__list-term">エリア</dt>
                    <dd className="scouts__list-data">{item.display_prefecture}</dd>
                  </>
                ) : null }
                { item.salary ? (
                  <>
                    <dt className="scouts__list-term">フレームワーク</dt>
                    <dd className="scouts__list-data">{item.salary}万円</dd>
                  </>
                ) : null }
              </dl>
              <div className={`scouts__action ${currentItem === item.id ? state.ACTIVE : ''}`}>
                { item.isScouted ? (
                  <Button className="button--message" onClick={_ => handleOpenChat(item)}>
                    メッセージ
                  </Button>
                ) : (
                  <Button onClick={_ => handleClick(item.id)}>
                    応募する
                  </Button>
                )}
              </div>
            </div>
          </div>
        </li>
      )) }
    </ul>
  )
}

const mapStateToProps = (state) => ({
  filters: state.filters
});

export default connect(mapStateToProps)(ScoutsList);
