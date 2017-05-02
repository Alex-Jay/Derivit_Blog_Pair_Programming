<?php
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        echo "<style type='text/css'> #addComment {visibility:hidden;}</style>";
    }
    else
    {
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
            
            .col-md-8
            {
                padding: 10px;
                margin: 10px;
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
                <?php include './inc/comments.php'; ?>
            </div>
            <div class="col-md-2 ">
                <div class="col-md-12">
                </div>
            </div>
            <div class="col-md-8 text-center">
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
                          <?php include './inc/postComment.php'?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </body>
</html>
