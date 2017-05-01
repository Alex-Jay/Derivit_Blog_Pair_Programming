<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
// make sure that there is no other session running
session_unset();
session_destroy();
session_start();

if(!empty($_GET))
{
    $error_message = $_GET["error_message"];
}
else
{
        $error_message = "";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include './inc/bootstrap_plugins.php'; ?>
        <style>
            body
            {
                padding-top: 50px;
            }
            
            #error
            {
                color: red;
            }
        </style>
    </head>
    <body>
        <?php include 'inc/navbar_reg_login.php'; ?>
        <div class="modal-body row">
            <div class="col-md-4">
            </div>

            <div class="col-md-4">
                <div class="col-md-12">
                    <h1>Login</h1>
                    <form class="form-horizontal" method="post" action="login_transaction.php">
                        <?php echo "<span id='error'>" . $error_message . "</span>"; ?>
                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Login</button>
                        </div>
                        <a href="index.php">HomePage</a>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </body>
</html>
