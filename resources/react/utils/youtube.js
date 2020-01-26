export default class Youtube {
  constructor(url) {
    this.url = url;
    this.hash = '';
    this.pattern = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
  }

  setHash(hash) {
    this.hash = hash;
  }

  getHash() {
    if (this.url != undefined || this.url != '') {
      const match = this.url.match(this.pattern) || 0;
      return match[2] || 0;
    }

    return 0;
  }

  isValid() {
    if (this.url != undefined || this.url != '') {
      const match = this.url.match(this.pattern);
      return !!(match && match[2].length == 11);
    }

    return false;
  }
}
