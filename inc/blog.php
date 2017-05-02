<?php
require_once 'database.php';

$stmt = "SELECT * FROM posts";
$query = $db->prepare($stmt);
$query->execute();
$postData = $query->fetchAll();

function fetchCommentCount($db, $postId) {
    $stmt = "SELECT COUNT(comment_id) FROM comments WHERE post_id = $postId";
    $query = $db->prepare($stmt);
    $query->execute();
    $f = $query->fetch();
    $result = $f[0];
    return $result;
}

function fetchVoteCount($db, $postId) {
    $stmt = "SELECT COUNT(vote_id) FROM votes WHERE post_id = $postId";
    $query = $db->prepare($stmt);
    $query->execute();
    $f = $query->fetch();
    $result = $f[0];
    return $result;
}

function fetchPosterName($db, $postId)
    {
        $stmt = "SELECT user_name FROM posts INNER JOIN users ON posts.user_id = users.user_id WHERE post_id = $postId";
        $query = $db->prepare($stmt);
        $query->execute();
        $f = $query->fetch();
        $result = $f[0];
        return $result;
    }
?>

<style>
    .media
    {
        background-color: #e8e8e8;
        padding: 10px;
    }
    a, a:focus, a:hover, a:after
    {
        text-decoration: none;
        color: blue;
    }
    #post_image
    {
        height: 150px;
        width: 200px;
        border-radius: 10px;
    }
</style>

<?php foreach ($postData as $post): ?>
<?php $postId = $post['post_id'] ?>
<div class="media">
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
    </div>
</div>
<?php endforeach; ?>