Feature: LambdaTest TodoApp Functionality

Scenario: Check and Verify
    Given I am on "https://www.testmuai.com/selenium-playground/todo-app/"
    When I click on checkboxes
    And I add checkbox with text "New check box"
    Then I get checkbox text as "New check box"