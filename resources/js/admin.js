import ScrollTop from './components/scroll-top';
import ToggleSidenav from './components/toggle-sidenav';
import ImageUpload from './components/image-upload';

new ScrollTop({selector: '#js-scroll-top'});
new ToggleSidenav({selector: '#js-sidebar-toggle'});
new ImageUpload({
  browse: '[data-avatar="browse"]',
  file: '[data-avatar="file"]',
  name: '[data-avatar="name"]',
  preview: '[data-avatar="preview"]',
  hidden: '[data-avatar="hidden"]',
  delete: '[data-avatar="delete"]',
});
