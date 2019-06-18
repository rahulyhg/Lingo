<div class="component">
	<h1>LoginFormUsernameInputControl (input/div)</h1>

	<table>
		<tr><td>class</td><td>"form-control"</td></tr>
		<tr><td>input</td><td>"text"</td></tr>
		<tr><td>ref</td><td>".loginForm.username"</td></tr>
		<tr><td>test</td><td>"loginUsername"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>LoginFormUsernameInputLabel (div/div)</h1>

	<table>
		<tr><td></td><td>[".l.loginForm.username"]</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>LoginFormUsernameInput (div/div)</h1>

	<table>
		<tr><td>class</td><td>"form-group"</td></tr>
		<tr><td>nest</td><td>"item"</td></tr>
	</table>

	<ul>
		<li>LoginFormUsernameInputLabel</li>
		<li>LoginFormUsernameInputControl</li>
	</ul>

</div>
<div class="component">
	<h1>LoginFormPasswordInputControl (input/div)</h1>

	<table>
		<tr><td>class</td><td>"form-control"</td></tr>
		<tr><td>input</td><td>"password"</td></tr>
		<tr><td>ref</td><td>".loginForm.password"</td></tr>
		<tr><td>test</td><td>"loginPassword"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>LoginFormPasswordInputLabel (div/div)</h1>

	<table>
		<tr><td></td><td>[".l.loginForm.password"]</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>LoginFormPasswordInput (div/div)</h1>

	<table>
		<tr><td>class</td><td>"form-group"</td></tr>
		<tr><td>nest</td><td>"item"</td></tr>
	</table>

	<ul>
		<li>LoginFormPasswordInputLabel</li>
		<li>LoginFormPasswordInputControl</li>
	</ul>

</div>
<div class="component">
	<h1>LoginFormLoginRowSendLoginButton (button/div)</h1>

	<table>
		<tr><td>button</td><td>"default"</td></tr>
		<tr><td>button</td><td>"success"</td></tr>
		<tr><td>content</td><td>[".l.loginForm.login"]</td></tr>
		<tr><td>test</td><td>"loginSend"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>LoginFormLoginRowSend (div/div)</h1>

	<table>
		<tr><td>class</td><td>"col-xs-6"</td></tr>
	</table>

	<ul>
		<li>LoginFormLoginRowSendLoginButton</li>
	</ul>

</div>
<div class="component">
	<h1>LoginFormLoginRowRememberRememberInputControl (input/div)</h1>

	<table>
		<tr><td>class</td><td>"form-control"</td></tr>
		<tr><td>input</td><td>"checkbox"</td></tr>
		<tr><td>ref</td><td>".loginForm.remeber"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>LoginFormLoginRowRememberRememberInputLabel (div/div)</h1>

	<table>
		<tr><td></td><td>[".l.loginForm.remeber"]</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>LoginFormLoginRowRememberRememberInput (div/div)</h1>

	<table>
		<tr><td>class</td><td>"form-group"</td></tr>
		<tr><td>nest</td><td>"item"</td></tr>
	</table>

	<ul>
		<li>LoginFormLoginRowRememberRememberInputLabel</li>
		<li>LoginFormLoginRowRememberRememberInputControl</li>
	</ul>

</div>
<div class="component">
	<h1>LoginFormLoginRowRemember (div/div)</h1>

	<table>
		<tr><td>class</td><td>"col-xs-6"</td></tr>
	</table>

	<ul>
		<li>LoginFormLoginRowRememberRememberInput</li>
	</ul>

</div>
<div class="component">
	<h1>LoginFormLoginRow (div/div)</h1>

	<table>
		<tr><td>class</td><td>"row"</td></tr>
	</table>

	<ul>
		<li>LoginFormLoginRowSend</li>
		<li>LoginFormLoginRowRemember</li>
	</ul>

</div>
<div class="component">
	<h1>LoginForm (div/div)</h1>

	<table>
	</table>

	<ul>
		<li>LoginFormUsernameInput</li>
		<li>LoginFormPasswordInput</li>
		<li>LoginFormLoginRow</li>
	</ul>

</div>
<div class="component">
	<h1>Login (div/div)</h1>

	<table>
		<tr><td>ifnot</td><td>[".user"]</td></tr>
	</table>

	<ul>
		<li>LoginForm</li>
	</ul>

</div>
<div class="component">
	<h1>MyBooksListContainerBooksListItem (div/div)</h1>

	<table>
		<tr><td>class</td><td>"list-group-item"</td></tr>
		<tr><td>content</td><td>["item.title"]</td></tr>
		<tr><td>test</td><td>"bookListItem"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBooksListContainerBooksList (div/div)</h1>

	<table>
		<tr><td>list</td><td>".books"</td></tr>
		<tr><td>class</td><td>"list-group"</td></tr>
	</table>

	<ul>
		<li>MyBooksListContainerBooksListItem</li>
	</ul>

</div>
<div class="component">
	<h1>MyBooksListContainerNewBookTitleInputControl (input/div)</h1>

	<table>
		<tr><td>class</td><td>"form-control"</td></tr>
		<tr><td>input</td><td>"text"</td></tr>
		<tr><td>ref</td><td>".newBookTitle"</td></tr>
		<tr><td>test</td><td>"newBookTitle"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBooksListContainerNewBookTitleInputLabel (div/div)</h1>

	<table>
		<tr><td></td><td>[".l.newBook.title"]</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBooksListContainerNewBookTitleInput (div/div)</h1>

	<table>
		<tr><td>class</td><td>"form-group"</td></tr>
		<tr><td>nest</td><td>"item"</td></tr>
	</table>

	<ul>
		<li>MyBooksListContainerNewBookTitleInputLabel</li>
		<li>MyBooksListContainerNewBookTitleInputControl</li>
	</ul>

</div>
<div class="component">
	<h1>MyBooksListContainerNewBookButton (button/div)</h1>

	<table>
		<tr><td>button</td><td>"default"</td></tr>
		<tr><td>button</td><td>"primary"</td></tr>
		<tr><td>content</td><td>[".l.newBook.create"]</td></tr>
		<tr><td>test</td><td>"newBookCreate"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBooksListContainer (div/div)</h1>

	<table>
		<tr><td>ifnot</td><td>[".selectedBook"]</td></tr>
	</table>

	<ul>
		<li>MyBooksListContainerBooksList</li>
		<li>MyBooksListContainerNewBookTitleInput</li>
		<li>MyBooksListContainerNewBookButton</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailTitle (h1/div)</h1>

	<table>
		<tr><td>header</td><td>"1"</td></tr>
		<tr><td>content</td><td>[".books[.selectedBook].title"]</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesEditButtonContainerEditButton (button/div)</h1>

	<table>
		<tr><td>button</td><td>"default"</td></tr>
		<tr><td>content</td><td>[".l.button.edit"]</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesEditButtonContainer (div/div)</h1>

	<table>
		<tr><td>nest</td><td>"item"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailSentencesEditButtonContainerEditButton</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesPartsContainerPartCellPartsOriginal (div/div)</h1>

	<table>
		<tr><td>content</td><td>[".parts[item.id].original"]</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainerTranslationInputControl (input/div)</h1>

	<table>
		<tr><td>class</td><td>"form-control"</td></tr>
		<tr><td>input</td><td>"text"</td></tr>
		<tr><td>ref</td><td>".parts[item.id].translation"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainerTranslationInputLabel (div/div)</h1>

	<table>
		<tr><td></td><td>["\"\""]</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainerTranslationInput (div/div)</h1>

	<table>
		<tr><td>class</td><td>"form-group"</td></tr>
		<tr><td>nest</td><td>"item"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainerTranslationInputLabel</li>
		<li>MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainerTranslationInputControl</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainer (div/div)</h1>

	<table>
		<tr><td>if</td><td>[".editSentence == static.id"]</td></tr>
		<tr><td>nest</td><td>"item"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainerTranslationInput</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesPartsContainerPartCellPartsTranslation (div/div)</h1>

	<table>
		<tr><td>if</td><td>[".editSentence != static.id"]</td></tr>
		<tr><td>content</td><td>[".parts[item.id].translation"]</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesPartsContainerPartCellParts (div/div)</h1>

	<table>
		<tr><td>nest</td><td>"item"</td></tr>
		<tr><td>static</td><td>"static"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailSentencesPartsContainerPartCellPartsOriginal</li>
		<li>MyBookDetailSentencesPartsContainerPartCellPartsTranslationInputContainer</li>
		<li>MyBookDetailSentencesPartsContainerPartCellPartsTranslation</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesPartsContainerPartCell (div/div)</h1>

	<table>
		<tr><td>list</td><td>".parts"</td></tr>
		<tr><td>static</td><td>"static"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailSentencesPartsContainerPartCellParts</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesPartsContainer (div/div)</h1>

	<table>
		<tr><td>static</td><td>"item"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailSentencesPartsContainerPartCell</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesTranslationContainerTranslationContentInputLabel (div/div)</h1>

	<table>
		<tr><td></td><td>[".l.sentence.translation"]</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesTranslationContainerTranslationContentInputControl (input/div)</h1>

	<table>
		<tr><td>class</td><td>"form-control"</td></tr>
		<tr><td>input</td><td>"text"</td></tr>
		<tr><td>ref</td><td>".sentences[item.id].translation"</td></tr>
		<tr><td>test</td><td>"sentenceTranslation"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesTranslationContainerTranslationContentInput (div/div)</h1>

	<table>
		<tr><td>class</td><td>"form-group"</td></tr>
		<tr><td>nest</td><td>"item"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailSentencesTranslationContainerTranslationContentInputLabel</li>
		<li>MyBookDetailSentencesTranslationContainerTranslationContentInputControl</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesTranslationContainerTranslation (div/div)</h1>

	<table>
		<tr><td>nest</td><td>"item"</td></tr>
		<tr><td>class</td><td>"col-xs-12 col-sm-9"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailSentencesTranslationContainerTranslationContentInput</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesTranslationContainerButtonsContainerSaveButton (button/div)</h1>

	<table>
		<tr><td>button</td><td>"default"</td></tr>
		<tr><td>content</td><td>[".l.button.save"]</td></tr>
		<tr><td>test</td><td>"sentenceSave"</td></tr>
		<tr><td>button</td><td>"success"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesTranslationContainerButtonsContainerDeleteButton (button/div)</h1>

	<table>
		<tr><td>button</td><td>"default"</td></tr>
		<tr><td>content</td><td>[".l.button.delete"]</td></tr>
		<tr><td>test</td><td>"sentenceDelete"</td></tr>
		<tr><td>button</td><td>"danger"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesTranslationContainerButtonsContainer (div/div)</h1>

	<table>
		<tr><td>nest</td><td>"item"</td></tr>
		<tr><td>class</td><td>"col-xs-12 col-sm-3"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailSentencesTranslationContainerButtonsContainerSaveButton</li>
		<li>MyBookDetailSentencesTranslationContainerButtonsContainerDeleteButton</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesTranslationContainer (div/div)</h1>

	<table>
		<tr><td>nest</td><td>"item"</td></tr>
		<tr><td>class</td><td>"row"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailSentencesTranslationContainerTranslation</li>
		<li>MyBookDetailSentencesTranslationContainerButtonsContainer</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentHeader (div/div)</h1>

	<table>
		<tr><td>class</td><td>"modal-header"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentBody (div/div)</h1>

	<table>
		<tr><td>class</td><td>"modal-body"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentFooterDeleteButton (button/div)</h1>

	<table>
		<tr><td>button</td><td>"default"</td></tr>
		<tr><td>button</td><td>"danger"</td></tr>
		<tr><td>content</td><td>[".l.button.delete"]</td></tr>
		<tr><td>test</td><td>"sentenceDeleteConfirm"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentFooter (div/div)</h1>

	<table>
		<tr><td>class</td><td>"modal-footer"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentFooterDeleteButton</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContent (div/div)</h1>

	<table>
		<tr><td>class</td><td>"modal-content"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentHeader</li>
		<li>MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentBody</li>
		<li>MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContentFooter</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialog (div/div)</h1>

	<table>
		<tr><td>class</td><td>"modal-dialog"</td></tr>
		<tr><td>role</td><td>"document"</td></tr>
		<tr><td>tabindex</td><td>"-1"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialogContent</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModal (div/div)</h1>

	<table>
		<tr><td>class</td><td>"modal show"</td></tr>
		<tr><td>role</td><td>"dialog"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModalDialog</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentencesDeleteSentenceContainer (div/div)</h1>

	<table>
		<tr><td>if</td><td>[".deleteSentence === item.id"]</td></tr>
	</table>

	<ul>
		<li>MyBookDetailSentencesDeleteSentenceContainerDeleteSentenceModal</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailSentences (div/div)</h1>

	<table>
		<tr><td>list</td><td>".sentences"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailSentencesEditButtonContainer</li>
		<li>MyBookDetailSentencesPartsContainer</li>
		<li>MyBookDetailSentencesTranslationContainer</li>
		<li>MyBookDetailSentencesDeleteSentenceContainer</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailNewSentenceContainerNewSentenceOriginalInputControl (input/div)</h1>

	<table>
		<tr><td>class</td><td>"form-control"</td></tr>
		<tr><td>input</td><td>"text"</td></tr>
		<tr><td>ref</td><td>".newSentence.original"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailNewSentenceContainerNewSentenceOriginalInputLabel (div/div)</h1>

	<table>
		<tr><td></td><td>[".l.sentences.newEntire.original"]</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailNewSentenceContainerNewSentenceOriginalInput (div/div)</h1>

	<table>
		<tr><td>class</td><td>"form-group"</td></tr>
		<tr><td>nest</td><td>"item"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailNewSentenceContainerNewSentenceOriginalInputLabel</li>
		<li>MyBookDetailNewSentenceContainerNewSentenceOriginalInputControl</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailNewSentenceContainerNewSentenceButton (button/div)</h1>

	<table>
		<tr><td>button</td><td>"default"</td></tr>
		<tr><td>button</td><td>"primary"</td></tr>
		<tr><td>content</td><td>[".l.sentence.new"]</td></tr>
		<tr><td>test</td><td>"newSentence"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailNewSentenceContainer (div/div)</h1>

	<table>
	</table>

	<ul>
		<li>MyBookDetailNewSentenceContainerNewSentenceOriginalInput</li>
		<li>MyBookDetailNewSentenceContainerNewSentenceButton</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailDeleteBookButton (button/div)</h1>

	<table>
		<tr><td>button</td><td>"default"</td></tr>
		<tr><td>button</td><td>"danger"</td></tr>
		<tr><td>content</td><td>[".l.button.delete"]</td></tr>
		<tr><td>test</td><td>"bookDelete"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailDeleteBookContainerDeleteBookModalDialogContentHeader (div/div)</h1>

	<table>
		<tr><td>class</td><td>"modal-header"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailDeleteBookContainerDeleteBookModalDialogContentBody (div/div)</h1>

	<table>
		<tr><td>class</td><td>"modal-body"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailDeleteBookContainerDeleteBookModalDialogContentFooterDeleteBookButton (button/div)</h1>

	<table>
		<tr><td>button</td><td>"default"</td></tr>
		<tr><td>button</td><td>"danger"</td></tr>
		<tr><td>content</td><td>[".l.button.delete"]</td></tr>
		<tr><td>test</td><td>"bookDeleteConfirm"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailDeleteBookContainerDeleteBookModalDialogContentFooter (div/div)</h1>

	<table>
		<tr><td>class</td><td>"modal-footer"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailDeleteBookContainerDeleteBookModalDialogContentFooterDeleteBookButton</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailDeleteBookContainerDeleteBookModalDialogContent (div/div)</h1>

	<table>
		<tr><td>class</td><td>"modal-content"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailDeleteBookContainerDeleteBookModalDialogContentHeader</li>
		<li>MyBookDetailDeleteBookContainerDeleteBookModalDialogContentBody</li>
		<li>MyBookDetailDeleteBookContainerDeleteBookModalDialogContentFooter</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailDeleteBookContainerDeleteBookModalDialog (div/div)</h1>

	<table>
		<tr><td>class</td><td>"modal-dialog"</td></tr>
		<tr><td>role</td><td>"document"</td></tr>
		<tr><td>tabindex</td><td>"-1"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailDeleteBookContainerDeleteBookModalDialogContent</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailDeleteBookContainerDeleteBookModal (div/div)</h1>

	<table>
		<tr><td>class</td><td>"modal show"</td></tr>
		<tr><td>role</td><td>"dialog"</td></tr>
	</table>

	<ul>
		<li>MyBookDetailDeleteBookContainerDeleteBookModalDialog</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetailDeleteBookContainer (div/div)</h1>

	<table>
		<tr><td>if</td><td>[".deleteBook"]</td></tr>
	</table>

	<ul>
		<li>MyBookDetailDeleteBookContainerDeleteBookModal</li>
	</ul>

</div>
<div class="component">
	<h1>MyBookDetail (div/div)</h1>

	<table>
		<tr><td>if</td><td>[".selectedBook"]</td></tr>
	</table>

	<ul>
		<li>MyBookDetailTitle</li>
		<li>MyBookDetailSentences</li>
		<li>MyBookDetailNewSentenceContainer</li>
		<li>MyBookDetailDeleteBookButton</li>
		<li>MyBookDetailDeleteBookContainer</li>
	</ul>

</div>
<div class="component">
	<h1>My (div/div)</h1>

	<table>
		<tr><td>if</td><td>[".section === \"myBooks\""]</td></tr>
	</table>

	<ul>
		<li>MyBooksListContainer</li>
		<li>MyBookDetail</li>
	</ul>

</div>
<div class="component todo">
	<h1>SharedBooksList (div/div)</h1>

	<table>
	</table>

	<ul>
	</ul>

</div>
<div class="component todo">
	<h1>SharedBookDetailTitle (div/div)</h1>

	<table>
	</table>

	<ul>
	</ul>

</div>
<div class="component todo">
	<h1>SharedBookDetailSentencesPartsPartOriginal (div/div)</h1>

	<table>
	</table>

	<ul>
	</ul>

</div>
<div class="component todo">
	<h1>SharedBookDetailSentencesPartsPartTranslate (div/div)</h1>

	<table>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>SharedBookDetailSentencesPartsPart (div/div)</h1>

	<table>
	</table>

	<ul>
		<li>SharedBookDetailSentencesPartsPartOriginal</li>
		<li>SharedBookDetailSentencesPartsPartTranslate</li>
	</ul>

</div>
<div class="component">
	<h1>SharedBookDetailSentencesParts (div/div)</h1>

	<table>
	</table>

	<ul>
		<li>SharedBookDetailSentencesPartsPart</li>
	</ul>

</div>
<div class="component todo">
	<h1>SharedBookDetailSentencesTranslation (div/div)</h1>

	<table>
	</table>

	<ul>
	</ul>

</div>
<div class="component todo">
	<h1>SharedBookDetailSentencesNote (div/div)</h1>

	<table>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>SharedBookDetailSentencesCommentsShowButton (button/div)</h1>

	<table>
		<tr><td>button</td><td>"default"</td></tr>
		<tr><td>content</td><td>[".l.comments.show"]</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component todo">
	<h1>SharedBookDetailSentencesCommentsCommentsList (div/div)</h1>

	<table>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>SharedBookDetailSentencesCommentsCommentInputControl (input/div)</h1>

	<table>
		<tr><td>class</td><td>"form-control"</td></tr>
		<tr><td>input</td><td>"text"</td></tr>
		<tr><td>ref</td><td>".newComment"</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>SharedBookDetailSentencesCommentsCommentInputLabel (div/div)</h1>

	<table>
		<tr><td></td><td>[".l.comments.new"]</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>SharedBookDetailSentencesCommentsCommentInput (div/div)</h1>

	<table>
		<tr><td>class</td><td>"form-group"</td></tr>
		<tr><td>nest</td><td>"item"</td></tr>
	</table>

	<ul>
		<li>SharedBookDetailSentencesCommentsCommentInputLabel</li>
		<li>SharedBookDetailSentencesCommentsCommentInputControl</li>
	</ul>

</div>
<div class="component">
	<h1>SharedBookDetailSentencesCommentsAddButton (button/div)</h1>

	<table>
		<tr><td>button</td><td>"default"</td></tr>
		<tr><td>content</td><td>[".l.comments.add"]</td></tr>
	</table>

	<ul>
	</ul>

</div>
<div class="component">
	<h1>SharedBookDetailSentencesComments (div/div)</h1>

	<table>
	</table>

	<ul>
		<li>SharedBookDetailSentencesCommentsShowButton</li>
		<li>SharedBookDetailSentencesCommentsCommentsList</li>
		<li>SharedBookDetailSentencesCommentsCommentInput</li>
		<li>SharedBookDetailSentencesCommentsAddButton</li>
	</ul>

</div>
<div class="component">
	<h1>SharedBookDetailSentences (div/div)</h1>

	<table>
	</table>

	<ul>
		<li>SharedBookDetailSentencesParts</li>
		<li>SharedBookDetailSentencesTranslation</li>
		<li>SharedBookDetailSentencesNote</li>
		<li>SharedBookDetailSentencesComments</li>
	</ul>

</div>
<div class="component">
	<h1>SharedBookDetail (div/div)</h1>

	<table>
	</table>

	<ul>
		<li>SharedBookDetailTitle</li>
		<li>SharedBookDetailSentences</li>
	</ul>

</div>
<div class="component">
	<h1>Shared (div/div)</h1>

	<table>
		<tr><td>if</td><td>[".section === \"sharedBooks\""]</td></tr>
	</table>

	<ul>
		<li>SharedBooksList</li>
		<li>SharedBookDetail</li>
	</ul>

</div>
<div class="component">
	<h1>Admin (div/div)</h1>

	<table>
		<tr><td>if</td><td>[".user"]</td></tr>
	</table>

	<ul>
		<li>My</li>
		<li>Shared</li>
	</ul>

</div>
<div class="component">
	<h1>app (div/div)</h1>

	<table>
		<tr><td>class</td><td>"container"</td></tr>
	</table>

	<ul>
		<li>Login</li>
		<li>Admin</li>
	</ul>

</div>
