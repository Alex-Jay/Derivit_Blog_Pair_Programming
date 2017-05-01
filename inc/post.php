<?php
    require_once 'database.php';
    $postId = $_GET["id"];

    $stmt = "SELECT * FROM posts WHERE post_id = $postId";
    $query = $db->prepare($stmt);
    $query->execute();
    $postData = $query->fetchAll();
    
    function fetchTag($db, $postId)
    {
        $stmt = "SELECT tag_name FROM posts INNER JOIN tag ON posts.tag_id = tag.tag_id WHERE post_id = $postId";
        $query = $db->prepare($stmt);
        $query->execute();
        $f = $query->fetch();
        $result = $f[0];
        return $result;
    }
?>
<?php foreach ($postData as $post): ?>
    <div class="media">
        <div class="media-left media-top">
            <img id="post_image" class="media-object" src="img/<?php echo $post['post_image']; ?>" alt="logo">
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?php echo $post['post_title']; ?></h4>
                <?php echo $post['post_body']; ?>
            <p>TIMESTAMP: <?php echo $post['post_timestamp'] ?></p>
            <p>TAG: <?php echo fetchTag($db, $postId); ?></p>
        </div>
    </div>
<?php endforeach; ?>