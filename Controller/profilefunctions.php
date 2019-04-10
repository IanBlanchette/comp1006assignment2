<?php
include_once('database.php'); 

function retreiveProfile($user_id)
{
	
	$db = DBConnect();
	$query = "SELECT * FROM user WHERE user_id = :user_id;";
	$statement = $db->prepare($query);
	$statement->bindValue(':user_id', $user_id);
	$statement->execute();
	$profile = $statement->fetch();
	$statement->closeCursor();
	return $profile; 
}

function updateProfile($user_id, $email, $location, $skills, $image)
{
	$db = DBConnect();
	$query = "UPDATE user SET email = :email, location = :location, image = :image, skills = :skills WHERE user_id = :user_id;";
	$statement = $db->prepare($query);
	$statement->bindValue(':user_id', $user_id);
	$statement->bindValue(':email', $email);
	$statement->bindValue(':location', $location);
	$statement->bindValue('skills', $skills);
	$statement->bindValue('image', $image);
	$statement->execute();
	$statement->closeCursor();
}
