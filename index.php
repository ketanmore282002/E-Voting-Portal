<?php 
      require_once("inc/header.php");
      require_once("inc/navigation.php");

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
   <?php
       $un=$_SESSION['username'];
       $fetchinguserdata=mysqli_query($db, "SELECT * FROM users WHERE username='".$un."'") or die(mysqli_error($db));
       while($data=mysqli_fetch_assoc($fetchinguserdata))
                   {
                         $contactno=$data['contact_no'];
                         
                         $birth_date=$data['birth_date'];
                         $gender=$data['gender'];
                   }
       
     
       ?>
  
<div class="row my-4 ml-1" >
  <div class="col-3 pl-2" style="padding-left: 5px; padding-right:5px;">
  <div class="container mt-2 mb-2  d-flex justify-content-center" style="padding: 0px; "> 
    <div class="card" style="padding: 30px; width: 100%; background: rgba(206, 214, 224,1.0);"> 
        <div class=" image d-flex flex-column justify-content-center align-items-center"> 
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREJOGKG7KAIf8MEQGsI0DbMJOtQjhHyTCFXw&usqp=CAU" style="width: 100px; border: 4px solid #AF1313; border-radius: 100%;"/>
        </div>
        <div class=" image d-flex flex-column  ">    
        <span class="name mt-3"><i class="fa-solid fa-user-tie mr-2"></i><b>User name :-</b> <?php echo $un;?></span> 
        <span class="name mt-3"><i class="fa-solid fa-mobile-screen-button  mr-2"></i><b>contact no :-</b> <?php echo $contactno;?></span>
        <span class="name mt-3"><i class="fa-solid fa-cake-candles mr-2"></i><b>date of Birth:-</b> <?php echo $birth_date;?></span> 
        <span class="name mt-3"><i class="fa-solid fa-venus-mars  mr-2"></i><b>Gender:-</b> <?php echo $gender;?></span> 
                
                <div class=" d-flex mt-5 flex-row justify-content-center align-items-center"> 
                <!-- <a href="voters/index.php?HomePage=1?editprofile" class="btn btn-sm btn-warning mr-2" ><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</a>  -->
                <a href="../admin/logout.php" class="btn btn-sm btn-danger ml-2" ><i class="fa-solid fa-arrow-right-from-bracket mr-2"></i>Log Out</a> 
                </div> 
                <div class="text mt-3"> 
                </span> 
            </div> 
            
            
        </div> 
    </div>
</div>
  </div>
  <div class="col-9 " >
<?php
   if(isset($_GET['HomePage']))
   {
      require_once("inc/homepage.php");
   }elseif(isset($_GET['upcoming_elections'])){
    require_once("inc/upcoming_elections.php");
   }elseif(isset($_GET['result'])){
    require_once("inc/result.php");
   }
   ?>
   </div>
</div></div>

<?php
require_once("inc/footer.php");
?>