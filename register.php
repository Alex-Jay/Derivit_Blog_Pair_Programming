<!DOCTYPE html>
<?php
if(!empty($_GET))
{
    $error_message = $_GET["error_message"];
    preg_match_all("/[a-zA-Z ]*[^!]/", $error_message, $output_array);

    foreach($output_array as $x)
    {
        $error_messageEmpty = $x[0];
        $error_messageName = $x[1];
        $error_messageEmail = $x[2];
        $error_messagePassword = $x[3];
        $error_messageConfirm = $x[4];
    }
}
else
{
        $error_messageEmpty = "";
        $error_messageName = "";
        $error_messageEmail = "";
        $error_messagePassword = "";
        $error_messageConfirm = "";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include './inc/bootstrap_plugins.php'; ?>
        <style>
            body
            {
                padding-top: 50px;
                background-color: #d8f3f4;
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
            <div class="col-md-6">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <h1>Connect with gamers and developer's around the world</h1><br>
                    <h4><strong>Share your idea -  </strong>It may become the next big thing.</h4>
                    <h4><strong>Upload your concepts -  </strong>Show of your artist skill.</h4>
                    <h4><strong>Meet new people -  </strong>Find your next squad for upcoming games.</h4>
                </div>
            </div>

            <div class="col-md-4">
                <div class="col-md-12">
                    <h1>Sign Up</h1>
                    <h4>It's free and always will be.</h4>
                    <?php echo "<span id='error'>" . $error_messageEmpty . "</span>"; ?>
                    <form class="form-horizontal" method="POST" action="register_transaction.php">
                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Your Username</label>
                            <?php echo "<span id='error'>" . $error_messageName . "</span>"; ?>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Your Email</label>
                            <?php echo "<span id='error'>" . $error_messageEmail . "</span>"; ?>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Password</label>
                            <?php echo "<span id='error'>" . $error_messagePassword . "</span>"; ?>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                            <?php echo "<span id='error'>" . $error_messageConfirm . "</span>"; ?>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Register</button>
                        </div>
                        <a href="index.php">HomePage</a>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </body>
</html>
