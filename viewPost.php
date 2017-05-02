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
                background-color: #d8f3f4;
                overflow: hidden;
            }
            .media
            {
                background-color: white;
                padding: 20px;
            }
            
            .media, .comment_body
            {
                -webkit-box-shadow: 0px 2px 17px 0px rgba(0,0,0,0.18);
                -moz-box-shadow: 0px 2px 17px 0px rgba(0,0,0,0.18);
                box-shadow: 0px 2px 17px 0px rgba(0,0,0,0.18);
                border-radius: 10px;
            }
            #footer
            {
                background-color: #e8e8e8;
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
            
            #post_image
            {
               margin:auto;
            }
            
            #post_info
            {
                float: right;
                margin-top: 150px;
            }
            
            #voteButton
            {
                float: right;
                margin-top: -20px;
                margin-left: 10px;
            }
            
            #voteButton button
            {
                background: #68c4ff;
                color: black;
            }
        </style>
    </head>
    <body>
        <?php include './inc/navbar.php'; ?>
        <div class="modal-body row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <?php include './inc/post.php'; ?>
            </div>
            <div class="col-md-1">
            </div>
        </div>
    </div>
</body>
</html>
