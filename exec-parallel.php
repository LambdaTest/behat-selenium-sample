#!/usr/bin/env php
<?php

require 'vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;


$config_file = getenv('CONFIG_FILE');
if(in_array('-c', $argv)){
    $config_file = $argv[array_search('-c', $argv) + 1];
}

if(!$config_file) $config_file = 'config/single.conf.yml';

$CONFIG = Yaml::parse(file_get_contents($config_file))["default"]["suites"]["default"]["contexts"][0]["FeatureContext"]["parameters"];


$procs = array();

foreach ($CONFIG['environments'] as $index => $value) {
    // TEST_RUN_ID=0 ./bin/behat --config=single.conf.yml 2>&1
    putenv("TEST_RUN_ID=$index");
    $cmd = realpath("./bin/behat") . " --config=" . $config_file . " 2>&1\n";
    print $value['platformName'] . ", " . $value['browserName'] . ", " . $value['browserVersion'] . "\n";
    $procs[$index] = popen($cmd, "r");
}

foreach ($procs as $key => $value) {
    while (!feof($value)) { 
        print fgets($value);
    }
    pclose($value);
}

?>
