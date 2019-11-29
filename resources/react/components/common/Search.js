import React from 'react';

import Button from '../common/Button';

const Search = () => {
  return (
    <form className="form">
      <div className="form__group form__group--search">
        <input type="search" className="input input--search" placeholder="キーワードで検索" aria-describedby="js-button-search" />
        <div className="form__group-append">
          <Button className="button--link"
            type="submit"
            id="js-button-search"
            value={<i className="icon icon-search text-dark-yellow"></i>}
          />
        </div>
      </div>
    </form>
  )
}

export default Search;
