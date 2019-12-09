// can only read .env MIX_
export const config = {
  api: {
    url: process.env.MIX_REACT_APP_API_URL || 'http://localhost:8000/api/v1'
  }
}
