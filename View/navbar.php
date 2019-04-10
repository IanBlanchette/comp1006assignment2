<?php
    session_start();
?>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">Welcome</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                <li class=<?php echo ($title == "Home") ? "active" : "" ?>><a href="index.php"><i class="fa fa-home fa-lg"></i> Home</a></li>
                <?php if(isset($_SESSION["user_id"])) : ?>
                    <li><a href=index.php?pageId=Dashboard>Dash Board</a></li>
                    <li><a href=index.php?pageId=Logout>Logout</a></li>
                <?php else: ?>

                    <li class=<?php echo ($title == "Register") ? "active" : "" ?>><a href="index.php?pageId=Register"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Register</a></li>
                    <li class=<?php echo ($title == "Login") ? "active" : "" ?>><a href="index.php?pageId=Login">Login</a></li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>