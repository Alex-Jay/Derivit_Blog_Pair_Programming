<?php
require_once 'database.php';
require_once 'bootstrap_plugins.php';

session_start();

$stmt = "SELECT * FROM tag";
$query = $db->prepare($stmt);
$query->execute();
$tagData = $query->fetchAll();
?>
<style>
    body
    {
        background: #f4feff;
    }
</style>
<div class="col-md-12">
    <h1>What's on your mind</h1>
    <form class="form-horizontal" method="post" action="addPost.php">
        <div class="form-group">
            <label for="postTitle" class="cols-sm-2 control-label">Title</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input type="text" class="form-control" name="postTitle" id="postTitle"  placeholder="Title"/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="postBody" class="cols-sm-2 control-label">Body</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"></span>
                    <textarea type="password" class="form-control" name="postBody" id="postBody"  placeholder="Body"></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="postTag" class="cols-sm-2 control-label">Tag</label>
            <div class="cols-sm-10">
                <select class="selectpicker" id="postTag" name="postTag">
                    <?php foreach ($tagData as $tag): ?>
                        <option value="<?php echo $tag['tag_id']; ?>"><?php echo $tag['tag_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Submit</button>
        </div>
    </form>
</div>

