<?php
namespace ArrayCache;
/**
 * Class: $classStr
 * User:  troy
 * Date:  5/7/2016
 * Time:  9:24 AM
 */
require_once 'ArrayCache.php';

$array = array(
    123,
    'animals' => array(
        'dog',
        'cat',
        'mouse',
        'bird'
    ),
    'key' => 'value',
    'foo' => 'bar'
);
$filename = dirname(__FILE__) . '/cache/example.php';

$ac = new ArrayCache($array, $filename);

$cachedArray = require_once $filename;

var_dump($cachedArray);