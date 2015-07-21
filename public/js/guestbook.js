new Vue({
	el: '#demo',

	ready: function() {
		// this.fetchWords();
	},


	data: {
		sortKey : '',
		reverse: false,
		search: ''
	},

	methods: {
		sortBy: function(sortKey) {
			this.reverse = (this.sortKey == sortKey) ? ! this.reverse : false;
			this.sortKey = sortKey;
		},
		fetchWords: function() {
			var param = '/api/v1/search/'+this.search;
			this.$http.get(param, function(words) {
				this.$set('words',words);
			});
		},
		onKeyUp: function(e) {
			if (e.keyCode == 13) {
			} else {
				this.fetchWords();
			}
		}
	}
})