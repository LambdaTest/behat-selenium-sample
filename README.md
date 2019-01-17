# behat-lambdatest.com
[Behat](https://github.com/Behat/Behat) Integration with LambdaTest.

![LambdaTest Logo](http://labs.lambdatest.com/images/fills-copy.svg)

## Setup
* Clone the repo
* Install dependencies `composer install`
* Update `*.conf.yml` files inside the `config/` directory with your [LambdaTest Username and Access Key](https://www.lambdatest.com)

## Running your tests
- To run a single test, run `composer single`
- To run local tests, run `composer local`
- To run parallel tests, run `composer parallel`


## Notes
* You can export the environment variables for the Username and Access Key of your LambdaTest account

  ```
  export LambdaTest_USERNAME=<LambdaTest-username> &&
  export LambdaTest_ACCESS_KEY=<LambdaTest-access-key>
  ```
