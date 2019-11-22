import React, { Component } from 'react';

class Search extends Component {
  render() {
    return (
      <form className="form">
        <div className="form__group form__group--search">
          <input type="search" className="input input--search" placeholder="キーワードで検索" aria-describedby="js-button-search" />
          <div className="form__group-append">
            <button type="submit" className="button button--link" id="js-button-search">
              <i className="icon icon-search text-orange"></i>
            </button>
          </div>
        </div>
      </form>
    )
  }
}

export default Search;
