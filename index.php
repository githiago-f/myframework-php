<?php
foreach(glob(__DIR__ . '/app/controllers/*.php') as $filename) {
    include_once $filename;
}

foreach (glob(__DIR__ . '/lib/*.php') as $filename) {
    include_once $filename;
}

foreach (glob(__DIR__ . '/routes/*.php') as $filename) {
    include_once $filename;
}

use Lib\Router;

Router::handle();