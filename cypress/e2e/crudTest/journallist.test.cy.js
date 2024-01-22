/// <reference types="cypress" />

describe('User can open journal list page', () => {
    it('Should be able to open journal add page', () => {
        cy.visit("http://127.0.0.1:8000/");
        cy.get('.block')
            .click();
        cy.on('window:confirm', () => true);
        cy.visit("http://127.0.0.1:8000/");
    });

    it('Should be able to delete a journal', () => {
        cy.visit("http://127.0.0.1:8000/");
        cy.get('tbody tr:first-of-type td:last-of-type a')
            .click();
        cy.on('window:confirm', () => true);

    });
});