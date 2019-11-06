'use strict';

class ImageUpload {
  constructor(params) {
    this.selectorBrowse = params.browse;
    this.selectorFile = params.file;
    this.selectorName = params.name;
    this.selectorPreview = params.preview;
    this.elementsBrowse = document.querySelectorAll(this.selectorBrowse);
    this.elementsFile = document.querySelectorAll(this.selectorFile);
    this.elementsName = document.querySelectorAll(this.selectorName);
    this.elementsPreview = document.querySelectorAll(this.selectorPreview);
    
    this.init();
    this.initEvents();
  }
  
  init() {
    this.reader = new FileReader();
  }
  
  initEvents() {
    this.elementsBrowse.forEach(el => {
      el.addEventListener('click', (e) => {
        const fileInput = e.currentTarget.closest('[data-group]').querySelector(this.selectorFile);
        fileInput.click();
      });
    });

    this.elementsFile.forEach((el, idx) => {
      el.addEventListener('change', (e) => {
        const fileName = e.target.files[0].name;
        this.elementsName[idx].value = fileName;
  
        this.reader.onload = (ev) => {
          this.elementsPreview[idx].src = ev.target.result;
        }
        this.reader.readAsDataURL(e.target.files[0]);
      });
    })
  }
}

new ImageUpload({
  browse: '[data-avatar="browse"]',
  file: '[data-avatar="file"]',
  name: '[data-avatar="name"]',
  preview: '[data-avatar="preview"]',
});