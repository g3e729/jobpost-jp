import React from 'react';
import { connect } from 'react-redux';
import { Link } from 'react-router-dom';

import Fraction from '../common/Fraction';
import Pagination from '../common/Pagination';
import ScoutsList from './ScoutsList';
import { routes } from '../../constants/routes';

const ScoutsSection = (props) => {
  const {
    user,
    data
  } = props;
  const tickets = (user.userData && user.userData.profile && user.userData.profile.available_tickets) || 0;

  return (
    <div className="scouts-section">
      <div className="scouts-section__top">
        <div className="scouts-section__top-info">
          <Link className="button button--pill scouts-section__top-button" to={routes.SCOUT}>
            <span><i className="icon icon-back-curve text-dark-gray"></i>キャンセルする</span>
          </Link>
          <div className="scouts-section__top-info-remain">
            残りのチケット
            { tickets > 0 ? (
              <>
                <span>{tickets}<small>枚</small></span>
                <i className="icon icon-arrow-right"></i>
                <span>{tickets - 1}<small>枚</small></span>
              </>
            ) : (
              <span>{tickets}<small>枚</small></span>
            )}
          </div>
        </div>
        <h3 className="scouts-section__top-title">スカウトする募集の選択</h3>
        <Fraction numerator={data.data && data.data.length}
          denominator={data.total}
        />
      </div>
      <div className="scouts-section__content">
        <ScoutsList data={data} />
      </div>
      <div className="scouts-section__footer">
        <Pagination
          current={data.current_page}
          prevPage={data.prev_page_url}
          nextPage={data.next_page_url}
          lastPage={data.last_page}
        />
      </div>
    </div>
  );
}

const mapStateToProps = (state) => ({
  user: state.user
});

export default connect(mapStateToProps)(ScoutsSection);
