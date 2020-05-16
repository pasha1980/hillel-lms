<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;

$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/../src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

$conn = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => 'secret',
    'host' => 'mysql',
    'dbname' => 'study_php',
];

$entityManager = EntityManager::create($conn, $config);
