<?php 
include_once('Controller/users.php');
checkAuthentication();
include_once('Controller/profilefunctions.php');
include_once('Controller/appvars.php');
$user = $_SESSION['user_id'];
$user_id = retreiveProfile($user);
?>

<div class="container">
    <h1>Welcome To <?php echo $user_id['username']; ?>'s Profile</h1>
    <h4><a href="index.php?pageId=EditProfile">Edit profile</a></h4>
    <div>
                        <?php if($user_id['image'] == null) : ?>
                        <img src="Assets/images/default.png">
                        <?php else: ?>      
                        <img src="<?php echo $user_id['image']; ?>">
                        <?php endif ?>
    </div>
    <h4>Profile Information</h4>
    <div>          
        <div class="panel panel-default">
            <div class="panel-footer">
                <h6>Location: <?php echo $user_id['location']; ?></h6>
            </div>
            <div class="panel-body my-class">
                <h6>Email: <?php echo $user_id['email']; ?></h6>
            </div>
            <div class="panel-footer">
                <h6>Skills: <?php echo $user_id['skills']; ?></h6>
            </div>
        </div>
    </div>
</div>
    
