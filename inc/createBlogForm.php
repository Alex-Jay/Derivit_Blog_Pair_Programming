<?php
require_once 'database.php';
session_start();

$stmt = "SELECT * FROM tag";
$query = $db->prepare($stmt);
$query->execute();
$tagData = $query->fetchAll();
?>
<script language="javascript">    
    function submitForm()
    {
        document.getElementById("postForm").submit();
    }
</script>

<form id="postForm" method="POST" action="addPost.php">
    <label for="postTitle">Post Title: 
        <input type="text" id="postTitle" name="postTitle">
    </label>
    <br>
    <label for="postTitle">Post Body: 
        <textarea id="postBody" name="postBody"></textarea>
    </label>
    <br>
    Post Tag: 
    <select id='postTag' name="postTag">
        <?php foreach ($tagData as $tag): ?>
            <option value="<?php echo $tag['tag_id']; ?>"><?php echo $tag['tag_name']; ?></option>
        <?php endforeach; ?>
    </select>

    <br>
    <input type='submit' value='Submit'>
</form>

