'use strict';

export default class ToggleSidenav {
  constructor(params) {
    this.selector = params.selector;
    this.element = document.querySelector(this.selector);
    this.body = document.querySelector('body');
    this.sidebar = document.querySelector('.sidebar');
    this.window = window;

    this.initEvents();
  }

  initEvents() {
    this.element.addEventListener('click', _ => {
      this.body.classList.toggle('sidebar-toggled');
      this.sidebar.classList.toggle('toggled');

      if (this.sidebar.classList.contains('toggled')) {
        this.sidebar.querySelector('.collapse').classList.remove('show');
      }
    });

    this.window.addEventListener('resize', _ => {
      if (this.window.innerWidth < 768) {
        this.sidebar.querySelector('.collapse').classList.remove('show');
      }
    });
  }
}