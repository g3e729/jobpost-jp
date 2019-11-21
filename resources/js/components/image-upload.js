'use strict';

export default class ImageUpload {
  constructor(params) {
    this.selectorBrowse = params.browse;
    this.selectorFile = params.file;
    this.selectorName = params.name;
    this.selectorPreview = params.preview;
    this.selectorHidden = params.hidden;
    this.selectorDelete = params.delete;
    this.elementsBrowse = document.querySelectorAll(this.selectorBrowse);
    this.elementsFile = document.querySelectorAll(this.selectorFile);
    this.elementsName = document.querySelectorAll(this.selectorName);
    this.elementsPreview = document.querySelectorAll(this.selectorPreview);
    this.elementsHidden= document.querySelectorAll(this.selectorHidden);
    this.elementsDelete = document.querySelectorAll(this.selectorDelete);

    this.init();
    this.initEvents();
  }

  init() {
    this.reader = new FileReader();
    this.imagePlaceholder = ['https://placehold.it/80x80', 'https://placehold.it/240x240'];
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
        this.elementsDelete[idx].removeAttribute('disabled');

        this.reader.onload = (ev) => {
          this.elementsPreview[idx].src = ev.target.result;
        }
        this.reader.readAsDataURL(e.target.files[0]);
      });
    });

    this.elementsDelete.forEach((el, idx) => {
      el.addEventListener('click', (e) => {
        e.currentTarget.setAttribute('disabled', 'disabled');

        let dataGroup = e.currentTarget.closest('[data-group]').dataset.group;
        this.elementsPreview[idx].src = dataGroup === 'avatar' ? this.imagePlaceholder[0] : this.imagePlaceholder[1];
        this.elementsName[idx].value = null;
        this.elementsFile[idx].value = '';
        this.elementsHidden[idx].value = 1;
      });

    });
  }
}
