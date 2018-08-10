@javascript @insulated @search
Feature: Search


  Scenario Outline: Search breadcrumbs contains search term
    Given I am on homepage
    When I search for <search_term>
    Then the search page should contain breadcrumb with search term
    Examples:
      | search_term |
      | luma        |
      | ww()        |


  Scenario: Search using a term that return no results
    Given I am on homepage
    When I search for ww()
    Then the search page should contain no search results warning