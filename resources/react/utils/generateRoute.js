export const generateRoute = (route, params) => {
  let path = route.split('/');

  path.forEach((p, i) => {
    if (p.includes(':')) {
      p = p.replace(':', '');
      path[i] = params[p];
    }
  });

  return path.join('/');
};
