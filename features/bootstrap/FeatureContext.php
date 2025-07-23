<?php

require "vendor/autoload.php";
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;


class FeatureContext extends LambdaContext {
  /** @Given /^I am on "([^"]*)"$/ */
  public function iAmOnSite($url) {
    self::$driver->get($url);
  }

   /**
     * @When I click on checkboxes
     */
  public function iClickOnCheckboxes() {
    $element = self::$driver->findElement(WebDriverBy::name("li1"));
    $element->click();
    $element2 = self::$driver->findElement(WebDriverBy::name("li2"));
    $element2->click();
    sleep(5);
  }

  /**
     * @When I add checkbox with text :arg1
     */
    public function iAddCheckboxWithText($arg1)
    {
      $inputBox = self::$driver->findElement(WebDriverBy::id("sampletodotext"));
      $inputBox->sendKeys($arg1);
      $addbox = self::$driver->findElement(WebDriverBy::id("addbutton"));
      $addbox->click();
    }


  /** @Then /^I get checkbox text as "([^"]*)"$/ */
  public function iShouldGet($string) {
    $title = self::$driver->findElement(WebDriverBy::xpath("/html/body/div/div/div/ul/li[6]/span"))->getText();
    if ((string)  $string !== $title) {
      throw new Exception("Expected title: '". $string. "'' Actual is: '". $title. "'");
    }
  }

  /**
     * @Then I capture smartui snapshot
     */
    public function captureSmartUiSnapshot()
    {
      self::$driver->executeScript("smartui.takeScreenshot=to-do");
    }
}