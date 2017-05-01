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



/* Validate and assign input data */
/* if ((empty($email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL))) ||
  (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)))
  {
  header("location: login.php");
  }

  if (empty($password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING)))
  {
  header("location: login.php");
  } */


/* Connect to the database */
/* require_once 'configuration.php';
  $dbConnection = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
  if (mysqli_connect_errno())
  {
  header("location: login.php");
  }

 */
/* Check that user is not already user_added  
  $query = "SELECT id, password FROM users WHERE email = ?";
  $statement = $dbConnection->prepare($query);
  $statement->bind_param('s', $email);
  $statement->execute();
  if ($statement == false)
  {
  header("location: login.php");
  }


  $queryResult = $statement->get_result();
  if (($queryResult != false) && (mysqli_num_rows($queryResult) > 0))
  {

  $row = mysqli_fetch_object($queryResult);

  if ($password === $row->password)
  {
  // set user id
  $_SESSION["user_id"] = $row->id;

  // go to password protected webpage
  header("location: display_all_records.php");
  }
  else
  {
  header("location: login.php");
  }
  }
  else
  {
  header("location: login.php");
  }

  mysqli_free_result($queryResult);
  mysqli_close($dbConnection); */
?>

