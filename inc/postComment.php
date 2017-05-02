<?php
    $postId = $_GET["id"];
?>
<link rel="stylesheet" type="text/css" href="./css/postComment.css"/>
<form method="POST" action="insertComment.php?id=<?php echo $postId?>">
    <textarea id="comment" name="comment"></textarea>
    <br>
    <br>
    <input id="submitComment" type="submit" value="Submit">
</form>

