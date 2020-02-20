'use strict';

export default class PasswordReveal {
  constructor(params) {
    this.selectors = params.selectors;
    this.elements = document.querySelectorAll(this.selectors);

    if (this.elements) {
      this.initEvents();
    }
  }

  initEvents() {
    this.elements.forEach(el => {
      const elementInput = el.querySelector('.form-control');
      const elementButton = el.querySelector('.btn');
      const elementIcon = el.querySelector('.fas');

      elementButton.addEventListener('mousedown', _ => {
        elementInput.type = 'text';
        elementIcon.classList.replace('fa-eye', 'fa-eye-slash');
      });

      elementButton.addEventListener('mouseup', _ => {
        elementInput.type = 'password';
        elementIcon.classList.replace('fa-eye-slash', 'fa-eye')
      });
    });
  }
}
