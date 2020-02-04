const isValidUrl = str => {
  const pattern = new RegExp('^(http|https):\/\/[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9](?:\.[a-zA-Z]{2,})+')
  return pattern.test(str);
}

export default isValidUrl;
