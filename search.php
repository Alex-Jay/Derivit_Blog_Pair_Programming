<?php
require_once 'database.php';
include 'Utility.php';
$searchTerm = $_GET['search'];

$stmt = "SELECT * FROM posts INNER JOIN tag ON posts.tag_id = tag.tag_id WHERE post_title LIKE '%$searchTerm%' OR post_body LIKE '%$searchTerm%' OR tag.tag_name LIKE '%$searchTerm%'";
$query = $db->prepare($stmt);
$query->execute();
$searchData = $query->fetchAll();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Derivit: Search [<?php echo $searchTerm?>]</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/blog.css"/>
        <?php include './inc/bootstrap_plugins.php'; ?>
        <style>
        body
        {
            padding-top: 50px;
            background-color: #f4feff;
        }
        #post_content
        {
            margin: auto;
            width: 80%;
            margin-bottom: 20px;
        }
        #foundFor
        {
            padding: 10px;
            margin-left: 120px;
        }
        </style>
    </head>

    <body>
        <?php include './inc/navbar.php'; ?>
        <div class="modal-body row">
            <div class="col-md-2 ">
            </div>
            <div class="col-md-8">
                <h4 id='foundFor'>Found For : <?php echo $searchTerm?></h4>
                <?php foreach ($searchData as $post): ?>
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
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-2 ">
                <div class="col-md-12">
                </div>
            </div>
        </div>
        
    </body>
</html>


