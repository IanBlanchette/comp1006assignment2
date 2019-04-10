<?php

if(!isset($_GET['pageId']))
{
	$title = "Home";
	$redirect = 'View/home.php';
}
else 
{
	switch($_GET['pageId'])
	{
		case "Login":
			$title = "Login";
			$redirect = 'View/login.php';
			break;
		case "Logout":
			include_once("Controller/users.php");
			Logout();
			$title = "Home";
			$redirect = 'View/dashboard.php';
		case "Register":
			$title = "Register";
            $redirect = 'Controller/register.php';
            break;
        case "Dashboard":
        	$title = "Dashboard";
        	$redirect = 'View/dashboard.php';
        	break;
        case "Profile":
        	$title = "Profile";
        	$redirect = 'View/profile.php';
        	break;
        case "EditProfile":
        	$title = "Edit Profile";
        	$redirect = 'View/editprofile.php';
        	break;
        case "ProfileUpdate":
        	$title = "Profile Update";
        	$redirect = 'Controller/doprofilechange.php';
        	break;	
        default:
            $title = "404";
            $redirect = "View/404.php";
            break;	

	}
}
?>
<?php include_once('View/header.php'); ?>
<?php include_once ('View/navbar.php'); ?>
<?php require($redirect); ?>
<?php include_once('View/footer.php'); ?>


















