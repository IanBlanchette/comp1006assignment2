<?php

$messages = "";

if(isset($_POST["username"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];

    include_once("Controller/users.php");

    $messages = Register($username, $password, $confirm);
}
else {
    $messages = "";
}

$title = "Register";

?>
<main class="container">
	<?php if ($messages != "") : ?>
        <div class="alert alert-danger"><?php echo $messages ?></div>
    <?php endif ?>

		<div class="row">
            <div class="col-md-offset-4 col-md-4">
                <h1>User Registration</h1>
                <form method="post" action="index.php?pageId=Register">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input name="username" type="text" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input name="password" type="password" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="confirm">Confirm Password:</label>
                        <input name="confirm" type="password" class="form-control" required />
                    </div>
                    <div class="form-group text-right">
                        <input type="submit" class="btn btn-success" value="Submit"/>
                        <a href="index.php">
                            <input type="button" class="btn btn-warning" value="Cancel"/>
                        </a>
                    </div>
                </form>
            </div>
        </div>
	</main>
