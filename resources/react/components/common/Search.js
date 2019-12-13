import React, { useState } from 'react';

import Button from '../common/Button';
import Input from '../common/Input';

const Search = _ => {
  const [searchValue, setSearchValue] = useState('');

  const handleSubmit = _ => {
    console.log('[submitted]');
  }

  const handleChange = e => {
    setSearchValue(e.target.value);
  }

  return (
    <form className="form" onSubmit={_ => handleSubmit()}>
      <div className="form__group form__group--search">
        <Input className="input--search"
          value={searchValue}
          onChange={e => handleChange(e)}
          name="search"
          type="search"
          placeholder="キーワードで検索" />
        <div className="form__group-append">
          <Button className="button--link" type="submit">
            <i className="icon icon-search text-dark-yellow"></i>
          </Button>
        </div>
      </div>
    </form>

  );
}

export default Search;
