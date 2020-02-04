import React, { useState, useEffect } from 'react';
import _ from 'lodash';
import { connect } from 'react-redux';

import Page from '../common/Page';
import Four0FourPage from '../common/404';
import Heading from '../common/Heading';
import Loading from '../common/Loading';
import Profile from '../profile/Profile';
import CompanyAPI from '../../utils/company';
import isValidUrl from '../../utils/isvalidurl';

import avatarPlaceholder from '../../../img/avatar-default.png';
import ecPlaceholder from '../../../img/eyecatch-default.jpg';

const CompanyPage = (props) => {
  const [company, setCompany] = useState({});
  const [hasLiked, setHasLiked] = useState(false);
  const [isLoading, setIsLoading] = useState(true);
  const { user } = props;

  async function getCompany() {
    const companyId = props.match.params.id;
    const request = await CompanyAPI.getCompany(companyId);

    return request.data;
  }

  useEffect(_ => {
    getCompany()
      .then(res => {
        setCompany(res);
        setIsLoading(false);
      })
      .catch(error => {
        setIsLoading(false);

        console.log('[Company detail ERROR]', error);
      });
  }, []);

  useEffect(() => {
    if (user.isLogged && !_.isEmpty(company)) {
      const { userData } = user;

      setHasLiked(company.likes.some(like => {
        return like.liker_id == userData.api_token
      }));
    }
  }, [user, company])

  return (
    <Page>
      { isLoading ? (
        <Loading className="loading--full" />
      ) : (
        company.code != 404 ? (
          <>
            <Heading type="user"
              style={{ backgroundImage: `url("${company.cover_photo || ecPlaceholder}")` }}
              isOwner="false"
              isLogged={user.isLogged}
              accountType="company"
              title={company.display_name}
              subTitle={
                isValidUrl(company.homepage) ? (
                  <a className="button button--profile" href={company.homepage} target="_blank">{company.homepage}</a>
                ) : company.homepage
              }
              passedFunction={_ => getCompany().then(res => setCompany(res))}
              hasLiked={hasLiked}
              hasScouted={true}
              data-avatar={company.avatar || avatarPlaceholder}
              data-likes={company.likes_count}
            />
            <div className="l-section l-section--profile section">
              <div className="l-container">
                <Profile user={company} accountType="company" isOwner="false" />
              </div>
            </div>
          </>
        ) : <Four0FourPage />
      )}
    </Page>
  );
}

const mapStateToProps = (state) => ({
  user: state.user
});

export default connect(mapStateToProps)(CompanyPage);
