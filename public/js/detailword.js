Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
new Vue({
	el: '#demo',

	ready: function () {
		this.word.name = document.getElementById('name').innerHTML;
		this.oldInfo = this.word.newInfo;
		this.getBooks();
	},

	data: {
		word: {
			name: '' ,
			newInfo: ''
		},
		oldInfo: '',
		book: {
			title: '',
			text: ''
		},
		books: []
	},

	computed: {
		errors: function() {
			return this.word.newInfo == this.oldInfo;
		},
		filled: function() {
			return (this.book.title=='')||(this.book.text=='');
		}
	},

	methods: {
		onSubmitInfo: function(e) {
			e.preventDefault();
			var word = this.word;
			this.$http.post('/api/v1/update',word);
			this.oldInfo = word.newInfo;
		},
		getBooks: function() {
			var param = '/api/v1/book/'+this.word.name;
			this.$http.get(param, function(books) {
				this.$set('books',books);
			});
		},
		onSubmitBook: function(e) {
			e.preventDefault();
			var book = this.book;
			book.name = this.word.name;
			this.$http.post('/api/v1/book/store',book);
			this.books.push(this.book);
			this.book = { title: '', text: '' };
		},
	}

});