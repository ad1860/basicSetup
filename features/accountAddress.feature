@javascript @insulated @address @a
Feature: Account address book


  Scenario: User adds new address
    Given I login with valid user
    And I am on address page
    When I add new address in account
    Then the address should be displayed as additional address