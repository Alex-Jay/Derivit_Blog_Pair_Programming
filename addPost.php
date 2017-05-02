<?php
session_start();
require_once 'database.php';
$post_title = $_POST['postTitle'];
$post_body = $_POST['postBody'];
$post_tag = $_POST['postTag'];
$post_img = "default.jpg";

$sql = "INSERT INTO posts (post_id, user_id, tag_id, post_title, post_body, post_image, post_timestamp) VALUES (:post_id, :user_id, :tag_id, :post_title, :post_body, :post_image, :post_timestamp)";

$stmt = $db->prepare($sql);
$pArray = array("post_id" => NULL,
    "user_id" => $_SESSION['user_id'],
    "tag_id" => $post_tag,
    "post_title" => $post_title,
    "post_body" => $post_body,
    "post_image" => $post_img,
    "post_timestamp" => NULL);
$stmt->execute($pArray);
$_SESSION['img_link'] = "";
header("location: index.php");
unset($db);
