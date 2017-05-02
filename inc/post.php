<?php
require_once 'database.php';
require_once 'Utility.php';
require_once 'Posts.php';

$postId = $_GET["id"];

$stmt = "SELECT * FROM posts WHERE post_id = $postId";
$query = $db->prepare($stmt);
$query->execute();
$postData = $query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Posts");

if(isset($_SESSION['user_id']))
{
    $voteStatus = fetchHasVoted($db, $postId, $_SESSION['user_id']);
}
else
{
    $voteStatus = 1;
}

if ($voteStatus == 1)
{
    echo "<style type='text/css'> #voteButton {visibility:hidden;}</style>";
}
else
{
    echo "<style type='text/css'> #voteButton {visibility:visible;}</style>";
}
?>
<?php foreach ($postData as $post): ?>
    <div class="col-md-3">
        <div class="media">
            <div class="media-center media-top text-center">
                <img id="post_image" class="media-object" src="img/<?php echo $post->getPost_image(); ?>" alt="logo">
                <br>
                <ul class="list-group">
                    <li class="list-group-item active">Creator: <?php echo fetchPosterName($db, $postId) ?></li>
                    <li class="list-group-item">Posts: <?php
                        $userId = $post->getUser_id();
                        $stmt = "SELECT COUNT(post_id) FROM posts WHERE user_id = $userId";
                        $query = $db->prepare($stmt);
                        $query->execute();
                        $f = $query->fetch();
                        $result = $f[0];
                        echo $result;
                        ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9 ">
        <div class="media-body">
        <div class="media" id="comment_body">
            <div class="media-body text-left">
                <h3 class="media-heading"><?php echo $post->getPost_title(); ?></h3>
                <hr>
                <p><?php echo $post->getPost_body(); ?></p>
            </div>
            <ul id="post_info" class="list-inline list-group">
                <li><span><i class="glyphicon glyphicon-calendar"></i> <?php echo $post->getPost_timestamp(); ?></span></li>
                <li>|</li>
                <span><i class="glyphicon glyphicon-star"></i> <?php echo fetchVoteCount($db, $postId) ?> votes</span>
                <li>|</li>
                <i class="glyphicon glyphicon-tag"></i> <span class="label label-primary"><?php echo fetchTag($db, $postId); ?></span>
                <form id="voteButton" method="POST" action="./insertVote.php?id=<?php echo $postId?>">
                    <button type="submit" class="btn btn-default navbar-btn"><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span><br>Vote</button>
                </form>
            </ul>
        </div>
        </div>

        <?php include './inc/messages.php'; ?>
        <div id="addComment" class="media text-center">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#myModal">Add Comment</button>

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
    </div>
<?php endforeach; ?>