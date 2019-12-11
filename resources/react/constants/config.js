// can only read .env MIX_
export const config = {
  api: {
    url: (process.env.NODE_ENV === 'development') ? `http://localhost:${location.port}/api` : process.env.MIX_REACT_APP_API_URL
  }
}
