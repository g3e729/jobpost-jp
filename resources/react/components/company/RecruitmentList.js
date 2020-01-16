import React, { useState, useEffect } from 'react';
import { Link, useHistory } from 'react-router-dom';
import { useDispatch, connect } from 'react-redux';

import Button from '../common/Button';
import Fraction from '../common/Fraction';
import Loading from '../common/Loading';
import Nada from '../common/Nada';
import Pagination from '../common/Pagination';
import generateRoute from '../../utils/generateRoute';
import { routes } from '../../constants/routes';
import { state } from '../../constants/state';
import { modalType } from '../../constants/config';
import { setModal } from '../../actions/modal';

import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const RecruitmentList = (props) => {
  const history = useHistory();
  const urlParams = new URLSearchParams(history.location.search);
  const dispatch = useDispatch();
  const { myJobs, isLoading } = props;
  const [statusIndex, setStatusIndex] = useState(0);
  const data = myJobs.myJobsData || {};
  const jobsData = data.data || {};

  const handleJobDelete = (id) => {
    dispatch(setModal(modalType.JOB_DELETE));
  }

  const handleJobStop = (id) => {
    dispatch(setModal(modalType.JOB_STOP));
  }

  const handleStatusTab = index => {
    setStatusIndex(index);

    if (index !== 0) {
      const urlIndex = index === 1 ? index : 0;

      history.push(`${history.location.pathname}?status=${urlIndex}`);
    } else {
      history.push(history.location.pathname);
    }
  }

  useEffect(_ => {
    const status = urlParams.get('status');

    setStatusIndex(
      status == 0 ? 2 :
      (status == 1 ? 1 : 0)
    );
  }, [history.location])

  return (
    <div className="recruitment-list__container">
      <h3 className="recruitment-list__title">募集一覧</h3>
      <div className="recruitment-list__action">
        <ul className="recruitment-list__actions">
          <li className="recruitment-list__actions-item">
            <Link to={routes.RECRUITMENT_ADD} className="button button--icon">
              <>
                <i className="icon icon-plus"></i>
                新規作成
              </>
            </Link>
          </li>
          <li className="recruitment-list__actions-item">
            <Button className={`button--link recruitment-list__actions-item-button ${statusIndex === 0 ? state.ACTIVE : ''}`} onClick={_ => handleStatusTab(0)}>
              すべて
            </Button>
          </li>
          <li className="recruitment-list__actions-item">
            <Button className={`button--link recruitment-list__actions-item-button ${statusIndex === 1 ? state.ACTIVE : ''}`} onClick={_ => handleStatusTab(1)}>
              募集中
            </Button>
          </li>
          <li className="recruitment-list__actions-item">
            <Button className={`button--link recruitment-list__actions-item-button ${statusIndex === 2 ? state.ACTIVE : ''}`} onClick={_ => handleStatusTab(2)}>
              停止中
            </Button>
          </li>
        </ul>
        <Fraction numerator={jobsData.length}
          denominator={data.total}
        />
      </div>
      { isLoading ? (
        <Loading />
      ) : (
        jobsData.length ? (
          <>
            <ul className="recruitment-list">
              <li className="recruitment-list__item recruitment-list__item--header">
                <div className="recruitment-list__item-wrapper">
                  <span className="recruitment-list__item-label">タイトル</span>
                  { statusIndex === 0 ? <span className="recruitment-list__item-label">ステータス</span> : null }
                  <span className="recruitment-list__item-label">応募数</span>
                  <span className="recruitment-list__item-label">お気に入り数</span>
                </div>
              </li>
              { jobsData.map(job => (
              <li className="recruitment-list__item" key={job.id}>
                <div className="recruitment-list__item-wrapper">
                  <div className="recruitment-list__item-column">
                    <div className="recruitment-list__item-column-left">
                      <div className="recruitment-list__item-column-eyecatch">
                        <div className="recruitment-list__item-column-eyecatch-img" style={{ backgroundImage: `url("${job.cover_photo || ecPlaceholder}")` }}></div>
                      </div>
                    </div>
                    <div className="recruitment-list__item-column-right">
                      <Link to={generateRoute(routes.JOB_DETAIL, { id: job.id })}
                        className="button button--link">
                        <h4 className="recruitment-list__item-column-title">
                          {job.title}
                        </h4>
                      </Link>

                      <div className="recruitment-list__item-column-actions">
                        <Link to={generateRoute(routes.RECRUITMENT_EDIT, { id: job.id })} className="button button--link recruitment-list__item-column-actions-button">
                          <>
                            <i className="icon icon-pencil"></i>
                            編集
                          </>
                        </Link>
                        <Button className="button--link recruitment-list__item-column-actions-button" onClick={_ => handleJobDelete(job.id)}>
                          <>
                            <i className="icon icon-cross"></i>
                            削除
                          </>
                        </Button>
                      </div>
                    </div>
                  </div>
                  { statusIndex === 0 ? (
                    <div className="recruitment-list__item-column">
                      <Button className="button--link " onClick={_ => handleJobStop(job.id)}>
                        <span className="recruitment-list__item-column-status">
                          募集中
                        </span>
                      </Button>
                      {/* <span className="recruitment-list__item-column-status is-disabled">停止する</span> */}
                    </div>
                  ) : null }
                  <div className="recruitment-list__item-column">
                    <span className="recruitment-list__item-column-applicants">
                      {job.applicants_count}
                    </span>
                  </div>
                  <div className="recruitment-list__item-column">
                    <span className="recruitment-list__item-column-favorites">
                      {job.likes_count}
                    </span>
                  </div>
                </div>
              </li>
              )) }
            </ul>
            <div className="recruitment-list__pagination">
              <Pagination
                current={data.current_page}
                prevPage={data.prev_page_url}
                nextPage={data.next_page_url}
                lastPage={data.last_page}
              />
            </div>
          </>
        ) : <Nada>条件を変えて探してみましょう。</Nada>
      )}
    </div>
  );
}

const mapStateToProps = (state) => ({
  myJobs: state.myJobs
});

export default connect(mapStateToProps)(RecruitmentList);
