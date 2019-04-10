<?php

include_once('Controller/users.php');
checkAuthentication();
include_once('Controller/profilefunctions.php');
include_once('Controller/appvars.php');

$user = $_SESSION['user_id'];

$user_id = retreiveProfile($user);
?>

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1>Edit My Profile</h1>
            <form action="index.php?pageId=ProfileUpdate" method="post">
                <div class="form-group">
                    <label for="IDTextField">User ID</label>
                    <input disabled class="form-control" id="IDTextField" name="IDTextField"
                           placeholder="User ID" value="<?php echo $user_id['user_id']; ?>">
                </div>
 				<div class="form-group">
                    <label for="ImageTextField">Profile Picture</label>
                    <div class="photocontainer">
                    	<?php if($user_id['image'] == null) : ?>
                    	<img src="Assets/images/default.png">
                    	<?php else: ?>		
                    	<img src="<?php echo $user_id['image']; ?>">
                    	<?php endif ?>
                    </div>
					<div class="file-chooser">
                    	 <input type="file" name="image" id="image">
                    </div>
                </div>
                <div class="form-group">
                    <label for="NameTextField">User Name</label>
                    <input disabled type="text" class="form-control" id="NameTextField"  name="NameTextField"
                           placeholder="User Name" required  value="<?php echo $user_id['username']; ?>">
                </div>
                <div class="form-group">
                    <label for="EmailField">Email</label>
                    <input type="text" class="form-control" id="EmailTextField" name="EmailTextField"
                           placeholder="Email Address" value="<?php echo $user_id['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="LocationField">Location</label>
                    <input type="text" class="form-control" id="LocationTextField" name="LocationTextField"
                           placeholder="Location" value="<?php echo $user_id['location']; ?>">
                </div>
                <div class="form-group">
                    <label for="SkillsField">Skills</label>
                    <input type="text" class="form-control" id="SkillsTextField" name="SkillsTextField"
                           placeholder="Skills" value="<?php echo $user_id['skills']; ?>">
                </div>
                                  
                <button type="submit" id="SubmitButton" class="btn btn-primary">Submit</button>
                <a href="index.php?pageId=Profile">
                    <input type="button" class="btn btn-warning" value="Cancel"/>
                </a>

            </form>

        </div>
    </div>