<?php
require_once realpath(__DIR__ ."/vendor/autoload.php");
use Dotenv\Dotenv;
$dotenv=Dotenv::createImmutable(__DIR__ );
$dotenv->load();
$dotenv->required(['DB_USER_NAME', 'DB_HOSTNAME', 'DB_NAME', 'DB_PASSWORD'])->notEmpty();
$db_user_name = $_ENV['DB_USER_NAME'];
$db_password = $_ENV['DB_PASSWORD'];
$db_name = $_ENV['DB_NAME'];
$db_hostname = $_ENV['DB_HOSTNAME'];
$conn = mysqli_connect($db_hostname,$db_user_name,$db_password,$db_name);
if (!$conn){
    echo 'error 404 no db';
}
?>