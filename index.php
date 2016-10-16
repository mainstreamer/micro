<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

umask(0000);

$env = 'dev';
$debug = true;
$loader = require __DIR__.'/../vendor/autoload.php';

if ($debug) {
    Debug::enable();
}

require_once __DIR__.'/../AppKernel.php';
$kernel = new AppKernel($env, $debug);

//$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
