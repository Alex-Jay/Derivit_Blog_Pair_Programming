<?php

require_once 'database.php';

$stmt = "SELECT user_name, user_email FROM users";
$query = $db->prepare($stmt);
$query->execute();
$userData = $query->fetchAll();

//get the data from the form
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm = $_POST["confirm"];
$hash_pw = NULL;

$nameValid = true;
$emailValid = true;
$passwordValid = false;
$confirmPasswordValid = false;

$error_message = " ";
$error_messageName = " ";
$error_messageEmail = " ";
$error_messagePassword = " ";
$error_messageConfirm = " ";

//Check if inputs are valid
if(empty($name) || empty($email) || empty($password) || empty($confirm))
{
    if(empty($name))
    {
        $error_messageName = "Name Field cannot be Empty.";
    }
    if(empty($email))
    {
        $error_messageEmail = "Email Field cannot be Empty.";
    }
    if(empty($password))
    {
        $error_messagePassword = "Password Field cannot be Empty.";
    }
    if(empty($confirm))
    {
        $error_messageConfirm = "Confirmation Password Field cannot be Empty.";
    }
    if(empty($name) && empty($email) && empty($password) && empty($confirm))
    {
        $error_message = "One or More Fields cannot be Empty.";
        $error_messageName = " ";
        $error_messageEmail = " ";
        $error_messagePassword = " ";
        $error_messageConfirm = " ";
    }
}

//validate username
foreach($userData as $user)
{
    if($user['user_name'] === $name)
    {
        $nameValid = false;
        $error_messageName = "Username already exists.";
    }
}
    
//validate email using regex
$regex = "#[a-z]"
        . "[a-zA-Z0-9.-_]*"
        . "[a-z0-9]*"
        . "@"
        . "[a-z]"
        . "[a-zA-Z0-9.-_]*"
        . "[a-z0-9]"
        . "\."
        . "[a-z]{2,3}#";


if (preg_match($regex, $email)) 
{
    foreach($userData as $user)
    {
        if($user['user_email'] === $email)
        {
            $emailValid = false;
            $error_messageEmail = "Email already exists.";
        }
    }
}

//validate password using regex
$regexPassword = "#[a-zA-Z0-9.-_]{7,}#";

if (preg_match($regexPassword, $password) && $password != NULL) 
{
    if($password == $confirm && $confirm != NULL)
    {
        $confirmPasswordValid = true;
    }
    else
    {
        $error_messagePassword = "Passwords needs to be the same.";
    }
    $passwordValid = true;
}


if($nameValid === true && $emailValid === true && $passwordValid === true && $confirmPasswordValid === true)
{
    $hash_pw = password_hash($password, PASSWORD_BCRYPT);
    
    $sql = 'INSERT INTO users(user_id, user_name, user_password, user_email, reg_date)
              VALUES (:user_id, :user_name, :user_password, :user_email, :reg_date)';

    $stmt = $db->prepare($sql);
               $pArray = array( "user_id"=>NULL,
                                "user_name"=> $name, 
                                "user_password"=>$hash_pw, 
                                "user_email"=>$email,
                                "reg_date"=>NULL);
            $stmt->execute($pArray);
            header("location: index.php");
            unset($db);
}
else 
{
    //send errors to registration
    header("location:register.php?error_message=" . $error_message . "!" . $error_messageName . "!" . $error_messageEmail . "!" . $error_messagePassword . "!" . $error_messageConfirm . "!");   #redirect to the index page
}
die();
?>
