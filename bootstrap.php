<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
require_once "vendor/autoload.php";
use Doctrine\ORM\EntityManager;
//
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$paths = array(__DIR__."/src");
//
$conn = array(
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'port' => '3306',
    'dbname' => 'gestion',
    'user' => 'root',
    'password' => '',
    'charset' => 'utf8'
);
//
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
//

$entityManager = EntityManager::create($conn, $config);
?>