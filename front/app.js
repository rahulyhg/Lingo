function ajax_postLogin(state, value) {
	return $.ajax({ method: 'post', url: `${apiUrl}/login`, data: state.loginForm, headers: {
		Authorization: state.authToken || ''
	}})
}
function ajax_postBook(state, value) {
	return $.ajax({ method: 'post', url: `${apiUrl}/books`, data: {'title':value}, headers: {
		Authorization: state.authToken || ''
	}})
}
function ajax_putSentence(state, value) {
	return $.ajax({ method: 'put', url: `${apiUrl}/sentences`, data: {'sentence':state.sentences[value],'parts':Object.entries(state.parts).filter(([id, part])=>part.sentence_id==value).map(([id,part])=>part)}, headers: {
		Authorization: state.authToken || ''
	}})
}
function ajax_deleteSentence(state, value) {
	var id = value.id
	return $.ajax({ method: 'delete', url: `${apiUrl}/sentences/${id}`, headers: {
		Authorization: state.authToken || ''
	}})
}
function ajax_postSentence(state, value) {
	return $.ajax({ method: 'post', url: `${apiUrl}/sentences`, data: {'book_id':value,'parts_original':state.newSentence.original,'parts_translation':state.newSentence.translation}, headers: {
		Authorization: state.authToken || ''
	}})
}
function ajax_deleteBook(state, value) {
	var id = value.id
	return $.ajax({ method: 'delete', url: `${apiUrl}/books/${id}`, headers: {
		Authorization: state.authToken || ''
	}})
}

const state = {
	updateHack: false,
	preloader: 0,
	l: null,
	lang: { en: {} }
}

DotObject.str('lang.en.loginForm.username', "Username", state);
DotObject.str('lang.cs.loginForm.username', "Přihlašovací jméno", state);
DotObject.str('lang.en.loginForm.password', "Password", state);
DotObject.str('lang.cs.loginForm.password', "Heslo", state);
DotObject.str('lang.en.loginForm.login', "Log in", state);
DotObject.str('lang.cs.loginForm.login', "Přihlásit se", state);
DotObject.str('lang.en.loginForm.login', "Log in", state);
DotObject.str('lang.cs.loginForm.login', "Přihlásit se", state);
DotObject.str('lang.en.loginForm.remeber', "Remember me", state);
DotObject.str('lang.cs.loginForm.remeber', "Zapamatovat", state);
DotObject.str('lang.en.newBook.title', "Book title", state);
DotObject.str('lang.cs.newBook.title', "Název knihy", state);
DotObject.str('lang.en.newBook.create', "Create book", state);
DotObject.str('lang.cs.newBook.create', "Nová kniha", state);
DotObject.str('lang.en.button.edit', "Edit", state);
DotObject.str('lang.cs.button.edit', "Upravit", state);
DotObject.str('lang.en.button.save', "Save", state);
DotObject.str('lang.cs.button.save', "Uložit", state);
DotObject.str('lang.en.button.delete', "Delete", state);
DotObject.str('lang.cs.button.delete', "Odstranit", state);
DotObject.str('lang.en.sentences.newEntire.original', "Entire sentence", state);
DotObject.str('lang.cs.sentences.newEntire.original', "Celá věta", state);
DotObject.str('lang.en.sentence.new', "New sentence", state);
DotObject.str('lang.cs.sentence.new', "Nová věta", state);
DotObject.str('lang.en.comments.show', "Show comments", state);
DotObject.str('lang.cs.comments.show', "Zobrazit komentáře", state);
DotObject.str('lang.en.comments.new', "Comment", state);
DotObject.str('lang.cs.comments.new', "Komentář", state);
DotObject.str('lang.en.comments.add', "Add comment", state);
DotObject.str('lang.cs.comments.add', "Přidat komentář", state);
DotObject.str('loginForm.username', "", state);
DotObject.str('loginForm.password', "", state);
DotObject.str('user', null, state);
DotObject.str('loginForm.remember', false, state);
DotObject.str('section', "myBooks", state);
DotObject.str('books', {}, state);
DotObject.str('newBookTitle', "", state);
DotObject.str('sentences', {}, state);
DotObject.str('parts', {}, state);
DotObject.str('editSentence', null, state);
DotObject.str('newSentence.original', "", state);
DotObject.str('deleteBook', null, state);
DotObject.str('newComment', "", state);

state.l = state.lang.en
state.focus = null

const store = new Vuex.Store({
	state,
	mutations: {
		'initFromGet': function(state, payload) {
			var queryDict = {};
			var setFromUrl = function(item) {
				[key, value] = item.split("=")
				DotObject.str(key, value, state);
			}
			document.cookie.split("; ").forEach(setFromUrl)
			location.search.substr(1).split("&").forEach(setFromUrl)
		},
		'function': function(state, payload) {
		},
		'input': function(state, payload) {
			eval(payload.path + " = \'" + payload.value + "\'");
			state.updateHack = !state.updateHack
		},
		'preloaderAdd': function(state) {
			state.preloader ++
		},
		'preloaderSub': function(state) {
			state.preloader --
		},
		'postLogin': function(state, { value, res }) {
			if (res === 0) {
				res = Math.floor(Math.random() * 1000)
			}
			state.authToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjEiLCJyb2xlIjoib3duZXIifQ.TzWZ-3ngMykt1fB5Yq2j25ErBaBZWIJI77zjAJkRwws'
			state.user = {'id':'1','role':'owner','person_id':'1'}
			state.books = res.books
			state.sentences = res.sentences
			state.parts = res.parts
			state.updateHack = !state.updateHack
		},
		'selectBook': function(state, { value, res }) {
			if (res === 0) {
				res = Math.floor(Math.random() * 1000)
			}
			state.selectedBook = value
			state.updateHack = !state.updateHack
		},
		'postBook': function(state, { value, res }) {
			if (res === 0) {
				res = Math.floor(Math.random() * 1000)
			}
			state.books[res] = {'id':'res','title':value}
			state.newBookTitle = ''
			state.selectedBook = res
			state.updateHack = !state.updateHack
		},
		'openEditSentence': function(state, { value, res }) {
			if (res === 0) {
				res = Math.floor(Math.random() * 1000)
			}
			state.editSentence = value
			state.updateHack = !state.updateHack
		},
		'putSentence': function(state, { value, res }) {
			if (res === 0) {
				res = Math.floor(Math.random() * 1000)
			}
			state.updateHack = !state.updateHack
		},
		'confirmDeleteSentence': function(state, { value, res }) {
			if (res === 0) {
				res = Math.floor(Math.random() * 1000)
			}
			state.deleteSentence = value
			state.updateHack = !state.updateHack
		},
		'deleteSentence': function(state, { value, res }) {
			if (res === 0) {
				res = Math.floor(Math.random() * 1000)
			}
			var sentences = Object.assign({}, state.sentences)
			delete sentences[value.id]
			state.sentences = sentences
			state.deleteSentence = null
			state.updateHack = !state.updateHack
		},
		'postSentence': function(state, { value, res }) {
			if (res === 0) {
				res = Math.floor(Math.random() * 1000)
			}
			state.sentences[res.sentence_id] = {'id':res.sentence_id,'book_id':value,'translation':state.newSentence.original,'note':''}
			state.parts = Object.assign(state.parts, res.parts)
			state.newSentence.original = ''
			state.updateHack = !state.updateHack
		},
		'confirmDeleteBook': function(state, { value, res }) {
			if (res === 0) {
				res = Math.floor(Math.random() * 1000)
			}
			state.deleteBook = value
			state.updateHack = !state.updateHack
		},
		'deleteBook': function(state, { value, res }) {
			if (res === 0) {
				res = Math.floor(Math.random() * 1000)
			}
			state.deleteBook = null
			state.selectedBook = null
			var books = Object.assign({}, state.books)
			delete books[value.id]
			state.books = books
			state.updateHack = !state.updateHack
		},
	},
	actions: {
		'initFromGet': function({commit, dispatch, state}, value) {
			var queryDict = {};
			var data = document.cookie.split("; ").concat(location.search.substr(1).split("&"))
			data.forEach(function(item) {
				[key, value] = item.split("=")
				queryDict[key] = value
				if (key === 'authToken') {
					dispatch('postLogin')
				}
			})
			commit('initFromGet', queryDict)
		},
		'postLogin': function({commit, state}, value) {
			commit('preloaderAdd')
			ajax_postLogin(state, value).done(res => {
				commit('postLogin', { res, value })
				commit('preloaderSub')
			}).fail(err => {

			})
		},
		'postBook': function({commit, state}, value) {
			commit('preloaderAdd')
			ajax_postBook(state, value).done(res => {
				commit('postBook', { res, value })
				commit('preloaderSub')
			}).fail(err => {

			})
		},
		'putSentence': function({commit, state}, value) {
			commit('preloaderAdd')
			ajax_putSentence(state, value).done(res => {
				commit('putSentence', { res, value })
				commit('preloaderSub')
			}).fail(err => {

			})
		},
		'deleteSentence': function({commit, state}, value) {
			commit('preloaderAdd')
			ajax_deleteSentence(state, value).done(res => {
				commit('deleteSentence', { res, value })
				commit('preloaderSub')
			}).fail(err => {

			})
		},
		'postSentence': function({commit, state}, value) {
			commit('preloaderAdd')
			ajax_postSentence(state, value).done(res => {
				commit('postSentence', { res, value })
				commit('preloaderSub')
			}).fail(err => {

			})
		},
		'deleteBook': function({commit, state}, value) {
			commit('preloaderAdd')
			ajax_deleteBook(state, value).done(res => {
				commit('deleteBook', { res, value })
				commit('preloaderSub')
			}).fail(err => {

			})
		},

	}
})

Vue.component(`LoginFormUsernameInputControl`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<input class="LoginFormUsernameInputControl form-control" type="text" @input="$store.commit('input', { path: 'state.loginForm.username', value: $event.target.value })" :value="state.loginForm.username" data-test="loginUsername"/>`
})

Vue.component(`LoginFormUsernameInputLabel`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="LoginFormUsernameInputLabel" v-text="state.l.loginForm.username"/>`
})

Vue.component(`LoginFormUsernameInput`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="LoginFormUsernameInput form-group">
		<LoginFormUsernameInputLabel :item="item" />
		<LoginFormUsernameInputControl :item="item" />

	</div>`
})

Vue.component(`LoginFormPasswordInputControl`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<input class="LoginFormPasswordInputControl form-control" type="password" @input="$store.commit('input', { path: 'state.loginForm.password', value: $event.target.value })" :value="state.loginForm.password" data-test="loginPassword"/>`
})

Vue.component(`LoginFormPasswordInputLabel`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="LoginFormPasswordInputLabel" v-text="state.l.loginForm.password"/>`
})

Vue.component(`LoginFormPasswordInput`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="LoginFormPasswordInput form-group">
		<LoginFormPasswordInputLabel :item="item" />
		<LoginFormPasswordInputControl :item="item" />

	</div>`
})

Vue.component(`LoginFormLoginRowSendLoginButton`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<button class="LoginFormLoginRowSendLoginButton btn btn-default btn btn-success" v-text="state.l.loginForm.login" data-test="loginSend" @click="$store.dispatch('postLogin', null)"/>`
})

Vue.component(`LoginFormLoginRowSend`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="LoginFormLoginRowSend col-xs-6">
		<LoginFormLoginRowSendLoginButton />

	</div>`
})

Vue.component(`LoginFormLoginRowRememberRememberInputControl`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<input class="LoginFormLoginRowRememberRememberInputControl form-control" type="checkbox" @input="$store.commit('input', { path: 'state.loginForm.remeber', value: $event.target.checked ? 1 : 0 })" :value="state.loginForm.remeber"/>`
})

Vue.component(`LoginFormLoginRowRememberRememberInputLabel`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="LoginFormLoginRowRememberRememberInputLabel" v-text="state.l.loginForm.remeber"/>`
})

Vue.component(`LoginFormLoginRowRememberRememberInput`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="LoginFormLoginRowRememberRememberInput form-group">
		<LoginFormLoginRowRememberRememberInputLabel :item="item" />
		<LoginFormLoginRowRememberRememberInputControl :item="item" />

	</div>`
})

Vue.component(`LoginFormLoginRowRemember`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="LoginFormLoginRowRemember col-xs-6">
		<LoginFormLoginRowRememberRememberInput />

	</div>`
})

Vue.component(`LoginFormLoginRow`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="LoginFormLoginRow row">
		<LoginFormLoginRowSend />
		<LoginFormLoginRowRemember />

	</div>`
})

Vue.component(`LoginForm`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="LoginForm">
		<LoginFormUsernameInput />
		<LoginFormPasswordInput />
		<LoginFormLoginRow />

	</div>`
})

Vue.component(`Login`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="Login" v-if="!(state.user)">
		<LoginForm />

	</div>`
})

Vue.component(`MyBooksListContainerBooksListItem`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBooksListContainerBooksListItem list-group-item" v-text="item.title" data-test="bookListItem" @click="$store.commit('selectBook', { value: item.id, res: null })"/>`
})

Vue.component(`MyBooksListContainerBooksList`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBooksListContainerBooksList list-group"><div v-for="(item, id) of state.books" :key="item.id" >
		<MyBooksListContainerBooksListItem :index="id" :item="item" />
</div>
	</div>`
})

Vue.component(`MyBooksListContainerNewBookTitleInputControl`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<input class="MyBooksListContainerNewBookTitleInputControl form-control" type="text" @input="$store.commit('input', { path: 'state.newBookTitle', value: $event.target.value })" :value="state.newBookTitle" data-test="newBookTitle"/>`
})

Vue.component(`MyBooksListContainerNewBookTitleInputLabel`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBooksListContainerNewBookTitleInputLabel" v-text="state.l.newBook.title"/>`
})

Vue.component(`MyBooksListContainerNewBookTitleInput`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBooksListContainerNewBookTitleInput form-group">
		<MyBooksListContainerNewBookTitleInputLabel :item="item" />
		<MyBooksListContainerNewBookTitleInputControl :item="item" />

	</div>`
})

Vue.component(`MyBooksListContainerNewBookButton`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<button class="MyBooksListContainerNewBookButton btn btn-default btn btn-primary" v-text="state.l.newBook.create" data-test="newBookCreate" @click="$store.dispatch('postBook', state.newBookTitle)"/>`
})

Vue.component(`MyBooksListContainer`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBooksListContainer" v-if="!(state.selectedBook)">
		<MyBooksListContainerBooksList />
		<MyBooksListContainerNewBookTitleInput />
		<MyBooksListContainerNewBookButton />

	</div>`
})

Vue.component(`MyBookDetailTitle`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<h1 class="MyBookDetailTitle" v-text="state.books[state.selectedBook].title"/>`
})

Vue.component(`MyBookDetailSentencesEditButtonContainerEditButton`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<button class="MyBookDetailSentencesEditButtonContainerEditButton btn btn-default" v-text="state.l.button.edit" @click="$store.commit('openEditSentence', { value: item.id, res: null })"/>`
})

Vue.component(`MyBookDetailSentencesEditButtonContainer`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesEditButtonContainer">
		<MyBookDetailSentencesEditButtonContainerEditButton :item="item" />

	</div>`
})

Vue.component(`MyBookDetailSentencesPartsContainerPartCellPartsOriginal`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesPartsContainerPartCellPartsOriginal" v-text="state.parts[item.id].original"/>`
})

Vue.component(`MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainerTranslationInputControl`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<input class="MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainerTranslationInputControl form-control" type="text" @input="$store.commit('input', { path: 'state.parts[' + item.id + '].translation', value: $event.target.value })" :value="state.parts[item.id].translation"/>`
})

Vue.component(`MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainerTranslationInputLabel`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainerTranslationInputLabel" v-text="''"/>`
})

Vue.component(`MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainerTranslationInput`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainerTranslationInput form-group">
		<MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainerTranslationInputLabel :item="item" />
		<MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainerTranslationInputControl :item="item" />

	</div>`
})

Vue.component(`MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainer`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainer" v-if="(state.editSentence == static.id)">
		<MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainerTranslationInput :item="item" />

	</div>`
})

Vue.component(`MyBookDetailSentencesPartsContainerPartCellPartsTranslation`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesPartsContainerPartCellPartsTranslation" v-if="(state.editSentence != static.id)" v-text="state.parts[item.id].translation"/>`
})

Vue.component(`MyBookDetailSentencesPartsContainerPartCellParts`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesPartsContainerPartCellParts">
		<MyBookDetailSentencesPartsContainerPartCellPartsOriginal :item="item" :static="static" />
		<MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainer :item="item" :static="static" />
		<MyBookDetailSentencesPartsContainerPartCellPartsTranslation :item="item" :static="static" />

	</div>`
})

Vue.component(`MyBookDetailSentencesPartsContainerPartCell`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesPartsContainerPartCell"><div v-for="(item, id) of state.parts" :key="item.id" v-if="(item.sentence_id === static.id)">
		<MyBookDetailSentencesPartsContainerPartCellParts :index="id" :item="item" :static="static" />
</div>
	</div>`
})

Vue.component(`MyBookDetailSentencesPartsContainer`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesPartsContainer">
		<MyBookDetailSentencesPartsContainerPartCell :static="item" />

	</div>`
})

Vue.component(`MyBookDetailSentencesTranslationContainerTranslationContentInputLabel`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesTranslationContainerTranslationContentInputLabel" v-text="state.l.sentence.translation"/>`
})

Vue.component(`MyBookDetailSentencesTranslationContainerTranslationContentInputControl`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<input class="MyBookDetailSentencesTranslationContainerTranslationContentInputControl form-control" type="text" @input="$store.commit('input', { path: 'state.sentences[' + item.id + '].translation', value: $event.target.value })" :value="state.sentences[item.id].translation" data-test="sentenceTranslation"/>`
})

Vue.component(`MyBookDetailSentencesTranslationContainerTranslationContentInput`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesTranslationContainerTranslationContentInput form-group">
		<MyBookDetailSentencesTranslationContainerTranslationContentInputLabel :item="item" />
		<MyBookDetailSentencesTranslationContainerTranslationContentInputControl :item="item" />

	</div>`
})

Vue.component(`MyBookDetailSentencesTranslationContainerTranslation`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesTranslationContainerTranslation col-xs-12 col-sm-9">
		<MyBookDetailSentencesTranslationContainerTranslationContentInput :item="item" />

	</div>`
})

Vue.component(`MyBookDetailSentencesTranslationContainerButtonsContainerSaveButton`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<button class="MyBookDetailSentencesTranslationContainerButtonsContainerSaveButton btn btn-default btn btn-success" v-text="state.l.button.save" data-test="sentenceSave" @click="$store.dispatch('putSentence', item.id)"/>`
})

Vue.component(`MyBookDetailSentencesTranslationContainerButtonsContainerDeleteButton`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<button class="MyBookDetailSentencesTranslationContainerButtonsContainerDeleteButton btn btn-default btn btn-danger" v-text="state.l.button.delete" data-test="sentenceDelete" @click="$store.commit('confirmDeleteSentence', { value: item.id, res: null })"/>`
})

Vue.component(`MyBookDetailSentencesTranslationContainerButtonsContainer`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesTranslationContainerButtonsContainer col-xs-12 col-sm-3">
		<MyBookDetailSentencesTranslationContainerButtonsContainerSaveButton :item="item" />
		<MyBookDetailSentencesTranslationContainerButtonsContainerDeleteButton :item="item" />

	</div>`
})

Vue.component(`MyBookDetailSentencesTranslationContainer`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesTranslationContainer row">
		<MyBookDetailSentencesTranslationContainerTranslation :item="item" />
		<MyBookDetailSentencesTranslationContainerButtonsContainer :item="item" />

	</div>`
})

Vue.component(`MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentHeader`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentHeader modal-header"/>`
})

Vue.component(`MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentBody`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentBody modal-body"/>`
})

Vue.component(`MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentFooterDeleteButton`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<button class="MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentFooterDeleteButton btn btn-default btn btn-danger" v-text="state.l.button.delete" data-test="sentenceDeleteConfirm" @click="$store.dispatch('deleteSentence', {'id':state.deleteSentence})"/>`
})

Vue.component(`MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentFooter`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentFooter modal-footer">
		<MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentFooterDeleteButton />

	</div>`
})

Vue.component(`MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContent`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContent modal-content">
		<MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentHeader />
		<MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentBody />
		<MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentFooter />

	</div>`
})

Vue.component(`MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialog`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialog modal-dialog" role="document" tabindex="-1">
		<MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContent />

	</div>`
})

Vue.component(`MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModal`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModal modal show" role="dialog">
		<MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialog />

	</div>`
})

Vue.component(`MyBookDetailSentencesDeleteSentenceContainer`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentencesDeleteSentenceContainer" v-if="(state.deleteSentence === item.id)">
		<MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModal />

	</div>`
})

Vue.component(`MyBookDetailSentences`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailSentences"><div v-for="(item, id) of state.sentences" :key="item.id" v-if="(item.book_id === state.selectedBook)">
		<MyBookDetailSentencesEditButtonContainer :index="id" :item="item" />
		<MyBookDetailSentencesPartsContainer :index="id" :item="item" />
		<MyBookDetailSentencesTranslationContainer :index="id" :item="item" />
		<MyBookDetailSentencesDeleteSentenceContainer :index="id" :item="item" />
</div>
	</div>`
})

Vue.component(`MyBookDetailNewSentenceContainerNewSentenceOriginalInputControl`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<input class="MyBookDetailNewSentenceContainerNewSentenceOriginalInputControl form-control" type="text" @input="$store.commit('input', { path: 'state.newSentence.original', value: $event.target.value })" :value="state.newSentence.original"/>`
})

Vue.component(`MyBookDetailNewSentenceContainerNewSentenceOriginalInputLabel`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailNewSentenceContainerNewSentenceOriginalInputLabel" v-text="state.l.sentences.newEntire.original"/>`
})

Vue.component(`MyBookDetailNewSentenceContainerNewSentenceOriginalInput`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailNewSentenceContainerNewSentenceOriginalInput form-group">
		<MyBookDetailNewSentenceContainerNewSentenceOriginalInputLabel :item="item" />
		<MyBookDetailNewSentenceContainerNewSentenceOriginalInputControl :item="item" />

	</div>`
})

Vue.component(`MyBookDetailNewSentenceContainerNewSentenceButton`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<button class="MyBookDetailNewSentenceContainerNewSentenceButton btn btn-default btn btn-primary" v-text="state.l.sentence.new" data-test="newSentence" @click="$store.dispatch('postSentence', state.selectedBook)"/>`
})

Vue.component(`MyBookDetailNewSentenceContainer`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailNewSentenceContainer">
		<MyBookDetailNewSentenceContainerNewSentenceOriginalInput />
		<MyBookDetailNewSentenceContainerNewSentenceButton />

	</div>`
})

Vue.component(`MyBookDetailDeleteBookButton`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<button class="MyBookDetailDeleteBookButton btn btn-default btn btn-danger" v-text="state.l.button.delete" data-test="bookDelete" @click="$store.commit('confirmDeleteBook', { value: state.selectedBook, res: null })"/>`
})

Vue.component(`MyBookDetailDeleteBookContainerDeleteBookModalDialogContentHeader`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailDeleteBookContainerDeleteBookModalDialogContentHeader modal-header"/>`
})

Vue.component(`MyBookDetailDeleteBookContainerDeleteBookModalDialogContentBody`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailDeleteBookContainerDeleteBookModalDialogContentBody modal-body"/>`
})

Vue.component(`MyBookDetailDeleteBookContainerDeleteBookModalDialogContentFooterDeleteBookButton`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<button class="MyBookDetailDeleteBookContainerDeleteBookModalDialogContentFooterDeleteBookButton btn btn-default btn btn-danger" v-text="state.l.button.delete" data-test="bookDeleteConfirm" @click="$store.dispatch('deleteBook', {'id':state.deleteBook})"/>`
})

Vue.component(`MyBookDetailDeleteBookContainerDeleteBookModalDialogContentFooter`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailDeleteBookContainerDeleteBookModalDialogContentFooter modal-footer">
		<MyBookDetailDeleteBookContainerDeleteBookModalDialogContentFooterDeleteBookButton />

	</div>`
})

Vue.component(`MyBookDetailDeleteBookContainerDeleteBookModalDialogContent`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailDeleteBookContainerDeleteBookModalDialogContent modal-content">
		<MyBookDetailDeleteBookContainerDeleteBookModalDialogContentHeader />
		<MyBookDetailDeleteBookContainerDeleteBookModalDialogContentBody />
		<MyBookDetailDeleteBookContainerDeleteBookModalDialogContentFooter />

	</div>`
})

Vue.component(`MyBookDetailDeleteBookContainerDeleteBookModalDialog`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailDeleteBookContainerDeleteBookModalDialog modal-dialog" role="document" tabindex="-1">
		<MyBookDetailDeleteBookContainerDeleteBookModalDialogContent />

	</div>`
})

Vue.component(`MyBookDetailDeleteBookContainerDeleteBookModal`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailDeleteBookContainerDeleteBookModal modal show" role="dialog">
		<MyBookDetailDeleteBookContainerDeleteBookModalDialog />

	</div>`
})

Vue.component(`MyBookDetailDeleteBookContainer`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetailDeleteBookContainer" v-if="(state.deleteBook)">
		<MyBookDetailDeleteBookContainerDeleteBookModal />

	</div>`
})

Vue.component(`MyBookDetail`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="MyBookDetail" v-if="(state.selectedBook)">
		<MyBookDetailTitle />
		<MyBookDetailSentences />
		<MyBookDetailNewSentenceContainer />
		<MyBookDetailDeleteBookButton />
		<MyBookDetailDeleteBookContainer />

	</div>`
})

Vue.component(`My`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="My" v-if="(state.section === 'myBooks')">
		<MyBooksListContainer />
		<MyBookDetail />

	</div>`
})

Vue.component(`SharedBooksList`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="SharedBooksList"/>`
})

Vue.component(`SharedBookDetailTitle`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="SharedBookDetailTitle"/>`
})

Vue.component(`SharedBookDetailSentencesPartsPartOriginal`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="SharedBookDetailSentencesPartsPartOriginal"/>`
})

Vue.component(`SharedBookDetailSentencesPartsPartTranslate`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="SharedBookDetailSentencesPartsPartTranslate"/>`
})

Vue.component(`SharedBookDetailSentencesPartsPart`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="SharedBookDetailSentencesPartsPart">
		<SharedBookDetailSentencesPartsPartOriginal />
		<SharedBookDetailSentencesPartsPartTranslate />

	</div>`
})

Vue.component(`SharedBookDetailSentencesParts`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="SharedBookDetailSentencesParts">
		<SharedBookDetailSentencesPartsPart />

	</div>`
})

Vue.component(`SharedBookDetailSentencesTranslation`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="SharedBookDetailSentencesTranslation"/>`
})

Vue.component(`SharedBookDetailSentencesNote`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="SharedBookDetailSentencesNote"/>`
})

Vue.component(`SharedBookDetailSentencesCommentsShowButton`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<button class="SharedBookDetailSentencesCommentsShowButton btn btn-default" v-text="state.l.comments.show"/>`
})

Vue.component(`SharedBookDetailSentencesCommentsCommentsList`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="SharedBookDetailSentencesCommentsCommentsList"/>`
})

Vue.component(`SharedBookDetailSentencesCommentsCommentInputControl`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<input class="SharedBookDetailSentencesCommentsCommentInputControl form-control" type="text" @input="$store.commit('input', { path: 'state.newComment', value: $event.target.value })" :value="state.newComment"/>`
})

Vue.component(`SharedBookDetailSentencesCommentsCommentInputLabel`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="SharedBookDetailSentencesCommentsCommentInputLabel" v-text="state.l.comments.new"/>`
})

Vue.component(`SharedBookDetailSentencesCommentsCommentInput`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="SharedBookDetailSentencesCommentsCommentInput form-group">
		<SharedBookDetailSentencesCommentsCommentInputLabel :item="item" />
		<SharedBookDetailSentencesCommentsCommentInputControl :item="item" />

	</div>`
})

Vue.component(`SharedBookDetailSentencesCommentsAddButton`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<button class="SharedBookDetailSentencesCommentsAddButton btn btn-default" v-text="state.l.comments.add"/>`
})

Vue.component(`SharedBookDetailSentencesComments`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="SharedBookDetailSentencesComments">
		<SharedBookDetailSentencesCommentsShowButton />
		<SharedBookDetailSentencesCommentsCommentsList />
		<SharedBookDetailSentencesCommentsCommentInput />
		<SharedBookDetailSentencesCommentsAddButton />

	</div>`
})

Vue.component(`SharedBookDetailSentences`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="SharedBookDetailSentences">
		<SharedBookDetailSentencesParts />
		<SharedBookDetailSentencesTranslation />
		<SharedBookDetailSentencesNote />
		<SharedBookDetailSentencesComments />

	</div>`
})

Vue.component(`SharedBookDetail`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="SharedBookDetail">
		<SharedBookDetailTitle />
		<SharedBookDetailSentences />

	</div>`
})

Vue.component(`Shared`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="Shared" v-if="(state.section === 'sharedBooks')">
		<SharedBooksList />
		<SharedBookDetail />

	</div>`
})

Vue.component(`Admin`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="Admin" v-if="(state.user)">
		<My />
		<Shared />

	</div>`
})

Vue.component(`app`, {
	props: [ "item", "static", "index" ],
	methods: {
		moment: function(value) { 
			return window.moment(value) 
		}
	},
	computed: {
		state: function() {
			return this.$store.state.updateHack ? this.$store.state : this.$store.state
		}
	},
	template: `<div class="app container">
		<Login />
		<Admin />

	</div>`
})


const VueApp = new Vue({ el: "#app", store,
	mounted: function() {
		this.$store.dispatch('initFromGet')
	},

});