<?php
require_once 'database.php';
session_start();
$postId = $_SESSION['post_id'];
$commentId = $_GET['commentId'];
$userId = $_SESSION['user_id'];

$stmt = "DELETE FROM comments WHERE comment_id = $commentId AND user_id = $userId";
$db->query($stmt);
header("location: viewPost.php?id=$postId");
unset($db);
