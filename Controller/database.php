<?php
if(session_status() == PHP_SESSION_NONE) 
{
    session_start();
}


function DBConnect() {

    try {
        //$dsn = 'mysql:host=127.0.0.1:51140;dbname=localdb';
        //$Username = 'azure';
        //$Password = '6#vWHD_$';


      
        $dsn = 'mysql:host=localhost;dbname=localdb';
        $Username = 'root';
        $Password = '';
        return new PDO($dsn, $Username, $Password);
    }
    catch(PDOException $e) 
    {
        $message = $e->getMessage();
        echo "An error occurred: " . $message;
        return null;
    }
}
?>