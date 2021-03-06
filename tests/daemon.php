<?php
/**
 * Created by PhpStorm.
 * User: Jenner
 * Date: 2015/8/5
 * Time: 21:23
 */

date_default_timezone_set('PRC');
define('DS', DIRECTORY_SEPARATOR);
require dirname(dirname(__FILE__)) . DS . 'vendor' . DS . 'autoload.php';

error_reporting(E_ALL);

$crontab_config = [
    'mission_1' => [
        'name' => 'hello',
        'cmd' => 'php -r "echo "hello world" . PHP_EOL;sleep(60);"',
        'output' => '/www/test.log',
        'time' => '* * * * *',
        'user_name' => 'www',
        'group_name' => 'www'
    ],
    'mission_2' => [
        'name' => 'ls',
        'cmd' => 'ls -al',
        'output' => '/tmp/single_script.log',
        'time' => [
            '* * * * *',
            '1 * * * *',
        ],
    ],
];

$daemon = new \Jenner\Zebra\Crontab\Daemon($crontab_config, "logfile.log");
$daemon->start();