<?php
require_once 'database.php';
?>
<html>
    <head>
        <?php include './inc/bootstrap_plugins.php'; ?>
        <link rel="stylesheet" type="text/css" href="css/blog.css"/>
        <style>
            body
            {
                padding-top: 50px;
                background-color: #d8f3f4;
            }
        </style>
    </head>
    <body>
        <?php include './inc/navbar.php'; ?>
        <div class="modal-body row">
            <div class="col-md-2 ">
            </div>
            <div class="col-md-8">
                <?php include './inc/createBlogForm.php'; ?>
            </div>
            <div class="col-md-2 ">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </body>
</html>

