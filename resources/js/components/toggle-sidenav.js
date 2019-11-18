'use strict';

export default class ToggleSidenav {
  constructor(params) {
    this.selector = params.selector;
    this.element = document.querySelector(this.selector);
    this.body = document.querySelector('body');
    this.sidebar = document.querySelector('.sidebar');
    this.window = window;

    if (this.element) {
      this.initEvents();
    }
  }

  initEvents() {
    this.element.addEventListener('click', _ => {
      this.toggleSidebar();

      if (this.body.classList.contains('sidebar-toggled')) {
        this.body.classList.remove('sidebar-toggled');
        this.sidebar.classList.remove('toggled');
      } else {
        this.body.classList.add('sidebar-toggled');
        this.sidebar.classList.add('toggled');
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

  toggleSidebar() {
    const xmlHttp = new XMLHttpRequest();
    const apiSidebar = '/admin/api/settings/sidebar';
    xmlHttp.open('GET', apiSidebar, false);
    xmlHttp.send(null);
  }
}
