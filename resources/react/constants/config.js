// can only read .env MIX_
export const config = {
  api: {
    url: (process.env.NODE_ENV === 'development')
      ? (process.env.MIX_REACT_APP_LOCALHOST
        ? `http://${process.env.MIX_REACT_APP_LOCALHOST}:${location.port}/api`
        : `http://localhost:${location.port}/api`)
      : process.env.MIX_REACT_APP_API_URL_FULL
  }
}

export const values = {
  mvHeight: 660
};

export const jobSelectStyles = {
  control: (provided) => ({
    ...provided,
    borderWidth: '1px',
    borderRadius: '0',
  }),
  indicatorSeparator: _ => ({
    display: 'none',
  }),
  dropdownIndicator: (provided, state) => ({
    ...provided,
    transition: 'transform .25s ease',
    transform: state.selectProps.menuIsOpen ? 'rotate(180deg)' : null
  }),
  menu: (provided) => ({
    ...provided,
    borderWidth: '0',
    borderRadius: '0',
    marginTop: '2px',
    boxShadow: '0px 6px 20px 0px rgba(0, 0, 0, 0.21)',
  }),
  option: (styles, { isSelected }) => {
    return {
      ...styles,
      backgroundColor: isSelected
        ? 'rgba(250, 191, 20, 0.5)'
        : null,
      ':hover': {
        backgroundColor: '#fdb834',
        color: '#ffffff',
      },
      cursor: 'pointer',
    };
  },
  valueContainer: (provided) => ({
    ...provided,
    padding: '4px 0 4px 12px',
    letterSpacing: '0.06em',
  }),
};

export const dashboardSelectStyles =  {
  control: (provided, { selectProps: { width }}) => ({
    ...provided,
    borderWidth: '0',
    borderRadius: '0',
    minHeight: 'auto',
    maxHeight: '30px',
    backgroundColor: '#f2f2f0',
    width: width,
  }),
  placeholder: (provided) => ({
    ...provided,
    width: '100%',
  }),
  indicatorSeparator: _ => ({
    display: 'none',
  }),
  indicatorsContainer: (provided) => ({
    ...provided,
    margin: '-8px 0',
  }),
  dropdownIndicator: (provided, state) => ({
    ...provided,
    transition: 'transform .25s ease',
    transform: state.selectProps.menuIsOpen ? 'rotate(180deg)' : null
  }),
  menu: (provided) => ({
    ...provided,
    borderWidth: '0',
    borderRadius: '0',
    marginTop: '2px',
    boxShadow: '0px 6px 20px 0px rgba(0, 0, 0, 0.21)',
    minWidth: '100px',
  }),
  option: (styles, { isSelected }) => {
    return {
      ...styles,
      backgroundColor: isSelected
        ? 'rgba(250, 191, 20, 0.5)'
        : null,
      ':hover': {
        backgroundColor: '#fdb834',
        color: '#ffffff',
      },
      cursor: 'pointer',
    };
  },
  valueContainer: (provided) => ({
    ...provided,
    padding: '0 0 0 12px',
    letterSpacing: '0.06em',
  }),
};
