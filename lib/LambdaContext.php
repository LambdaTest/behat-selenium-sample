<?php

require 'vendor/autoload.php';

class LambdaContext implements Behat\Behat\Context\Context
{
    protected static $CONFIG;
    protected static $driver;
    protected static $LTUSER;
    protected static $LTKEY;

    public function __construct($parameters){
        self::$CONFIG = $parameters;

        self::$LTUSER = getenv('LT_USERNAME');
        if(!self::$LTUSER) self::$LTUSER = $GLOBALS['CONFIG']['user'];

        self::$LTKEY = getenv('LT_ACCESS_KEY');
        if(!self::$LTKEY) self::$LTKEY = $GLOBALS['CONFIG']['key'];

        // Check if driver has been created, if false then create it
        if( !self::$driver ) {
            self::createDriver();
        }
    }

    public static function createDriver() {

        # Each parallel test running will contain test run id
        $test_run_id = getenv("TEST_RUN_ID") ? getenv("TEST_RUN_ID") : 0; 
        
        # hub URL for LT
        $url = "http://" . self::$LTUSER . ":" . self::$LTKEY . "@" . self::$CONFIG['server'] .":80/wd/hub";

        # get the capabilities for this test_run_id 
        # Capabilities contains the Platform, Browser
        $caps = self::$CONFIG["environments"][$test_run_id];
        # fetch capabilities that we need to apply for each test
        foreach (self::$CONFIG["capabilities"] as $capsName => $capsValue) {
            if(!array_key_exists($capsName, $caps))
                $caps[$capsName] = $capsValue;
        }

        self::$driver = RemoteWebDriver::create($url, $caps, 120000, 120000);
    }

    /** @AfterFeature */
    public static function tearDown()
    {
        if(self::$driver)
        self::$driver->quit();
    }
}
?>
