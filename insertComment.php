<?php
    require_once './database.php';
    session_start();
    $postId = $_GET['id'];
    $comment = $_POST['comment'];
    
    $sql = "INSERT INTO comments (comment_id, post_id, user_id, comment_body, comment_timestamp) VALUES (:comment_id, :post_id, :user_id, :comment_body, :comment_timestamp)";

    $stmt = $db->prepare($sql);
               $pArray = array( "comment_id"=>NULL,
                                "post_id"=> $postId, 
                                "user_id"=>$_SESSION['user_id'], 
                                "comment_body"=>$comment,
                                "comment_timestamp"=>NULL);
            $stmt->execute($pArray);
            header("location: viewPost.php?id=$postId");
            unset($db);
    