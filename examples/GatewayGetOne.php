<?php

spl_autoload_register(function($class) {
    $root = dirname(__DIR__);
    $classFile = $root . '/lib/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($classFile)) {
        require_once $classFile;
    }
});

// $instanceName is a part of the url where you access your ipaybw installation.
// https://{$instanceName}.ipaybw.com
$instanceName = 'YOUR_INSTANCE_NAME';

// $secret is the ipaybw secret for the communication between the applications
// if you think someone got your secret, just regenerate it in the ipaybw administration
$secret = 'YOUR_SECRET';

$ipaybw = new \IPayBW\IPayBW($instanceName, $secret);

$gateway = new \IPayBW\Models\Request\Gateway();
$gateway->setId(1);

try {
    $response = $ipaybw->getOne($gateway);
    var_dump($response);
} catch (\IPayBW\IPayBWException $e) {
    print $e->getMessage();
}
