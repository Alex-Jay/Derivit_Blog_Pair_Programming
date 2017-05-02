<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<style type='text/css'> #addComment {visibility:hidden;}</style>";
} else {
    echo "<style type='text/css'> #addComment {visibility:visible;}</style>";
}
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include './inc/bootstrap_plugins.php'; ?>
        <link rel="stylesheet" type="text/css" href="css/viewPost.css"/>
        <style>
            body
            {
                padding-top: 50px;
            }

            .media
            {
                background-color: #e8e8e8;
                padding: 10px;
            }

            #addComment
            {
                background: #aed88b;
            }
        </style>
    </head>
    <body>
        <?php include './inc/navbar.php'; ?>
        <div class="modal-body row">
            <div class="col-md-2 ">
            </div>
            <div class="col-md-8">
                <?php include './inc/post.php'; ?>
            </div>
            <div class="col-md-2 ">
                <div class="col-md-12">
                </div>
            </div>
            <div class="col-md-8">
            </div>
            <div class="col-md-2 ">
                <div class="col-md-12">
                </div>
            </div>

        </div>
    </div>
</body>
</html>
