<?php
    require_once 'database.php';
    $stmt = "SELECT * FROM posts";
    $query = $db->prepare($stmt);
    $query->execute();
    $postData = $query->fetchAll();
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
    <div class="media">
        <div class="media-left media-top">
           <img id="post_image" class="media-object" src="img/<?php echo $post['post_image']; ?>" alt="logo">
        </div>
        <div class="media-body">
            <a href="viewPost.php?=<?php echo $post['post_id']; ?>"><h4 class="media-heading"><?php echo $post['post_title']; ?></h4></a>
            <?php echo $post['post_body']; ?>
        </div>
    </div>
<?php endforeach; ?>