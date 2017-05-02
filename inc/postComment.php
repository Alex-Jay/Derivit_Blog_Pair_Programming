<?php
    $postId = $_GET["id"];
?>
<style>
    #comment
    {
        width: 700px;
        height: 200px;
        padding: 5px;
    }
    
    #submitComment
    {
        border: 1px solid #d3d3d3;
        border-radius: 5px;
        background: white;
        height: 35px;
        padding: 5px;
    }
    #submitComment:hover
    {
        border-color: #9c9c9c;
        background: #e4e4e4;
    }
</style>
<form method="POST" action="insertComment.php?id=<?php echo $postId?>">
    <textarea id="comment" name="comment"></textarea>
    <br>
    <br>
    <input id="submitComment" type="submit" value="Submit">
</form>

