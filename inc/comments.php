<?php
    require_once 'database.php';
    $postId = $_GET["id"];

    $stmt = "SELECT user_name, comment_body, comment_timestamp FROM comments INNER JOIN users ON comments.user_id = users.user_id WHERE post_id = $postId";
    $query = $db->prepare($stmt);
    $query->execute();
    $commentData = $query->fetchAll();
?>
<?php foreach ($commentData as $comment): ?>
    <div class="media">
        <div class="media-body">
            <h4 class="media-heading"><?php echo $comment['user_name']; ?></h4>
                <?php echo $comment['comment_body']; ?>
            <p>TIMESTAMP: <?php echo $comment['comment_timestamp'] ?></p>
        </div>
    </div>
<?php endforeach; ?>