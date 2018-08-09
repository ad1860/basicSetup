@insulated @javascript
Feature: Login
  # user story / short description


  @debug
  Scenario: Login with valid credentials
    Given I am on homepage
    When I login with valid user
    Then then the dashboard should be visible


  @register
  Scenario: Register using valid data
    Given I am on homepage
    When I submit register form with valid data
    Then then the dashboard should be visible