import React, { useState } from 'react';
import _ from 'lodash';
import { css } from 'emotion';
import { useHistory } from 'react-router-dom';
import { useDispatch, connect } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import Loading from '../../common/Loading';
import Apply from '../../../utils/apply';
import Transantion from '../../../utils/transaction';
import { state } from '../../../constants/state';
import { prefix } from '../../../constants/routes';
import { unSetModal } from '../../../actions/modal';

const StudentScoutModal = ({modal}) => {
  const history = useHistory();
  const dispatch = useDispatch();
  const hasTickets = Math.random() >= 0.01 && (modal.data && modal.data.id); // TODO: change random to actual no.tickets
  const [isLoading, setIsLoading] = useState(false);
  const [ticketIndex, setTicketIndex] = useState(null);

  const handleCloseModal = _ => {
    dispatch(unSetModal());
  }

  const handleBuyTickets = _ => {
    setIsLoading(true);

    const formdata = new FormData();
    formdata.append('amount', 1000);
    formdata.append('type', 'ticket');
    formdata.append('description', '');

    Transantion.addTransaction(formdata)
      .then(result => {
        setTimeout(_ => {
          setIsLoading(false);
          handleCloseModal();
        }, 500);
      })
      .catch(error => {
        setIsLoading(false);
        handleCloseModal();

        console.log('[Transaction ERROR] :', error);
      });
  }

  const handleScout = _.debounce(_ => {
    setIsLoading(true);

    const formdata = new FormData();
    formdata.append('scouted', 1);
    formdata.append('seeker_profile_id', localStorage.getItem('seeker_id'));
    formdata.append('job_post_id', (modal.data && modal.data.id));

    Apply.scoutJob(formdata)
      .then(result => {
        localStorage.removeItem('seeker_id');

        setTimeout(_ => {
          setIsLoading(false);
          handleCloseModal();
          history.push(`${prefix}dashboard/scout`);
        }, 500);
      })
      .catch(error => {
        setIsLoading(false);
        handleCloseModal();

        console.log('[Scout ERROR] :', error);
      })
  }, 400);

  return (
    <BaseModal>
      <div className="modal__content modal__content--center">
        { hasTickets ? (
          <>
            <div className="modal__content-remain">
              残りのチケット
              <span>29
                <small>枚</small>
              </span>
            </div>
            <h3 className="modal__content-title">Y.Tさんをスカウトしました。</h3>
          </>
        ) : (
          <>
            <p className={`modal__content-desc ${css`margin-top: -8px; line-height: 2.125;`}`}>{`チケットが不足しています。
              スカウトするには購入する必要があります。`}
            </p>
            <div className="modal__content-pills">
              <Button className={`modal__content-pills-button ${ticketIndex === 1 ? state.DISABLED : 'button--pill'}`} onClick={_ => setTicketIndex(1)}>５枚</Button>
              <Button className={`modal__content-pills-button ${ticketIndex === 2 ? state.DISABLED : 'button--pill'}`} onClick={_ => setTicketIndex(2)}>10枚</Button>
              <Button className={`modal__content-pills-button ${ticketIndex === 3 ? state.DISABLED : 'button--pill'}`} onClick={_ => setTicketIndex(3)}>30枚</Button>
            </div>
          </>
        )}
      </div>
      <div className="modal__footer">
        <div className="modal__actions">
          { hasTickets ? (
            <Button className={`button--large ${css`width: 240px !important;`}`} onClick={_ => handleScout()}>メッセージをする</Button>
          ) : (
            <Button className={`button--large ${!ticketIndex ? state.DISABLED : ''} ${css`width: 240px !important;`}`}
              onClick={_ => handleBuyTickets()}
            >購入する</Button>
          )}
          <Button className="button--link modal__actions-button" onClick={_ => handleCloseModal()}>
            <>
              <i className="icon icon-cross"></i>
              キャンセル
            </>
          </Button>
        </div>
        { isLoading ? (
          <Loading className="loading--overlay"/>
        ) : null }
      </div>
    </BaseModal>
  );
}

const mapStateToProps = (state) => ({
  modal: state.modal
});

export default connect(mapStateToProps)(StudentScoutModal);
