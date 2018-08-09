@javascript @insulated @search
Feature: Search


  @debug
  Scenario: Search breadcrumbs contains search term
    Given I am on homepage
    When I search for luma
    Then the search page should contain breadcrumb with search term