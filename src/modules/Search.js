class Search {
  constructor() {
    this.modal = document.querySelector('.search-modal');
    this.openButton = document.querySelector('.search-modal__trigger');
    this.closeButton = document.querySelector('.search-modal__close');
    this.input = document.querySelector('.search-modal__input');
    this.overlay = document.querySelector('.search-modal__overlay');
    this.typingTimeout;
    this.results = document.querySelector('.search-modal__results');
    this.spinnerLoader = document.querySelector('.spinner-loader');
    this.searchUrl = roslinopediaData.root_url + '/wp-json/roslinopedia/v1/get';
    

    if (this.openButton && this.modal) this.events();
  }

  events() {
    this.openButton?.addEventListener('click', () => this.openModal());
    this.closeButton?.addEventListener('click', () => this.closeModal());
    this.overlay?.addEventListener('click', () => this.closeModal());
    this.input?.addEventListener('input', () => {this.handleSearch(); this.showLoader();});
  }

  openModal() {
    this.modal?.classList.add('search-modal--active');
    document.documentElement.classList.add('body-no-scroll');
    setTimeout(() => this.input?.focus(), 400);
  }

  closeModal() {
    this.modal?.classList.remove('search-modal--active');
    document.documentElement.classList.remove('body-no-scroll');
    this.spinnerLoader?.classList.remove('spinner-loader--active');
    if (this.results)
      this.results.innerHTML = '';
    if (this.input)
      this.input.value = '';

  }

  handleSearch() {
    if (this.results)
      this.results.innerHTML = '';
    clearTimeout(this.typingTimeout);
    this.typingTimeout = setTimeout(() => this.showResults(), 1000);
  }

  showResults() {
    this.spinnerLoader?.classList.remove('spinner-loader--active');
   
    if(this.input?.value) {
      this.fetchResults();
    }


  }

  async fetchResults() {
    const term = encodeURIComponent(this.input?.value || '');

    const response = await fetch(this.searchUrl + '?search=' + term);
    const data = await response.json();
    const { plants = [], posts = [] } = data;

        if(plants.length === 0 && posts.length === 0){
          this.showResultsHeading('Nie znaleziono wyników');
          return;
        }
   
          // Rośliny
        if (plants.length > 0) {
          this.showResultsHeading('Rośliny');
          this.showResultsItems(plants);
        }

        // Wpisy blogowe
        if (posts.length > 0) {
          this.showResultsHeading('Wpisy blogowe');
          this.showResultsItems(posts);
        }

  }

  showResultsHeading(heading) {
    const resultsHeading = document.createElement('h2');
    resultsHeading.className = 'search-modal__results-heading';
    resultsHeading.textContent = heading;
    this.results.appendChild(resultsHeading);
  }

  showResultsItems(items) {
    items.forEach(item => {
      const resultsItem = document.createElement('div');
      resultsItem.classList.add('search-modal__results-item');
      resultsItem.innerHTML = `
      <div class="search-modal__results-content">
        <a href="${item.permalink}"><h3>${item.title}</h3></a>
        ${item.content?.substring(0, 100)}...
      </div>
      <img class="search-modal__results-image" src="${item.featuredImageUrl}" alt="${item.title}">`;
      this.results.appendChild(resultsItem);
    });
  }

  showLoader() {
    this.spinnerLoader?.classList.add('spinner-loader--active');
        
  }
}

export default Search