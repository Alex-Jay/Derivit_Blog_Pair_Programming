<?php
require_once 'database.php';
$postId = $_GET["id"];
$_SESSION['post_id'] = $postId;

$stmt = "SELECT comment_id, user_name, comment_body, comment_timestamp, comments.user_id FROM comments INNER JOIN users ON comments.user_id = users.user_id WHERE post_id = $postId";
$query = $db->prepare($stmt);
$query->execute();
$commentData = $query->fetchAll();
?>

<?php foreach ($commentData as $comment): ?>
<div class="media">
    <div class="media-body text-center">
        <p><?php echo $comment['comment_body']; ?></p>
        <hr>
        <ul class="list-inline list-unstyled">
            <li><span><i class="glyphicon glyphicon-user"></i> by <?php echo $comment['user_name']; ?></span></li>
            <li>|</li>
            <li><span><i class="glyphicon glyphicon-calendar"></i> <?php echo $comment['comment_timestamp'] ?></span></li>
        </ul>
        <?php 
        $commentId = $comment['comment_id'];
        if($comment['user_id'] == $_SESSION['user_id']){echo '<a href="./deleteComment.php?commentId='. $commentId .'"><button id="deleteComment" class="btn btn-default navbar-btn"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></button></a>';}?>
    </div>
</div>
<?php endforeach;