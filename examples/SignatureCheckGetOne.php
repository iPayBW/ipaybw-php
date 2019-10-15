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

$signatureCheck = new \IPayBW\Models\Request\SignatureCheck();
try {
    $ipaybw->getOne($signatureCheck);
    die('Signature correct');
} catch (\IPayBW\IPayBWException $e) {
    print $e->getMessage();
    die('Signature wrong');
}
