'use strict';

export default class CopyInput {
  constructor(params) {
    this.selectorButton = params.button;
    this.selectorCopy = params.copy;
    this.selectorGroup = params.group;
    this.selectorRemove = params.remove;
    this.elementButton = document.querySelector(this.selectorButton);
    this.elementCopy = document.querySelector(this.selectorCopy);
    this.elementGroup = document.querySelector(this.selectorGroup);

    if (this.elementCopy) {
      this.init();
      this.initEvents();
    }
  }

  init() {
    this.next = 1;
    this.iterate = this.elementCopy.dataset.iterate;
    this.elementLast = this.elementGroup;

    $.fn.datepicker.defaults.format = 'yyyy-mm';
    $.fn.datepicker.defaults.viewMode = 'months';
    $.fn.datepicker.defaults.minViewMode = 'months';
  }

  initEvents() {
    this.elementButton.addEventListener('click', (e) => {
      e.preventDefault();

      const elementTpl = document.createElement('template');
      let htmlString = `<div class="form-group row"><div class="col-3 py-4 mx-auto">
        <button type="button" id="js-group-remove${this.next}" class="js-remove alt-font btn btn-danger w-100">Delete</button>
        </div></div>`;
      elementTpl.innerHTML = htmlString;
      let elementCurr = elementTpl.content.firstChild;

      let elementClone = this.elementGroup.cloneNode(true);
      elementClone.id = `js-group-input${this.next}`;
      let elementsInput = elementClone.querySelectorAll('[data-name]');

      elementsInput.forEach(el => {
        el.name = `work_history[${this.next}][${el.dataset.name}]`;
      });

      this.elementCopy.insertBefore(elementClone, this.elementLast.nextSibling);
      this.elementCopy.insertBefore(elementCurr, this.elementLast.nextSibling);
      this.elementLast = elementClone;

      let childCount = this.elementCopy.childElementCount;
      if (childCount > ((this.iterate) * 2)) {
        this.elementButton.disabled = true;
      } else if (childCount === 2) {
        this.elementLast = this.elementGroup;
      }
      else {
        this.elementButton.disabled = false;
      }

      let elementsDPicker = document.querySelectorAll('.js-datepicker');
      $(elementsDPicker).datepicker('update');

      let elementsRemove = document.querySelectorAll(this.selectorRemove);
      elementsRemove.forEach(el => {
        el.addEventListener('click', (ev) => {
          ev.preventDefault();

          let element = ev.srcElement;
          let targetId = element.id.charAt(element.id.length-1);
          let elementTarget = document.querySelector(`#js-group-input${targetId}`);

          if (elementTarget) {
            elementTarget.remove();
            element.closest('.form-group').remove();
          }

          let childCountInner = this.elementCopy.childElementCount;
          if (childCountInner <= ((this.iterate) * 2)) {
            this.elementButton.disabled = false;
          }

          this.elementLast = this.elementGroup;
        });
      });

      this.next = this.next + 1;
    });
  }
}
