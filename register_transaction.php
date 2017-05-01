<?php

require_once 'database.php';
/*redirect to the index page
if (empty($_POST)) {
    header("location:register.php");
    $error_message = "The input fields are empty!";
    header("location:register.php?error_message=" . $error_message);   #redirect to the index page
    exit; //stops the code
}*/
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
$hash_salt = NULL;

$nameValid = false;
$emailValid = false;
$passwordValid = false;
$confirmPasswordValid = false;
//Check if inputs are valid
/*if (!is_string($name) || !is_string($number_of_years) || !is_numeric($investment_amount)) {
    if (!is_numeric($yearly_interest_rate)) {
        $error_message = "The yearly interest rate must be a number!<br/>";
    }
    if (!is_numeric($number_of_years)) {
        $error_message = "The number of years must be a number!<br/>";
    }
    if (!is_numeric($investment_amount)) {
        $error_message = "The investment amount must be a number!<br/>";
    }
    header("location:register.php?error_message=" . $error_message);   #redirect to the index page
}*/

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
    echo "Email is good!";
    $emailValid = true;
} 
else 
{
    echo "Email is bad!";
    $emailValid = false;
}

//validate password using regex
$regexPassword = "#[a-zA-Z0-9.-_]{7,}#";

if (preg_match($regexPassword, $password)) 
{
    echo "Password is good!";
    $passwordValid = true;
} 
else 
{
    echo "Password is bad!";
    echo "combination of atleast 7 characters and numbers";
    $passwordValid = false;
}

if($password == $confirm)
{
    echo 'Confirm password matches';
    $confirmPasswordValid = true;
}
else 
{
    echo 'confirm password is not the same';
    $confirmPasswordValid = false;
}

foreach($userData as $user)
{
    if($user['user_name'] === $name)
    {
        echo 'Name Already Taken.';
        $nameValid = false;
    }
    else
    {
        $nameValid = true;
    }
    if($user['user_email'] === $email)
    {
        echo 'Email Already Taken.';
        $emailValid = false;
    }
    else
    {
        $emailValid = true;
    }
}

if($nameValid === true && $emailValid === true && $passwordValid === true && $confirmPasswordValid === true)
{
    $hash_salt = "fasn32kjbkj3nbkjbagjkabgjabgka";
    $hash_pw = password_hash($password, PASSWORD_BCRYPT, ["salt" => $hash_salt]);
    
    $sql = 'INSERT INTO users(user_id, user_name, user_password, hash_salt, user_email, reg_date)
              VALUES (:user_id, :user_name, :user_password, :hash_salt, :user_email, :reg_date)';

    $stmt = $db->prepare($sql);
               $pArray = array( "user_id"=>NULL,
                                "user_name"=> $name, 
                                "user_password"=>$hash_pw, 
                                "hash_salt"=>$hash_salt, 
                                "user_email"=>$email,
                                "reg_date"=>NULL);
            $stmt->execute($pArray);
            header("location: index.php");
            unset($db);
}
die();
?>
