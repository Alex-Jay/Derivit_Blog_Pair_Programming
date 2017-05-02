<?php
require_once 'database.php';
session_start();
$postId = $_GET['postId'];
$userId = $_SESSION['user_id'];

$stmt = "DELETE FROM posts WHERE post_id = $postId AND user_id = $userId";
$db->query($stmt);
header("location: index.php");
unset($db);

