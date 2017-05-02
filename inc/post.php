<?php
require_once 'database.php';
$postId = $_GET["id"];

$stmt = "SELECT * FROM posts WHERE post_id = $postId";
$query = $db->prepare($stmt);
$query->execute();
$postData = $query->fetchAll();

function fetchTag($db, $postId) {
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
        <div class="media-body text-center">
            <h4 class="media-heading"><?php echo $post['post_title']; ?></h4>
            <hr>
            <p><?php echo $post['post_body']; ?></p>
        </div>
        <ul id="post_info" class="list-inline list-unstyled">
            <li><span><i class="glyphicon glyphicon-calendar"></i> <?php echo $post['post_timestamp'] ?></span></li>
            <li>|</li>
            <span><i class="glyphicon glyphicon-star"></i> 0 votes</span>
            <li>|</li>
            <i class="glyphicon glyphicon-tag"></i> <span class="label label-primary"><?php echo fetchTag($db, $postId); ?></span>
        </ul>
    </div>
    <?php include './inc/comments.php'; ?>
    <div class="media text-center">
                    <!-- Trigger the modal with a button -->
                <button id="addComment" type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#myModal">Add Comment</button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Comment</h4>
                            </div>
                            <div class="modal-body">
                                <?php include './inc/postComment.php' ?>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
<?php endforeach; ?>