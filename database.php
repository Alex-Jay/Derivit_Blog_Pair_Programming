<?php
$dsn = 'mysql:host=localhost;dbname=derivit';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    echo "Success.";
} 
catch (Exception $e) 
{
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
?>
