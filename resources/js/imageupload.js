'use strict';

class ImageUpload {
  constructor(params) {
    this.selectorBrowse = params.browse;
    this.selectorFile = params.file;
    this.selectorName = params.name;
    this.selectorPreview = params.preview;
    this.elementBrowse = document.querySelector(this.selectorBrowse);
    this.elementFile = document.querySelector(this.selectorFile);
    this.elementName = document.querySelector(this.selectorName);
    this.elementPreview = document.querySelector(this.selectorPreview);

    this.init();
    this.initEvents();
  }

  init() {
    this.reader = new FileReader();
  }

  initEvents() {
    this.elementBrowse.addEventListener('click', (e) => {
      const fileInput = e.currentTarget.closest('[data-group]').querySelector(this.selectorFile);
      fileInput.click();
    });

    this.elementFile.addEventListener('change', (e) => {
      const fileName = e.target.files[0].name;
      this.elementName.value = fileName;

      this.reader.onload = (ev) => {
        this.elementPreview.src = ev.target.result;
      }
      this.reader.readAsDataURL(e.target.files[0]);
    });
  }
}

new ImageUpload({
  browse: '#js-avatar-browse',
  file: '#js-avatar-file',
  name: '#js-avatar-name',
  preview: '#js-avatar-preview',
});