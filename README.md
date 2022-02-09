# Run Behat Script on LambdaTest Selenium Grid

![Serenity](https://www.lambdatest.com/resources/images/meta/behat-automation.png)

## Prerequisites

To run your test script using php with Selenium.

1. Install php and setup environment variable.([Linux](https://www.php.net/manual/en/install.unix.debian.php), [Windows](https://www.php.net/downloads.php), [MacOS](https://www.php.net/manual/en/install.macosx.php)).

2) Install Composer ([Linux/MacOS](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos), [Windows](https://getcomposer.org/doc/00-intro.md#installation-windows))
3) Install MBstring extension.

```
sudo apt-get install php-mbstring
```

## Steps to Run your First Test

Step 1. Clone the Behat-Selenium-Sample Repository.

```
git https://github.com/LambdaTest/behat-selenium-sample.git
```

Step 2. Inside behat-selenium-sample folder, export the Lambda-test Credentials. You can get these from your automation dashboard.

<p align="center">
   <b>For Linux/macOS:</b>
```
export LT_USERNAME="YOUR_USERNAME"
export LT_ACCESS_KEY="YOUR ACCESS KEY"
```
<p align="center">
   <b>For Windows:</b>
```
set LT_USERNAME="YOUR_USERNAME"
set LT_ACCESS_KEY="YOUR ACCESS KEY"
```
Step 3. Install dependencies by composer.
```
composer install 
```
Step 4. To run a single test, run
``` 
composer single
```
Step 5. To run parallel test, run
```
composer parallel
```
## See the Results
You can see the results of the test on Lambdatest [Automation Dashboard](https://automation.lambdatest.com/build)
![Dashboard](https://github.com/LambdaTest/behat-selenium-sample/dashboard.png)

##### Routing traffic through your local machine

- Set tunnel value to `true` in test capabilities
  > OS specific instructions to download and setup tunnel binary can be found at the following links.
  >
  > - [Windows](https://www.lambdatest.com/support/docs/display/TD/Local+Testing+For+Windows)
  > - [Mac](https://www.lambdatest.com/support/docs/display/TD/Local+Testing+For+MacOS)
  > - [Linux](https://www.lambdatest.com/support/docs/display/TD/Local+Testing+For+Linux)

### Important Note:

Some Safari & IE browsers, doesn't support automatic resolution of the URL string "localhost". Therefore if you test on URLs like "http://localhost/" or "http://localhost:8080" etc, you would get an error in these browsers. A possible solution is to use "localhost.lambdatest.com" or replace the string "localhost" with machine IP address. For example if you wanted to test "http://localhost/dashboard" or, and your machine IP is 192.168.2.6 you can instead test on "http://192.168.2.6/dashboard" or "http://localhost.lambdatest.com/dashboard".

## About LambdaTest

[LambdaTest](https://www.lambdatest.com/) is a cloud based selenium grid infrastructure that can help you run automated cross browser compatibility tests on 2000+ different browser and operating system environments. LambdaTest supports all programming languages and frameworks that are supported with Selenium, and have easy integrations with all popular CI/CD platforms. It's a perfect solution to bring your [selenium automation testing](https://www.lambdatest.com/selenium-automation) to cloud based infrastructure that not only helps you increase your test coverage over multiple desktop and mobile browsers, but also allows you to cut down your test execution time by running tests on parallel.

### Resources

##### [SeleniumHQ Documentation](http://www.seleniumhq.org/docs/)

##### [NUnit Documentation](https://github.com/nunit/nunit/wiki)
