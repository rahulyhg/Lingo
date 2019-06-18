<div class="action">
	<h1>Default structure</h1>
		<div>loginForm.username = ""</div>
		<div>loginForm.password = ""</div>
		<div>user = null</div>
		<div>loginForm.remember = false</div>
		<div>section = "myBooks"</div>
		<div>books = {}</div>
		<div>newBookTitle = ""</div>
		<div>sentences = {}</div>
		<div>parts = {}</div>
		<div>editSentence = null</div>
		<div>newSentence.original = ""</div>
		<div>deleteBook = null</div>
		<div>newComment = ""</div>
</div>

	<div class="action">
		<h1>postLogin</h1>
		<p>Ajax: postLogin</p>

			<p>authToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjEiLCJyb2xlIjoib3duZXIifQ.TzWZ-3ngMykt1fB5Yq2j25ErBaBZWIJI77zjAJkRwws'</p>
			<p>user = {'id':'1','role':'owner','person_id':'1'}</p>
			<p>books = res.books</p>
			<p>sentences = res.sentences</p>
			<p>parts = res.parts</p>
	</div>
	<div class="action">
		<h1>selectBook</h1>
		<p></p>

			<p>selectedBook = value</p>
	</div>
	<div class="action">
		<h1>postBook</h1>
		<p>Ajax: postBook</p>

			<p>books[res] = {'id':'res','title':value}</p>
			<p>newBookTitle = ''</p>
			<p>selectedBook = res</p>
	</div>
	<div class="action">
		<h1>openEditSentence</h1>
		<p></p>

			<p>editSentence = value</p>
	</div>
	<div class="action">
		<h1>putSentence</h1>
		<p>Ajax: putSentence</p>

	</div>
	<div class="action">
		<h1>confirmDeleteSentence</h1>
		<p></p>

			<p>deleteSentence = value</p>
	</div>
	<div class="action">
		<h1>deleteSentence</h1>
		<p>Ajax: deleteSentence</p>

			<p>var sentences = Object.assign({}, sentences)
			delete sentences[value.id]
			sentences = sentences</p>
			<p>deleteSentence = null</p>
	</div>
	<div class="action">
		<h1>postSentence</h1>
		<p>Ajax: postSentence</p>

			<p>sentences[res.sentence_id] = {'id':res.sentence_id,'book_id':value,'translation':state.newSentence.original,'note':''}</p>
			<p>parts = Object.assign(state.parts, res.parts)</p>
			<p>newSentence.original = ''</p>
	</div>
	<div class="action">
		<h1>confirmDeleteBook</h1>
		<p></p>

			<p>deleteBook = value</p>
	</div>
	<div class="action">
		<h1>deleteBook</h1>
		<p>Ajax: deleteBook</p>

			<p>deleteBook = null</p>
			<p>selectedBook = null</p>
			<p>var books = Object.assign({}, books)
			delete books[value.id]
			books = books</p>
	</div>
