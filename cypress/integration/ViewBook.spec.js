describe('ViewBook', () => {
	before(() => {
		cy.visit('http://lingo.dev');		
	})
	it('should ViewBook', () => {
		cy.get('[data-test="loginUsername"]')
			.should('have.length', 1)
			.and('be.visible')
			.type('zbynek.rybicka@gmail.com');

		cy.get('[data-test="loginPassword"]')
			.should('have.length', 1)
			.and('be.visible')
			.type('julineLingo');

		cy.get('[data-test="loginSend"]')
			.should('have.length', 1)
			.and('be.visible')
			.click();

		cy.get('[data-test="bookListItem"]:eq(0)')
			.should('have.length', 1)
			.and('be.visible')
			.click();

	})
})
