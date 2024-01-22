/// <reference types="cypress" />
import 'cypress-file-upload';

describe('Journal Form Submission', () => {
  Cypress.Commands.add('uploadFile', (fileName) => {
    cy.fixture(fileName, 'base64').then(fileContent => {
      cy.get('input[name="journal_file"]').attachFile({
        fileContent: fileContent,
        fileName: fileName,
        mimeType: 'pdf',
      });
    });
  });

  it('Should be able to submit the journal form', () => {
    const journalTitle = 'Test Journal Title';
    const journalName = 'Test Journal Name';
    const journalDesc = 'Test Journal Description';

    cy.visit("http://127.0.0.1:8000/");
    cy.get('.block').click();

    // Isi formulir
    cy.get('input[name="journal_title"]').type(journalTitle);
    cy.get('input[name="journal_name"]').type(journalName);
    cy.get('textarea[name="journal_desc"]').type(journalDesc);

    // Panggil fungsi uploadFile
    cy.uploadFile('Testfile.pdf');

    // Kirim formulir
    cy.get('button[type="submit"]').click();
  });
});
