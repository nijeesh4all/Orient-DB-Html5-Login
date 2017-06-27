<?php

session_start();
require_once 'functions.php';
//error_reporting(0);

if (isset($_SESSION['User']) and isset($_SESSION['Role'])) {
    if($_SESSION['Role'] == 'admin')
        header("Location: http://localhost/net/form.php");
    if($_SESSION['Role'] == 'school-admin')
         header("Location: http://localhost/net/audience");
    if($_SESSION['Role'] == 'nominator')
        header("Location: http://localhost/net/audience/profile.php");
}       



$user = '';
$pass = '';
$flag = true;



if (isset($_POST['user']) and isset($_POST['pass'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $Name = login($user, $pass);

    if ($Name != false) {
  
        
        $_SESSION['User'] = $Name[0];
        $_SESSION['Role'] = $Name[1];
        $_SESSION['org'] = $Name[2];
        $_SESSION['email'] = $_POST['user'];
        if($Name[1] == 'nominator')
        {
            $_SESSION['rid'] = getId('Nominator','Email',$_POST['user']); 
        }
        
        //echo $Name[1];
        //var_dump($Name);
        
        if($Name[1] == 'admin')
        {
            require 'form.php';
        }
        else if($Name[1] == 'school-admin')
        {
            header("Location: http://localhost/net/audience?id=".$_SESSION['Role']);
        }
        else if ($Name[1] == 'nominator')
        {
            header("Location: http://localhost/net/audience/profile.php?id=".$_SESSION['Role']);
        }
        
    } else {

        echo "<html>
             <head>";
        echo "<div hidden id='message'>Wrong user name or password</div>";
        require('form.php');
        die();
    }

    // echo getId('nation','India');
    
    
} else {

    if (!isset($_SESSION['user'])) {
        echo "<html>

        <head>";
        echo "<div hidden id='message'>Please Login To Continue</div>";
        require('index.php');
        die();
    }
    echo "<html>

    <head>";
    echo "<div hidden id='message'>In Valid Login Please Try Again</div>";
    require('index.php');
}
?>