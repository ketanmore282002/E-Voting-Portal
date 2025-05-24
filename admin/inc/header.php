<?php
    session_start();
    require_once("config.php");

    if( $_SESSION['key'] != "AdminKey")
    {
        ?>
        <script> location.assign('logout.php')</script>
        <?php
        die;
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Panel</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link  rel="stylesheet" href="css/helper.css" >
    <link rel="stylesheet" href="css/style.css" >

</head>

    <body class="fix-header">

    <!-- <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div> -->
    
    <div id="main-wrapper">
     
        <div class="header">
            <div class="row bg-black  text-white">
                <div class="col-1 ">
                        <img class="ml-3" src="../assets/images/logo.gif" width="50px"/>
                </div>
                <div class="col-10 my-auto">
                        <h3>Online Voting System - <small>Welcome <?php echo $_SESSION['username'];      ?> </small></h3>
                </div>

            </div>
        </div>
