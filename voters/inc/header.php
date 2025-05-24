<?php
    session_start();
    require_once("../admin/inc/config.php");

    if( $_SESSION['key'] != "Voterkey")
    {
        ?>
        <script> location.assign('../admin/inc/logout.php')</script>
        <?php
        die;
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPanel - Online Voting System</title>
    <!-- <link rel="stylesheet" href="../assets/css/pro.css"> -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body >
    
<div class="container-fluid">
    <div class="row bg-black  text-white">
        <div class="col-1">
                <img src="../assets/images/logo.gif" width="80px"/>
        </div>
        <div class="col-11 my-auto">
                <h3>Online Voting System - <small>Welcome <?php echo $_SESSION['username'];      ?></small></h3>
        </div>

    </div>
