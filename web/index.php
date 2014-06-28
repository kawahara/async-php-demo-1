<?php

require_once __DIR__.'/../vendor/autoload.php';

use Kohkimakimoto\BackgroundProcess\BackgroundProcess;

http_response_code(202);
header('Content-Type: application/json');

$fileKey = time().rand(1, 10000000);

$process = new BackgroundProcess(
    'php '.__DIR__.'/../heavy.php '.$fileKey,
    [],
    ['key' => $fileKey]
);
$process->run();

echo json_encode([
    'key' => $process->getKey()
]);
