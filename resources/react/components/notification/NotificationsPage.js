import React from 'react';
import { connect } from 'react-redux';

import Page from '../common/Page';
import Heading from '../common/Heading';
import NotificationsSection from './NotificationsSection';
import PageUp from '../common/PageUp';

const NotificationsPage = ({notifications}) => {
  const data = notifications.notificationsData || {};
  const notificationsData = (data.notifications && data.notifications.data) || {};

  return (
    <Page>
      <Heading type={null}
        title="NOTIFICATIONS"
        subTitle="お知らせ"
      />
      { notificationsData.length ? (
        <div className="l-section l-section--notifications section">
          <div className="l-container">
            <NotificationsSection data={notificationsData} />
          </div>
        </div>
      ) : null }
      <PageUp />
    </Page>
  );
}

const mapStateToProps = (state) => ({
  notifications: state.notifications
});

export default connect(mapStateToProps)(NotificationsPage);
