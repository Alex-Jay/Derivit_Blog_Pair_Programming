<?php
require_once 'database.php';
require_once 'Comments.php';

$postId = $_GET["id"];
$_SESSION['post_id'] = $postId;



$stmt = "SELECT comment_id, user_name, comment_body, comment_timestamp, comments.user_id FROM comments INNER JOIN users ON comments.user_id = users.user_id WHERE post_id = $postId";
$query = $db->prepare($stmt);
$query->execute();
$commentData = $query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Comments");
?>

<?php foreach ($commentData as $comment): ?>
    <?php $postId = $comment->getPost_id(); ?>
    <div class="media">
        <div class="media-body text-center">
            <p><?php echo $comment->getComment_body(); ?></p>
            <hr>
            <ul class="list-inline list-unstyled">
                <li><span><i class="glyphicon glyphicon-user"></i> by <?php echo $comment->getUser_id(); ?></span></li>
                <li>|</li>
                <li><span><i class="glyphicon glyphicon-calendar"></i> <?php echo $comment->getComment_timestamp(); ?></span></li>
            </ul>
            <?php
            if (!isset($_SESSION['user_id'])) {
                echo "<style type='text/css'> #deleteComment {visibility:hidden;}</style>";
            } 
            else 
            {
                echo "<style type='text/css'> #deleteComment {visibility:visible;}</style>";
                $commentId = $comment->getComment_id();
                if ($comment->getUser_id() == $_SESSION['user_id']) 
                {
                    echo '<a id="deleteComment" href="./deleteComment.php?commentId=' . $commentId . '"><button id="deleteComment" class="btn btn-default navbar-btn"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></button></a>';
                }
            }
            ?>
        </div>
    </div>
<?php
endforeach;
