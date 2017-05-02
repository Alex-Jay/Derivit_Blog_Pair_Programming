<?php

require_once './database.php';
session_start();
$postId = $_GET['id'];

$sql = "INSERT INTO votes (vote_id, post_id, user_id, has_voted) VALUES (:vote_id, :post_id, :user_id, :has_voted)";

$stmt = $db->prepare($sql);
$pArray = array("vote_id" => NULL,
    "post_id" => $postId,
    "user_id" => $_SESSION['user_id'],
    "has_voted" => 1);
$stmt->execute($pArray);
header("location: viewPost.php?id=$postId");
unset($db);
