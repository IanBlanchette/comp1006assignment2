<?php 

include_once('users.php');
checkAuthentication();
include_once('database.php');
include_once('profilefunctions.php');

$user_id = $_SESSION['user_id'];
$email = filter_input(INPUT_POST, "EmailTextField");
$location = filter_input(INPUT_POST, "LocationTextField");
$skills = filter_input(INPUT_POST, "SkillsTextField");
$image = filter_input(INPUT_POST, "ImageTextField");

updateProfile($user_id, $email, $location, $skills, $image); 

header('Location: index.php?pageId=Profile');

?>