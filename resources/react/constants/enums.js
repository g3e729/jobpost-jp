export const values = {
  mvHeight: 660
};

export const selectStyles = {
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
