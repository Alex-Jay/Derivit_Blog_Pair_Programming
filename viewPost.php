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
                border: 1px solid black;
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
        </div>
    </body>
</html>
