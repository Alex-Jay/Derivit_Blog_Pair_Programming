<?php
require_once 'database.php';
session_start();

// if it exists, then destroy any previous session 
session_unset();
session_destroy();
session_start();

$name = $_POST["name"];
$password = $_POST["password"];

$stmt = "SELECT user_id, user_name, user_password FROM users";
$query = $db->prepare($stmt);
$query->execute();
$userData = $query->fetchAll();

foreach($userData as $user)
{
    if($user['user_name'] === $name)
    {
        $checkPW = password_verify($password, $user["user_password"]);
        if($checkPW === TRUE)
        {
            header("location: index.php");
            $_SESSION["user_id"] = $user["user_id"];
            break;
        }
        else
        {
            $error_message = "Username or password is incorrect";
            header("location:login.php?error_message=" . $error_message);   #redirect to the index page
        }
    }
    else
    {
        $error_message = "Username or password is incorrect";
        header("location:login.php?error_message=" . $error_message);   #redirect to the index page
    }
}
?>

