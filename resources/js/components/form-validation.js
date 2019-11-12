'use strict';
import $ from 'jquery';

export default class FormValidation {
  constructor(params) {
    this.selector = params.selector;
    this.element = document.querySelector(this.selector);

    this.init();
    this.initEvents();
  }

  init() {
    this.actions = this.element.querySelectorAll('[data-action]');
  }

  initEvents() {
    this.element.addEventListener('submit', (e) => {
      this.actions.forEach(el => {
        if (el.dataset.action === 'change') {
          el.setCustomValidity(el.value === "" ? el.dataset.text : "");
        } else if (el.dataset.action === 'input') {
          if (el.dataset.condition) {
            const condition = this.element.querySelector(`[name="${el.dataset.condition}"]`);

            el.setCustomValidity(el.value != condition.value ? el.dataset.text : "");
          } else {
            el.setCustomValidity(el.value === "" ? el.dataset.text : "");
          }
        }
      });

      if (this.element.checkValidity() === false) {
        e.preventDefault();
        e.stopPropagation();
      } else {
        $(e.target).unbind('submit').submit();
      }

      this.element.classList.add('was-validated');
    }, false);

    const inputCount = [...this.actions].reduce((a, b) => { return b.dataset.action === 'input' ? a+1 : a }, 0);
    if (inputCount) {
      this.element.addEventListener('input', _ => {
        this.actions.forEach(el => {
          if (el.dataset.condition) {
            const condition = document.querySelector(`[name="${el.dataset.condition}"]`);

            el.setCustomValidity(el.value != condition.value ? el.dataset.text : "");
          } else {
            el.setCustomValidity(el.value === "" ? el.dataset.text : "");
          }
        });
      }, false);
    }

    const changeCount = [...this.actions].reduce((a, b) => { return b.dataset.action === 'change' ? a+1 : a }, 0);
    if (changeCount) {
      this.element.addEventListener('change', _ => {
        this.actions.forEach(el => {
          el.setCustomValidity(el.value === "" ? el.dataset.text : "");
        });
      }, false);
    }
  }
}
