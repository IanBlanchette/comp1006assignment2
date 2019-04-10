<?php
require("database.php");

function checkAuthentication()
{
  
    if (empty($_SESSION['user_id']))
    {
        header('location: index.php?pageId=Login');
        exit();
    }
}

function Login($username, $password)
{
    $password = hash('sha512', $password);
    $messages = "";

    try
        {

            $db = DBConnect();
            $sql = "SELECT user_id FROM user WHERE username = :username AND password = :password";

            $cmd = $db->prepare($sql);
            $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
            $cmd->bindParam(':password', $password, PDO::PARAM_STR, 128);
            $cmd->execute();
            $users = $cmd->fetchAll();

            $count = $cmd->rowCount();
                if ($count === 0) 
                {
                    $messages = "Invalid Username or Password";
                    $cmd->closeCursor();
                }
                else 
                    {
                        session_start();
                        $messages = "It worked"; 
                            foreach  ($users as $user) 
                                {
                                    $_SESSION['user_id'] = $user['user_id'];
                                    header('Location: index.php?pageId=Dashboard');
                                }
                    }
            }
        
        catch(Exception $e) 
            {
                $messages = $e->getMessage();
            }

        return $messages;
    }

function Register($username, $password, $confirm){
    $messages = "";
    $uniqueUsername = false; 
    try 
    {
        $db = DBConnect();
        $query = "SELECT * FROM user WHERE username = :username;";
        $statement = $db->prepare($query); 
        $statement->bindParam(':username', $username, PDO::PARAM_STR, 50);
        $statement->execute(); 
        $count = $statement->rowCount();
        
        if($count == 1) 
            { 
                $messages="Invalid Username. Username already in use";
                return $messages;
            }
        if (empty($username))
        {
            $message = "Username cannot be blank";
        }
        if(empty($password))
        {
            $messages = "Password is required";
        }
        if($password != $confirm)
        {
            $messages = "Password does not match";
        }
        else 
        {
            $uniqueUsername = true; 
        }
        $statement->closeCursor();
        
    }
    catch (Exception $e)
    {
        $messages = $e->getMessage(); 
    }

    if($uniqueUsername)
    {
        try 
        {
            
            $db = DBConnect();
            $hashed_password = hash('sha512', $password);
            $query = "INSERT INTO user (username, password) VALUES (:username, :password)";
            $statement = $db->prepare($query);
            $statement->bindValue(':username', $username);
            $statement->bindValue(':password', $hashed_password);
            $statement->execute();
            $statement->closeCursor();
            $messages = Login($username, $password);
        }
        catch (Exception $e)
        {
            $messages = $e->getMessages();
        }
    }
    return $messages;

    }

function Logout()
    {
        ob_start();
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php?pageId=Login');
        ob_flush();
    }
?>
