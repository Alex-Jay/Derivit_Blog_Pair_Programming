<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">DERIVIT</a>
            <a class="navbar-brand">
                <img alt="Brand" src="./img/logo.png" width="20px" height="20px">
            </a>
        </div>
        <form class="navbar-form navbar-left" method="GET" action="./search.php" role="search">
            <div class="form-group">
                <input id="search" name="search" type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Go</button>
        </form>
        <?php
        if (isset($_SESSION["user_id"])) 
        {
            include './inc/profile.php';
        }
        else
        {
            include './inc/login_sign_up.php';
        }
        ?>
    </div>
</nav>


