<?php

require_once __DIR__.'/../vendor/autoload.php';

use Kohkimakimoto\BackgroundProcess\BackgroundProcessManager;

header('Content-Type: application/json');

$manager = new BackgroundProcessManager();
$manager->setKeyPrefix('');
$process = $manager->loadProcess($_GET['key']);

if (!$process) {
    echo json_encode(['status' => 'not working']);
} else {
    echo json_encode(['status' => 'working']);
}
