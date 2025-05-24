<?php
               //-------warning message-----------
               if(isset($_GET['registered']))
               {
             ?> 
                  <div class="alert alert-success alert-dismissible mt-3">
                    <a href="index.php?sign-up=1&registered=1"class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> &check; Registered</strong>  Success has been done.
                  </div>  
             <?php
               }else if(isset($_GET['invalid']))
               {
             ?>
                  <div class="alert alert-danger alert-dismissible mt-3">
                    <a href="index.php?sign-up=1&invalid=1"class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> &#9888; Password mismatched</strong>  Please try Again.
                  </div> 
             <?php
              }else if(isset($_GET['not_registered']))
              {
            ?>
                 <div class="alert alert-warning alert-dismissible mt-3">
                    <a href="index.php?sign-up=1&not_registered=1"class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> &#9888; Sorry , </strong>  you are not registered!
                  </div> 
            <?php
              }else if(isset($_GET['invalid_access']))
              {
            ?>
                 <div class="alert alert-danger alert-dismissible mt-3">
                    <a href="index.php?sign-up=1&invalid_access=1"class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> &#9888; invalid , </strong> user name or password!
                  </div> 
            <?php
              }
              elseif(isset($_GET['usernametaken']))
              {
            ?>
                 <span class=" text-danger text-center my-3">User name is alredy taken!! </span>
            <?php
              }
              else if(isset($_GET['notaken']))
              {
            ?>
                 <span class=" text-danger text-center my-3">Contact number  is alredy taken!! </span>
            <?php
              }
              else if(isset($_GET['invalidnumber']))
              {
            ?>
                 <span class=" text-danger text-center my-3">contact number must be in 10 digit!! </span>
            <?php
              }
?>



<?php
   require_once("admin/inc/config.php");
   $fetchingElections= mysqli_query($db,"SELECT * FROM elections ")OR die(mysqli_error($db));

   while($data= mysqli_fetch_assoc($fetchingElections))
   {
    $stating_date = $data['starting_date'];
    $ending_date = $data['ending_date'];
    $curr_date = date("Y-m-d");
    $election_id = $data['id'];
    $status = $data['status'];

         // Active = Expire = Ending Date
        // InActive = Active = Starting Date

        if($status == "Active")
        {
            $date1=date_create($curr_date);
            $date2=date_create($ending_date);
            $diff=date_diff($date1,$date2);
        
            if((int)$diff->format("%R%a ") < 0)
            {
               mysqli_query($db,"UPDATE elections SET status = 'Expired' WHERE id= '". $election_id ."'" ) OR die(mysqli_error($db));
            
            }
        }
        
        elseif($status == "inActive")
        {
            $date1=date_create($curr_date);
            $date2=date_create($stating_date);
            $diff=date_diff($date1,$date2);
        
            if((int)$diff->format("%R%a ") <= 0)
            {
              mysqli_query($db,"UPDATE elections SET status = 'Active' WHERE id= '". $election_id ."'" ) OR die(mysqli_error($db));

            }
        }    

   }

 ?>




<!DOCTYPE html>
<html>
    
<head>
<title>Login - Online Voting System</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/rg.css">

</head>

<body>
	
				
                <?php 
                    if(isset($_GET['sign-up']))
                    {
                ?>
                
		
                <div class=" register  ">
                <div class="row" style="margin-top: 35px;">
                
                    <div class="col-md-5 register-left" style="margin-top: -10px;">
                    
                        <h1 class=" ttc ">Welcome</h1>
                        <p class="ttc mb-5"><b>Want to live better? Choose your leaders wisely.<br>Want progress? Go and elect the suitable one.</b></p>
                        <a href="index.php" class="btn login_btn  mt-5" style="width: 250px;">Login</a>
                        <br/>
                    </div>
                    <div class="col-md-7 register-right">
                        
                    <h2 class="register-heading">Registration Form</h2>
                          
                                <div class="row  justify-content-center register-form">
                                    <div class="col-md-6 mt-3">
                                    
                                    <form method="POST" enctype="multipart/form-data ">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="su_username" class="form-control input_user" placeholder="Username" required />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="su_contactno" class="form-control input_pass" placeholder="Contact no" required />
                                </div>
                                <div class="input-group mb-3">
                                   <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                    </div>
                                  <input type="text" name="su_birth" onfocus="this.type='date'" placeholder="Birth Date" class="form-control" required/>
                               </div>
                                        
                                </div>
                                <div class="col-md-6 mt-3">
                                <div class="form-group">
                                
                                
                              
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="su_password" class="form-control input_pass" placeholder="Password" required />
                                </div>     
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="su_confirm_password" class="form-control input_pass" placeholder="confirm Password" required />
                                </div>
                                <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="su_gender" value="male" checked>
                                                    <span> <b>Male </b></span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="su_gender" value="female">
                                                    <span><b>Female</b> </span> 
                                                </label>
                                            </div>
                                        </div>
                                </div>    
                            </div>
                            <div class="d-flex justify-content-center login_container">
                                <button type="submit" name="sign_up_btn" onclick="popUp()"  class=" btn login_btn"  style="background-color: powderblue; width: 200px;">Sing up</button>
                            </div>
                            </form>
                    
                                       
                                       
                                    </div>
                                   
                            </div>
                            
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                <?php
                    }else {
                ?>
                <div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
					<img src="assets/images/logo.gif" class="brand_logo" alt="Logo">
					</div>
				</div>
                        <div class="d-flex justify-content-center form_container">
                            <form method="POST">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="username" class="form-control input_user" placeholder="username" required />
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control input_pass" placeholder="Password" required />
                                </div>
                                    <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="loginBtn" class="btn login_btn">Login</button>
                        </div>
                            </form>   
                        </div>
                
                        <div class="mt-4">
                            <div class="d-flex justify-content-center links text-white">
                                Don't have an account?
                            </div>
                            <div class="d-flex justify-content-center links">
                            <a href="?sign-up=1" class="ml-2 text-white">create an account</a>
                            </div>
                        </div>
                        </div>
		</div>
	</div>
                <?php
                    }                 
                ?>
               
               <?PHP


                      //-------warning message end-----------
                   ?>
                				
		
   
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php
 require_once("admin/inc/config.php");
 if(isset($_POST['sign_up_btn']))
     {
       // ------sign up section------
      $su_username = mysqli_real_escape_string($db,$_POST['su_username']);
      $su_contactno = mysqli_real_escape_string($db, $_POST['su_contactno']);
      $su_password = mysqli_real_escape_string($db, sha1($_POST['su_password']));
      $su_confirm_password = mysqli_real_escape_string($db, sha1($_POST['su_confirm_password']));

    //   $targetted_folder="../assets/images/user_photo/";
    //   $user_photo= $targetted_folder . rand(1111111111,99999999999). "_" . rand(1111111111,99999999999).$_FILES['user_photo'] ['name']; 
    //   $user_photo_tmp_name= $_FILES['user_photo']['tmp_name'];
    //   $user_photo_type = strtolower(pathinfo($user_photo,PATHINFO_EXTENSION));
    //   $allowed_type= array("jpg","png","jpeg");
    //   $image_size = $_FILES['user_photo']['size'];
    $image = $_FILES['image']['name'];
    $image = filter_var($image,PATHINFO_EXTENSION);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'assets/images/user_photo/'.$image;
    
      
      
      
      

      $su_birth = mysqli_real_escape_string($db,$_POST['su_birth']);
      $su_gender = mysqli_real_escape_string($db,$_POST['su_gender']);
      $user_roll = "voter"; 
      // ---------cheang the logic---------
      $fetchingData = mysqli_query($db,"SELECT * FROM users WHERE username = '". $su_username ."'") or die(mysqli_error($db) );
      $data = mysqli_fetch_assoc($fetchingData);  
      if (mysqli_num_rows($fetchingData) <= 0)
        {    
            if($su_password == $su_confirm_password && strlen( $su_contactno) == 10)
                {
                    
                    ?>
                          <script> location.assign("index.php?sign-up=1&registered=1"); </script>
                     <?php  

                        mysqli_query($db,"INSERT INTO users(username, contact_no, password, user_role, birth_date, gender ) VALUES('". $su_username."','". $su_contactno."','". $su_password."','". $user_roll."','". $su_birth ."','".$su_gender ."')") or die(mysqli_error($db));
                    
                                    
                }
                else 
                {
                         if($su_password != $su_confirm_password ){
                        ?>
                        <script> location.assign("index.php?sign-up=1&invalid=1");</script>  
                        <?php
                         }
                         if(strlen( $su_contactno) != 10)
                         {
                            ?>
                            <script> location.assign("index.php?sign-up=1&invalidnumber=1");</script>  
                            <?php
                         }
                }
            }
            else if( $su_username == $data['username'] || $su_contactno == $data['contact_no']  )
            {
                if($su_username == $data['username'])
                {
                         ?>
                        <script> location.assign("index.php?sign-up=1&usernametaken=1");</script>  
                        <?php
                }
                if( $su_contactno == $data['contact_no'])
                {
                    ?>
                    <script> location.assign("index.php?sign-up=1&notaken=1");</script>  
                    <?php
                }
            }

        }else if(isset($_POST['loginBtn']))
        {
            //------- login section-------------
            move_uploaded_file($image_tmp_name, $image_folder);
            $username = mysqli_real_escape_string($db,$_POST['username']);
            $password = mysqli_real_escape_string($db, sha1($_POST['password']));
             $fetchingData = mysqli_query($db,"SELECT * FROM users WHERE username = '". $username ."'") or die(mysqli_error($db) );
                
             if (mysqli_num_rows($fetchingData) > 0)
               {
                $data = mysqli_fetch_assoc($fetchingData);
                    if( $username == $data['username'] AND $password==$data['password'])
                    {
                            session_start();
                            $_SESSION['user_role']=$data['user_role'];
                            $_SESSION['username']=$data['username'];
                            $_SESSION['user_id']=$data['id'];
                            
                           
                           
                            if($data['user_role']=="Admin")
                            {
                                $_SESSION['key']="AdminKey";
                                ?>
                                        <script>location.assign("admin/index.php?HomePage=1"); </script>
                                <?php
                            }else
                            {
                                $_SESSION['key']="Voterkey";
                                ?>
                                        <script>location.assign("voters/index.php?HomePage=1") </script>
                                <?php
                            }
                    }else{
                              ?>
                                <script> location.assign("index.php?&invalid_access=1"); </script>  
                              <?php
                         }
               
               }else{
                        ?>
                        <script> location.assign("index.php?&not_registered=1"); </script>  
                        <?php

                   }


        }