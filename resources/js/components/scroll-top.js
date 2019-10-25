'use strict';
import $ from 'jquery';

export default class ScrollTop {
  constructor(params) {
    this.selector = params.selector;
    this.$htmlbody = $('html, body');
    this.$document = $(document);
    this.$element = $(this.selector);

    this.initEvents();
  }

  initEvents() {
    this.$document.on('scroll', (e) => {
      let scrollDistance = $(e.target).scrollTop();
      if (scrollDistance > 100) {
        this.$element.fadeIn();
      } else {
        this.$element.fadeOut();
      }
    });

    this.$document.on('click', this.selector, (e) => {
      this.$htmlbody.stop().animate({
        scrollTop: ($(this.$element.attr('href')).offset().top)
      }, 1000);

      e.preventDefault();
    });
  }
}