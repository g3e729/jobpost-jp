// can only read .env MIX_
export const config = {
  api: {
    url: (process.env.NODE_ENV === 'development')
      ? process.env.MIX_REACT_APP_LOCALHOST
      : process.env.MIX_REACT_APP_PRODUCTION
  }
}

export const values = {
  mvHeight: 660
};

export const defaultSelectStyles = {
  container: (provided, { selectProps: { isForm }}) => (
    isForm ? {
      ...provided,
      margin: '-17px -18px',
      height: '61px',
      flex: '1'
    } : {...provided}
  ),
  control: (provided, { selectProps: { isForm, height }}) => ({
    ...provided,
    borderWidth: isForm ? 'none' : '1px',
    borderRadius: '0',
    height: isForm ? '100%' : ( height || 'auto'),
  }),
  indicatorSeparator: _ => ({
    display: 'none',
  }),
  dropdownIndicator: _ => ({
    display: 'none',
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

export const jobSelectStyles = {
  ...defaultSelectStyles,
  dropdownIndicator: (provided, state) => ({
    ...provided,
    transition: 'transform .25s ease',
    transform: state.selectProps.menuIsOpen ? 'rotate(180deg)' : null
  }),
};

export const jobAltSelectStyles = {
  ...jobSelectStyles,
  container: (provided) => ({
    ...provided,
    margin: '-12px -22px',
    height: '50px',
    flex: '1'
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

export const modalStyles = {
  content : {
    top: '50%',
    left: '50%',
    right: 'auto',
    bottom: 'auto',
    transform: 'translate(-50%, -50%)',

    marginRight: '-50%',
    padding: '0',
    width: '700px',

    borderRadius: '0',

    overflow: 'visible',
    zIndex: '9999'
  }
};

export const modalType = {
  JOB_APPLY: 'job_apply', // route: job:id
  JOB_DELETE: 'job_delete', // route: dashboard/recruitment
  JOB_STOP: 'job_stop', // route: dashboard/recruitment

  STUDENT_SCOUT: 'student_scout', // route: scouts

  PROFILE_AVATAR: 'profile_avatar', // route: profile/edit
  PROFILE_EYECATCH: 'profile_eyecatch', // route: profile/edit
  PROFILE_WORK: 'profile_work', // route: profile/edit
  PROFILE_EDUCATION: 'profile_education', // route: profile/edit
  PROFILE_PROGRAMMING: 'profile_programming', // route: profile/edit
  PROFILE_FRAMEWORK: 'profile_framework', // route: profile/edit
  PROFILE_OTHER: 'profile_other', // route: profile/edit
  PROFILE_EXPERIENCE: 'profile_experience', // route: profile/edit
  PROFILE_PORTFOLIO: 'profile_portfolio', // route: profile/edit
}
