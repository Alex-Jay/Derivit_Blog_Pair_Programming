<?php
require_once 'database.php';
require_once 'Utility.php';

$stmt = "SELECT * FROM posts";
$query = $db->prepare($stmt);
$query->execute();
$postData = $query->fetchAll();
?>

<?php foreach ($postData as $post): ?>
    <?php $postId = $post['post_id'] ?>
    <div id="post_content" class="media">
        <a class="pull-left">
            <img class="media-object" src="img/<?php echo $post['post_image']; ?>" id="post_image">
        </a>
        <div class="media-body">
            <a href="viewPost.php?id=<?php echo $post['post_id']; ?>"><h4 class="media-heading"><?php echo $post['post_title']; ?></h4></a>
            <p class="text-right">by <?php echo fetchPosterName($db, $postId) ?></p>
            <p><?php echo $post['post_body']; ?></p>
            <ul class="list-inline list-unstyled">
                <li><span><i class="glyphicon glyphicon-calendar"></i> <?php echo $post['post_timestamp'] ?></span></li>
                <li>|</li>
                <span><i class="glyphicon glyphicon-comment"></i> <?php echo fetchCommentCount($db, $postId) ?> comments</span>
                <li>|</li>
                <span><i class="glyphicon glyphicon-star"></i> <?php echo fetchVoteCount($db, $postId) ?> votes</span>
                <li>
            </ul>
    <?php
    if (!isset($_SESSION['user_id'])) {
        echo "<style type='text/css'> #deletePost {visibility:hidden;}</style>";
    } else {
        echo "<style type='text/css'> #deletePost {visibility:visible;}</style>";
        if ($post['user_id'] == $_SESSION['user_id']) {
            echo '<a id="deletePost" href="./deletePost.php?postId=' . $postId . '"><button id="deletePost" class="btn btn-default navbar-btn"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></button></a>';
        }
    }
    ?>
        </div>
    </div>
        <?php endforeach; ?>