import React, { useState } from 'react';
import { useHistory } from 'react-router-dom';

import Button from '../common/Button';
import Input from '../common/Input';
import { prefix } from '../../constants/routes';

const Search = ({placeholder = 'キーワードで検索'}) => {
  const [searchValue, setSearchValue] = useState('');
  const history = useHistory();

  const handleSubmit = e => {
    e.preventDefault();

    history.push(`${prefix}search?search=${searchValue}`);
  }

  const handleChange = e => {
    setSearchValue(e.target.value);
  }

  return (
    <form className="search" onSubmit={e => handleSubmit(e)}>
      <div className="search__group">
        <Input className="input--search"
          value={searchValue}
          onChange={e => handleChange(e)}
          name="search"
          type="search"
          placeholder={placeholder} />
        <div className="search__group-append">
          <Button className="button--link" type="submit">
            <i className="icon icon-search text-dark-yellow"></i>
          </Button>
        </div>
      </div>
    </form>
  );
}

export default Search;
