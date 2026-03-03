class Notes {
  constructor() {
    this.addButton = document.querySelector('.note__add-button');
    this.editButton = document.querySelectorAll('.note__edit-button');
    this.deleteButton = document.querySelectorAll('.note__delete-button');
    this.saveButton = document.querySelectorAll('.note__save-button');

    this.url = roslinopediaData.root_url + '/wp-json/wp/v2/notatka/';


    this.events();
   
  }
  events() {    

    this.deleteButton.forEach(button => button.addEventListener('click', (e) => this.deleteNote(e)));
    this.editButton.forEach(button => button.addEventListener('click', (e) => this.editNote(e)));
    this.saveButton.forEach(button => button.addEventListener('click', (e) => this.saveNote(e)));
    this.addButton?.addEventListener('click', () => this.addNote());
  }


  addNote() {   

    const bindPlantId = document.querySelector('.new_note').getAttribute('plant-id');


    this.sendRequest(null, 'POST', {
      title: document.querySelector('.new_note__title').value,
      content: document.querySelector('.new_note__content').value,
      status: 'private',
      acf: {
        powiazana_roslina: [parseInt(bindPlantId, 10)]
      }
      
    });

  }

  editNote(e) {

    e.currentTarget.classList.add('btn--hidden');
    e.currentTarget.closest('.note').querySelector('.note__save-button').classList.remove('btn--hidden');

    const noteTitle = e.currentTarget.closest('.note').querySelector('.note__title');
    const noteContent = e.currentTarget.closest('.note').querySelector('.note__content');
    noteTitle.removeAttribute('readonly');
    noteContent.removeAttribute('readonly');
    noteTitle.classList.add('note__edit');
    noteContent.classList.add('note__edit');
 
  }

  saveNote(e) {
    e.currentTarget.classList.add('btn--hidden');
    e.currentTarget.closest('.note').querySelector('.note__edit-button').classList.remove('btn--hidden');

    const noteTitle = e.currentTarget.closest('.note').querySelector('.note__title');
    const noteContent = e.currentTarget.closest('.note').querySelector('.note__content');
    noteTitle.setAttribute('readonly', true);
    noteContent.setAttribute('readonly', true);
    noteTitle.classList.remove('note__edit');
    noteContent.classList.remove('note__edit');


    const noteId = e.target.closest('.note').getAttribute('note-id');
    this.sendRequest(noteId, 'PUT', {
      title: noteTitle.value,
      content: noteContent.value
    });


  }

  deleteNote(e) {
    const noteId = e.target.closest('.note').getAttribute('note-id');
  
    this.sendRequest(noteId, 'DELETE');

  }


  async sendRequest(id, method, body = null) {
    const url = (id && method !== 'POST') ? this.url + id : this.url;

    try {
    const response = await fetch(url, {
      method: method,
      headers: {
        'Content-Type': 'application/json',
        'X-WP-Nonce': roslinopediaData.nonce
      },
      body: body ? JSON.stringify(body) : null
    });
    const data = await response.json();
    if(!response.ok) {
      throw new Error(data.message);
    }
    location.reload();
    return data;
    } catch (error) {
      console.error(error);
    }

  }
}


export default Notes;