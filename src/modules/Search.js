class Search {
  constructor() {
    this.modal = document.querySelector('.search-modal');
    this.openButton = document.querySelector('.search-modal__trigger');
    this.closeButton = document.querySelector('.search-modal__close');
    this.input = document.querySelector('.search-modal__input');
    this.overlay = document.querySelector('.search-modal__overlay');
    this.typingTimeout;
    this.resultsItem = document.querySelector('.search-modal__results-item');
    this.spinnerLoader = document.querySelector('.spinner-loader');

    if (this.openButton && this.modal) this.events();
  }

  events() {
    this.openButton?.addEventListener('click', () => this.openModal());
    this.closeButton?.addEventListener('click', () => this.closeModal());
    this.overlay?.addEventListener('click', () => this.closeModal());
    this.input?.addEventListener('keydown', () => this.handleSearch());
    this.input?.addEventListener('input', () => this.showLoader());
  }

  openModal() {
    this.modal?.classList.add('search-modal--active');
    document.documentElement.classList.add('body-no-scroll');
  }

  closeModal() {
    this.modal?.classList.remove('search-modal--active');
    document.documentElement.classList.remove('body-no-scroll');
    this.spinnerLoader?.classList.remove('spinner-loader--active');
    this.resultsItem.innerHTML = '';
    this.input.value = '';

  }

  handleSearch() {
    clearTimeout(this.typingTimeout);
    this.typingTimeout = setTimeout(() => this.showResults(this.input?.value), 2000);
  }

  showResults(value) {
    this.spinnerLoader?.classList.remove('spinner-loader--active');
    if(this.resultsItem) {
      this.resultsItem.innerHTML = value;
    }
  }

  showLoader() {
    this.spinnerLoader?.classList.add('spinner-loader--active');
   
  }
}

export default Search