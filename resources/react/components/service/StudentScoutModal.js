import React from 'react';
import { css } from 'emotion';
import { useDispatch } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../common/Button';

const StudentScoutModal = _ => {
  const dispatch = useDispatch(); // TODO on other events
  const hasTickets = Math.random() >= 0.5;

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
              <Button className="button--pill modal__content-pills-button">５枚</Button>
              <Button className="button--pill modal__content-pills-button">10枚</Button>
              <Button className="button--pill modal__content-pills-button">30枚</Button>
            </div>
          </>
        )}
      </div>
      <div className="modal__footer">
        <div className="modal__actions">
          { hasTickets ? (
            <Button className={`button--large ${css`width: 240px !important;`}`}>メッセージをする</Button>
          ) : (
            <Button className={`button--large ${css`width: 240px !important;`}`}>購入する</Button>
          )}
          <Button className="button--link modal__actions-button">
            <>
              <i className="icon icon-cross"></i>
              キャンセル
            </>
          </Button>
        </div>
      </div>
    </BaseModal>
  );
}

export default StudentScoutModal;
