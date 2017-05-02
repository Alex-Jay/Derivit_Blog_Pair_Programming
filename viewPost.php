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
                padding: 30px;
            }

            #addComment
            {
                background: #aed88b;
            }
            
            hr
            {
                border: 0;
                height: 0;
                border-top: 1px solid rgba(0, 0, 0, 0.1);
                border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            }
            
            #post_info
            {
                float: right;
            }
            
            #post_image
            {
               margin-top: 25px;
               margin-left: 25px;
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
