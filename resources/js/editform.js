import ImageUpload from './components/image-upload';
import CopyInput from './components/copy-input';

new ImageUpload({
  browse: '[data-avatar="browse"]',
  file: '[data-avatar="file"]',
  name: '[data-avatar="name"]',
  preview: '[data-avatar="preview"]',
  delete: '[data-avatar="delete"]',
});

new CopyInput({
  button: '#js-group-add',
  copy: '#js-group-copy',
  group: '#js-group-input0',
  remove: '.js-remove',
});
