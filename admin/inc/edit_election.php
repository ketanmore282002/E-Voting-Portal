<?php
        $election_id=$_GET['edit_election'];

?>
<?php
if(isset($_GET['update']))
{
  ?>
      <div class="alert alert-success alert-dismissible mt-3">
       <a href="index.php?AddElectionPage=1"class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <strong>&check; Success!</strong>  Election has been Edited.
      </div>  
            
  <?php
}
?>
<?php
$fetchingActiveElection=mysqli_query($db, "SELECT * FROM elections WHERE id='".$election_id."'") or die(mysqli_error($db));
        while($data=mysqli_fetch_assoc($fetchingActiveElection))
                  {
                        $election_id= $data['id'];
                        $election_topic=$data['election_topic'];
                        $election_noc=$data['no_of_candidates'];
                        $s_date=$data['starting_date'];
                        $e_date=$data['ending_date'];
                  }

?>
 <div class="page-wrapper">
            <div class="container-fluid">
            <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Election Section</h4>
                            </div>
                        </div>
 <div class="card card-outline-primary">
<div class="row my-3">
      <div class="col-5 ">
        <div class="c_1">
                <h3>Editing  Election </h3>
                
                <form method="post">
                <div class="form-group">
                    <input type="text" name="e_Election_topic" value=" <?php echo $election_topic;?>" plaeceholder="Election Topic" class="form-control" required/>
                </div>
                <div class="form-group">
                    <input type="number" name="e_number_of_candidates" value=" <?php echo $election_noc;?>" placeholder="No of Candidates" class="form-control" required/>
                </div>
                <div class="form-group">
                    <input type="text" name="e_starting_date" value=" <?php echo $s_date;?>" onfocus="this.type='date'" placeholder="Starting Date " class="form-control" required/>
                </div>
                <div class="form-group">
                    <input type="text" name="e_ending_date" value=" <?php echo $e_date;?>" onfocus="this.type='date'" placeholder="Ending Date " class="form-control" required/>
                </div>
                <input type="submit" value="Add Election" name="addelectionbtn"class="btn btn-success"/>
            </form>
        </div>
      </div>
      <div class=" d-flex justify-content-center col-7">
        <img src="..\assets\images\ccc.jpg" width="400px" alt="" srcset="">
    </div>
</div>
<?php 
        if(isset($_POST['addelectionbtn']))
        {   
            $e_Election_topic=mysqli_real_escape_string($db,$_POST['e_Election_topic']);
            $e_number_of_candidates=mysqli_real_escape_string($db,$_POST['e_number_of_candidates']);
            $e_starting_date=mysqli_real_escape_string($db,$_POST['e_starting_date']);
            $e_ending_date=mysqli_real_escape_string($db,$_POST['e_ending_date']);

            $inserted_by= $_SESSION['username'];
            $inserted_on=date("y-m-d");
            

            $date1=date_create("$inserted_on");
            $date2=date_create("$e_starting_date");
            $diff=date_diff($date1,$date2);
            

            if($diff->format("%R%a ")>0)
            {
               $status= "inActive";
            }else{
                $status= "Active";
            }
            mysqli_query($db,"UPDATE elections SET election_topic = '$e_Election_topic', no_of_candidates='$e_number_of_candidates' WHERE id= '". $election_id ."'" ) OR die(mysqli_error($db));

           
             ?>
               <script> location.assign('index.php?AddElectionPage=1&update=1'); </script>  
             <?php
        }
?>
 </div></div>