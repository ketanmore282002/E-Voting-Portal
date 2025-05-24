<div class="page-wrapper">
         
        
        
            <div class="container-fluid">
            <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Candidate Section</h4>
                            </div>
                        </div>
                         <div class="row">

<?php
         if(isset($_GET['added']))
         {
           ?>
               
               <div class="alert alert-success alert-dismissible mt-3">
                <a href="index.php?AddElectionPage=1"class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> &check; Success!</strong>  Election has been added.
               </div>  
                     
           <?php
          }elseif(isset($_GET['cdelete_id'])){
            mysqli_query($db,"DELETE FROM candidates_details WHERE id ='".$_GET['cdelete_id'] ."'")OR die (mysqli_error($db));
            ?>
             <div class="alert alert-danger alert-dismissible mt-3">
                 <a href="index.php?AddElectionPage=1"class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>&check; Success!</strong>  candidates has been DELETED successfully!
                </div>  
               
            <?php
         
          }else if (isset($_GET['largeFile']))
          {
            ?>
                 <div class="alert alert-danger alert-dismissible mt-3">
                <a href="#"class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>&#x26A0; Over size file!</strong> The file size must be smaller then 2MB.
               </div> 
                      
            <?php
          }else if (isset($_GET['invalidfile']))
          {
            ?>
                <div class="alert alert-danger alert-dismissible mt-3">
                 <a href="index.php?AddCandidatePage=1"class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>&#10005; Invalid File Type !</strong>  Only .jpg , .pgn file are allowed.
                </div>  
                      
            <?php
          }else if (isset($_GET['failed']))
          {
            ?>
                <div class="alert alert-danger alert-dismissible mt-3">
                 <a href="index.php?AddCandidatePage=1"class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>&#10005; failed !</strong> Image upload failed , please try again.
                </div>  
                      
            <?php
          }
?>

<div class="card card-outline-primary">
<div class="row my-3">
  <div class="col-5">
    
        <div class="c_1">
        <h3>Add  New Candidates</h3>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <select class="form-control" name="election_id" required >
                    <option value="">Select Election</option>
                    <?php 
                            $fetchingElections= mysqli_query($db,"SELECT * FROM elections") OR die(mysqli_error($db));
                            $isAnyElectionAdded=mysqli_num_rows($fetchingElections);
                            if($isAnyElectionAdded > 0)
                            {
                                while($row=mysqli_fetch_assoc($fetchingElections)){
                                    
                                    $election_id=$row['id'];
                                    $election_name=$row['election_topic'];
                                    $allowed_candidate=$row['no_of_candidates'];
                                     
                                    $fetchingCandidate= mysqli_query($db,"SELECT * FROM candidates_details WHERE election_id ='".$election_id."'") or die(mysqli_error($db));
                                    $added_candidets= mysqli_num_rows($fetchingCandidate);
 
                                    if($added_candidets < $allowed_candidate)
                                   {
                                        ?>
                                        <option value="<?php  echo $election_id; ?>"><?php  echo $election_name;?></option>
                                        <?php
                                   }
                                }
                            }else
                            {
                            ?>
                                   <option value="">Please add election first</option>
                            <?php
                            }
                            ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="candidate_name" placeholder="Candidate Name" class="form-control" required/>
            </div>
            <div class="form-group">
                <input type="file" name="candidate_photo"  class="form-control"  required/>
            </div>
            <div class="form-group">
                <input type="text" name="candidate_details"  placeholder="Candidate Detalis" class="form-control" required/>
            </div>
            <input type="submit" value="Add Candidate" name="addCandidateBtn"class="btn btn-success"/>
        </form>
        </div>
        
    </div>
    <!-- <div class="col-7"></div> -->
    <div class=" d-flex justify-content-center col-7" >
        <img src="..\assets\images\bb.jpg" width="400px" alt="" srcset="">
    </div>

     

    <div class="col-12 mt-3">
            <h3>Upcoming Candidates</h3>
            <table class="table">
                <thead>
                     <tr>
                        <th scope="col">S.no</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Details</th>
                        <th scope="col">Election</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         $fetchingData = mysqli_query($db ,"SELECT * FROM candidates_details") or die(mysqli_error($db));
                         $isAnycandidates_detailsAdded = mysqli_num_rows($fetchingData);
                          if($isAnycandidates_detailsAdded > 0)
                          {
                                      $sno =1;
                                      while($row = mysqli_fetch_assoc($fetchingData))
                                      {
                                        $candidate_id=$row['id'];
                                        $election_id=$row['election_id'];
                                        $fetchingElectionName=mysqli_query($db,"SELECT * FROM elections WHERE id = '". $election_id."'") OR die(mysqli_error($db));
                                        $execFatchingElectionNameQuery= mysqli_fetch_assoc($fetchingElectionName);
                                        $election_name= $execFatchingElectionNameQuery['election_topic'];
                                        
                                        $candidate_photo=$row['candidate_photo'];
                                        
                                            ?>
                                                  <tr>
                                                      <td><?php echo $sno++; ?></td>
                                                      <td><img  class="candidate_photo" src="<?php echo $candidate_photo;?>"/></td>
                                                      <td><?php echo $row['candidate_name'];?></td>
                                                      <td><?php echo $row['candidate_details'];?></td>
                                                      <td><?php echo  $election_name; ?></td>
                                                      <td>
                                                        <a href="#" class="btn btn-sm btn-warning mr-2">Edit</a>
                                                        <button class="btn btn-sm btn-danger" onclick="DeleteData(<?php  echo $candidate_id; ?>)">Delete</button>
                                                      </td>
                                                     
                                                      
                                                  </tr>
                                            <?php
                                      }     
                          }
                          else
                          {
                            ?>
                                <tr>
                                    <td colspan="7"> No any election added yet.</td>
                                </tr>
                            <?php 
                          }
                    ?>    
                </tbody>
            </table>
            </div>
</div>
                         </div></div></div>
<script>
    const DeleteData = (c_id) =>
    {
        let c = confirm("Are byou really want to delete it?");

        if(c == true)
        {
           location.assign("index.php?AddCandidatePage=1&cdelete_id=" + c_id);

        }
    }
</script>


<?php 
        if(isset($_POST['addCandidateBtn']))
        {   
            $election_id=mysqli_real_escape_string($db,$_POST['election_id']);
            $candidate_name=mysqli_real_escape_string($db,$_POST['candidate_name']);
            $candidate_details=mysqli_real_escape_string($db,$_POST['candidate_details']);
            $inserted_by= $_SESSION['username'];
            $inserted_on=date("y-m-d");

             // Photograph Lohic Starts
             $targetted_folder="../assets/images/candidate_photos/";
             $candidate_photo= $targetted_folder.rand(1111111111,99999999999).rand(1111111111,99999999999).$_FILES['candidate_photo'] ['name'];
             $candidate_photo_tmp_name= $_FILES['candidate_photo'] ['tmp_name'];
             $candidate_photo_type = strtolower(pathinfo($candidate_photo,PATHINFO_EXTENSION));
             $allowed_type= array("jpg","png","jpeg");
             $image_size = $_FILES['candidate_photo'] ['size'];
                 
            if ($image_size < 2000000) //2MB
            {
                if(in_array($candidate_photo_type,$allowed_type))
                {
                        if(move_uploaded_file($candidate_photo_tmp_name, $candidate_photo))
                        {
                            mysqli_query($db,"INSERT INTO candidates_details(election_id,candidate_name,candidate_details,candidate_photo,inserted_by,inserted_on) VALUES('".$election_id ."','".$candidate_name ."','".  $candidate_details."','".  $candidate_photo."','".  $inserted_by."','".$inserted_on ."')") or die(mysqli_error($db));
                            ?>
                            <script>location.assign("index.php?AddCandidatePage=1&added=1");</script>
                           <?php

                        }else
                        {
                            ?>
                            2 <script>location.assign('index.php?AddCandidatePage=1&failed=1')</script>;
                            <?php
               
                        }
                }else{
                    ?>
               
              3<script>location.assign('index.php?AddCandidatePage=1&invalidfile=1');</script>;
             <?php
                }

            }else{
              
                ?>
                <script> location.assign("index.php?AddCandidatePage=1&largeFile=1"); </script>  
              <?php
            }

            

           

        
        }
?>