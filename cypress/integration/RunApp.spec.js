describe('RunApp', () => {
	before(() => {
		cy.visit('http://lingo.dev');		
	})
	it('should RunApp', () => {
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

		cy.get('[data-test="newBookTitle"]')
			.should('have.length', 1)
			.and('be.visible')
			.type('The Secret (EN)');

		cy.get('[data-test="newBookCreate"]')
			.should('have.length', 1)
			.and('be.visible')
			.click();

		cy.get('[data-test="newSentence"]')
			.should('have.length', 1)
			.and('be.visible')
			.click();

		cy.get('[data-test="newPart"]')
			.should('have.length', 1)
			.and('be.visible')
			.click();

		cy.get('[data-test="partOriginal"]')
			.should('have.length', 1)
			.and('be.visible')
			.type('The');

		cy.get('[data-test="partTranslation"]')
			.should('have.length', 1)
			.and('be.visible')
			.type('To');

		cy.get('[data-test="partSave"]')
			.should('have.length', 1)
			.and('be.visible')
			.click();

		cy.get('[data-test="newPart"]')
			.should('have.length', 1)
			.and('be.visible')
			.click();

		cy.get('[data-test="partOriginal"]:eq(1)')
			.should('have.length', 1)
			.and('be.visible')
			.type('Secret');

		cy.get('[data-test="partTranslation"]:eq(1)')
			.should('have.length', 1)
			.and('be.visible')
			.type('Tajemství');

		cy.get('[data-test="partSave"]:eq(1)')
			.should('have.length', 1)
			.and('be.visible')
			.click();

		cy.get('[data-test="sentenceTranslation"]')
			.should('have.length', 1)
			.and('be.visible')
			.type('Tajemství (název knihy)');

		cy.get('[data-test="sentenceNote"]')
			.should('have.length', 1)
			.and('be.visible')
			.type('Toto se většinou nepřekládá. Je to "The Secret" nebo "Secret"');

		cy.get('[data-test="sentenceSave"]')
			.should('have.length', 1)
			.and('be.visible')
			.click();

		cy.get('[data-test="partDelete"]:eq(1)')
			.should('have.length', 1)
			.and('be.visible')
			.click();

		cy.get('[data-test="partDeleteConfirm"]')
			.should('have.length', 1)
			.and('be.visible')
			.click();

		cy.get('[data-test="sentenceDelete"]')
			.should('have.length', 1)
			.and('be.visible')
			.click();

		cy.get('[data-test="sentenceDeleteConfirm"]')
			.should('have.length', 1)
			.and('be.visible')
			.click();

		cy.get('[data-test="bookDelete"]')
			.should('have.length', 1)
			.and('be.visible')
			.click();

		cy.get('[data-test="bookDeleteConfirm"]')
			.should('have.length', 1)
			.and('be.visible')
			.click();

	})
})
