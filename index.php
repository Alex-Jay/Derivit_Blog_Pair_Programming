<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Derivit: Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include './inc/bootstrap_plugins.php'; ?>
        <link rel="stylesheet" type="text/css" href="css/blog.css" />
        <style>
            body
            {
                padding-top: 50px;
            }
        </style>
    </head>

    <body>
        <?php include './inc/navbar.php'; ?>
        <div class="modal-body row">
            <div class="col-md-2 ">
            </div>
            <div class="col-md-8">
                <?php include './inc/blog.php'; ?>
            </div>
            <div class="col-md-2 ">
                <div class="col-md-12">
                </div>
            </div>
        </div>
        
    </body>
</html>
