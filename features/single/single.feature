Feature: Google's Search Functionality

Scenario: Can find search results
    Given I am on "https://www.google.com/ncr"
    When I search for "LambdaTest"
    Then I get title as "LambdaTest - Google Search"
