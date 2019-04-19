describe('Login', () => {
  beforeEach(() => {
    cy.visit('/foo')
  })
  it('should redirect to login page if not authenticated', () => {
    cy.url().should('include', 'login')
  })
})
