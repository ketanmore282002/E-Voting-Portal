
 
        
        <div class="page-wrapper">
            <div class="container-fluid">
            <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Election Section</h4>
                            </div>
                        </div>
                        
 <div class="row">

<?php
          if(isset($_GET['added']))
          {
            ?>
                <div class="alert alert-success alert-dismissible mt-3">
                 <a href="index.php?AddElectionPage=1"class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>&check; Success!</strong>  Election has been added.
                </div>  
                      
            <?php
          }elseif(isset($_GET['delete_id'])){
            mysqli_query($db,"DELETE FROM elections WHERE id ='".$_GET['delete_id'] ."'")OR die (mysqli_error($db));
            ?>
             <div class="alert alert-danger alert-dismissible mt-3">
                 <a href="index.php?AddElectionPage=1"class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>&check; Success!</strong>  Election has been DELETED successfully!
                </div>  
               
            <?php
               

          }elseif(isset($_GET['update']))
          {
            ?>
                <div class="alert alert-success alert-dismissible mt-3">
                 <a href="index.php?AddElectionPage=1"class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>&check; Success!</strong>  Election has been Edited.
                </div>  
                      
            <?php
          }
?>


<div class="card card-outline-primary">
<div class="row my-3">
  <div class="col-5">
    
        <div class="c_1">
        <h3>Add  New Election</h3>
       
        <form method="post">
            <div class="form-group">
                <input type="text" name="Election_topic" placeholder="Election Topic" class="form-control" required/>
            </div>
            <div class="form-group">
                <input type="number" name="number_of_candidates" placeholder="No of Candidates" class="form-control" required/>
            </div>
            <div class="form-group">
                <input type="text" name="starting_date" onfocus="this.type='date'" placeholder="Starting Date " class="form-control" required/>
            </div>
            <div class="form-group">
                <input type="text" name="ending_date" onfocus="this.type='date'" placeholder="Ending Date " class="form-control" required/>
            </div>
            <input type="submit" value="Add Election" name="addelectionbtn"class="btn btn-success"/>
        </form>
        </div>
        
    </div>
    <div class=" d-flex justify-content-center col-7">
        <img src="..\assets\images\aaa.jpg" width="400px" alt="" srcset="">
    </div>
    
   
    <div class="col-12 mt-3">
            <h3>Upcoming Election</h3>
            <table class="table">
                <thead>
                     <tr>
                        <th scope="col">S.no</th>
                        <th scope="col">Election</th>
                        <th scope="col"># Candidates</th>
                        <th scope="col">Starting Date</th>
                        <th scope="col">Ending Date</th>
                        <th scope="col">Stetus</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                         $fetchingData = mysqli_query($db ,"SELECT * FROM elections") or die(mysqli_error($db));
                         $isAnyElectionAdded = mysqli_num_rows($fetchingData);
                          if($isAnyElectionAdded > 0)
                          {
                                      $sno =1;
                                      while($row = mysqli_fetch_assoc($fetchingData))
                                      {
                                        $election_id=$row['id'];
                                            ?>
                                                  <tr>
                                                      <td><?php echo $sno++; ?></td>
                                                      <td><?php echo $row['election_topic'];?></td>
                                                      <td><?php echo $row['no_of_candidates'];?></td>
                                                      <td><?php echo $row['starting_date'];?></td>
                                                      <td><?php echo $row['ending_date'];?></td>
                                                      <td><?php echo $row['status'];?></td>
                                                      <td>
                                                        <a href="index.php?edit_election=<?php echo $election_id; ?>" class="btn btn-sm btn-warning">Edit</a>
                                                        <button class="btn btn-sm btn-danger" onclick="DeleteData(<?php  echo $election_id; ?>)">Delete</button>
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
    const DeleteData = (e_id) =>
    {
        let c = confirm("Are byou really want to delete it?");

        if(c == true)
        {
           location.assign("index.php?AddElectionPage=1&delete_id=" + e_id);

        }
    }
</script>

<?php 
   
        if(isset($_POST['addelectionbtn']))
        {   
            $Election_topic=mysqli_real_escape_string($db,$_POST['Election_topic']);
            $number_of_candidates=mysqli_real_escape_string($db,$_POST['number_of_candidates']);
            $starting_date=mysqli_real_escape_string($db,$_POST['starting_date']);
            $ending_date=mysqli_real_escape_string($db,$_POST['ending_date']);

            $inserted_by= $_SESSION['username'];
            $inserted_on=date("y-m-d");
            

            $date1=date_create("$inserted_on");
            $date2=date_create("$starting_date");
            $diff=date_diff($date1,$date2);
            

            if($diff->format("%R%a ")>0)
            {
               $status= "inActive";
            }else{
                $status= "Active";
            }

            mysqli_query($db,"INSERT INTO elections(election_topic,no_of_candidates,starting_date,ending_date,status,inserted_by,inserted_on) VALUES('".$Election_topic ."','".$number_of_candidates ."','".  $starting_date."','". $ending_date."','". $status."','".  $inserted_by."','".$inserted_on ."')") or die(mysqli_error($db));
             ?>
               <script> location.assign('index.php?AddElectionPage=1&added=1'); </script>  
             <?php
        }
        echo"<style>
       
        </style>
        ";
?>