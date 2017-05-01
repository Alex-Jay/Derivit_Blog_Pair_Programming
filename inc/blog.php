<?php
    require_once 'database.php';
    
    $stmt = "SELECT * FROM posts";
    $query = $db->prepare($stmt);
    $query->execute();
    $postData = $query->fetchAll();
    
    function fetchCommentCount($db, $postId)
    {
        $stmt = "SELECT COUNT(comment_id) FROM comments WHERE post_id = $postId";
        $query = $db->prepare($stmt);
        $query->execute();
        $f = $query->fetch();
        $result = $f[0];
        return $result;
    }
    
    function fetchVoteCount($db, $postId)
    {
        $stmt = "SELECT COUNT(vote_id) FROM votes WHERE post_id = $postId";
        $query = $db->prepare($stmt);
        $query->execute();
        $f = $query->fetch();
        $result = $f[0];
        return $result;
    }
    
    function fetchPostTimeStamp($db, $postId)
    {
        $stmt = "SELECT post_timestamp FROM posts WHERE post_id = $postId";
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
<?php foreach($postData as $post): ?>
    <?php $postId = $post['post_id']?>
    <div class="media">
        <div class="media-left media-top">
           <img id="post_image" class="media-object" src="img/<?php echo $post['post_image']; ?>" alt="logo">
        </div>
        <div class="media-body">
            <a href="viewPost.php?=<?php echo $post['post_id']; ?>"><h4 class="media-heading"><?php echo $post['post_title']; ?></h4></a>
            <?php echo $post['post_body']; ?>
            <p>COMMENTS: <?php echo fetchCommentCount($db, $postId) ?></p>
            <p>VOTES: <?php echo fetchVoteCount($db, $postId) ?></p>
            <p>TIMESTAMP: <?php echo fetchPostTimeStamp($db, $postId) ?></p>
        </div>
    </div>
<?php endforeach; ?>