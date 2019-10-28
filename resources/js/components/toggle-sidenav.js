'use strict';


export default class ToggleSidenav {
  constructor(params) {
    this.selector = params.selector;
    this.element = document.querySelector(this.selector);
    this.body = document.querySelector('body');
    this.sidebar = document.querySelector('.sidebar');
    this.window = window;

    this.init();
    this.initEvents();
  }

  init() {
    if (!localStorage.getItem('sidebar-state')) {
      localStorage.setItem('sidebar-state', 'open');
    }

    if (localStorage.getItem('sidebar-state') && localStorage.getItem('sidebar-state') === 'close') {
      this.body.classList.add('sidebar-toggled');
      this.sidebar.classList.add('toggled');
    }
  }

  initEvents() {
    this.element.addEventListener('click', _ => {
      if (this.body.classList.contains('sidebar-toggled')) {
        this.body.classList.remove('sidebar-toggled');
        this.sidebar.classList.remove('toggled');

        localStorage.setItem('sidebar-state', 'open');
      } else {
        this.body.classList.add('sidebar-toggled');
        this.sidebar.classList.add('toggled');

        localStorage.setItem('sidebar-state', 'close');
      }

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