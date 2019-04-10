<?php
    include_once('Controller/users.php');
    checkAuthentication();
?>

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1>Dashboard</h1>

            <ul>
                <li><a href="index.php?pageId=EditProfile&userId=<?php echo $_SESSION['user_id'] ?>">Edit My Profile</a></li>
                <li><a href="index.php?pageId=Profile">View My Profile</a></li>

            </ul>


        </div>
    </div>
</div>