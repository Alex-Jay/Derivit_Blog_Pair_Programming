<?php
$dsn = 'mysql:host=localhost;dbname=derivit';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (Exception $e) 
{
    $error_message = $e->getMessage();
    include('database_error.php');
    die();
}
?>
