Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
new Vue({
	el: '#demo',

	ready: function() {
		// this.fetchWords();
		var d = new Date()
		this.startyear = d.getUTCFullYear();
		this.startmonth = d.getUTCMonth();
		this.startday = d.getUTCDate();
		this.endyear = d.getUTCFullYear();
		this.endmonth= d.getUTCMonth();
		this.endday= d.getUTCDate();
		this.fetchWords(Date.parse(d),Date.parse(d));
	},


	data: {
		startyear : '',
		startmonth: '',
		startday: '',
		endyear : '',
		endmonth: '',
		endday: ''
	},

	methods: {
		fetchWords: function(starttime,endtime) {
			var time = { starttime: starttime, endtime: endtime };
			this.$http.post('/api/v1/time',time,function(words) {
				this.$set('words',words);
			});
		},
		onKeyUp: function(e) {
			if (e.keyCode == 13) {
				e.preventDefault();
			} else {
				var starttime = new Date();
				starttime.setDate(this.startday);
				starttime.setMonth(this.startmonth);
				starttime.setFullYear(this.startyear);
				var endtime = new Date();
				endtime.setDate(this.endday);
				endtime.setMonth(this.endmonth);
				endtime.setFullYear(this.endyear);
				if (Date.parse(endtime)>Date.parse(starttime)) {
					this.fetchWords(Date.parse(starttime),Date.parse(endtime));
				} else {
					this.fetchWords(Date.parse(starttime),Date.parse(starttime));
				}
			}
		}
	}
})