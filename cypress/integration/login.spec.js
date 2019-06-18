function loginFormUsernameInput(selector = '') {
	const newSelector = selector + ' .loginFormUsernameInput';
	cy.get(newSelector).should('have.length', 1).and('be.visible').type("zbynek.rybicka@gmail.com")
}

function loginFormPasswordInput(selector = '') {
	const newSelector = selector + ' .loginFormPasswordInput';
	cy.get(newSelector).should('have.length', 1).and('be.visible').type("mojeMilaJulinka")
}

function loginFormSendButton(selector = '') {
	const newSelector = selector + ' .loginFormSendButton';
	cy.get(newSelector).should('have.length', 1).and('be.visible').click()
}

function loginForm(selector = '') {
	const newSelector = selector + ' .loginForm';
	cy.get(newSelector).should('have.length', 1).and('be.visible')
	loginFormUsernameInput(newSelector);
	loginFormPasswordInput(newSelector);
	loginFormSendButton(newSelector);
}

function app(selector = '') {
	const newSelector = selector + ' .app';
	cy.get(newSelector).should('have.length', 1).and('be.visible')
	loginForm(newSelector);
}


describe('login', () => {
	it('should login', () => {
		cy.visit('http://localhost:9600');
		app();
	})
})
