<?php
        $election_id=$_GET['viewresult'];

?>
  <div class="page-wrapper">
  <div class="container-fluid">
            <div class="col-lg-12">
<div class="row my-3">
      <div class="col-12 ">
      <div class="card card-outline-primary">
      <div class="card-header">
             <h4 class="m-b-0 text-white">Election result</h4>
       </div>
      </div>
      <?php 
       $fetchinguserv=mysqli_query($db, "SELECT * FROM users WHERE user_role='voter'") or die(mysqli_error($db));
       $totalusersv=mysqli_num_rows($fetchinguserv);

       $fetchingvoted=mysqli_query($db, "SELECT * FROM votings WHERE election_id='". $election_id."'") or die(mysqli_error($db));
       $totalvoted=mysqli_num_rows($fetchingvoted);
       $remaning= $totalusersv - $totalvoted;
      ?>
      <div class="row">
            
                 
                     <div class="col-md-4 ">
                        <div class="card shh p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                   
                                    <span><i class="fa fa-home f-s-50 "></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                     <h1 class="mb-2" style="font-size: 30px;"><?php echo $totalusersv;  ?></h1>
                                    <p class="m-b-0">Total voters</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="card shh p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                   
                                    <span><i class="fa fa-archive f-s-50 "></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                     <h1 class="mb-2" style="font-size: 30px;"><?php echo $totalvoted; ?></h1>
                                    <p class="m-b-0">Total vte</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="card shh p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                   
                                    <span><i class="fa fa-home f-s-50 "></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                     <h1 class="mb-2" style="font-size: 30px;"><?php echo $remaning; ?></h1>
                                    <p class="m-b-0">Total Elecction</p>
                                </div>
                            </div>
                        </div>
                    </div>
            
      </div>
      <div class="card card-outline-primary">
            <?php 
              $fetchingActiveElection=mysqli_query($db, "SELECT * FROM elections WHERE id='".$election_id."'") or die(mysqli_error($db));
              $totalActiveElection=mysqli_num_rows($fetchingActiveElection);
              if($totalActiveElection > 0)
              {
                  while($data=mysqli_fetch_assoc($fetchingActiveElection))
                  {
                        $election_id= $data['id'];
                        $election_topic=$data['election_topic'];
                        ?>
                        
                        <table class="table ">
                              <thead>
                                   <tr>
                                         <th colspan="4" class="text-white"><h5 style=" text-align: left;">ELECTION TOPIC: <?php echo $election_topic ;?></h5></th>
                                        
                                   </tr>
                                         <tr>
                                               <th>photo</th>
                                               <th>Candidate Details</th>
                                               <th># of voters</th>
                                               <!-- <th>Action</th> -->
                                          </tr>
                                          
                                  

                               </thead>
                               <tbody>
                                    <?php 
                                           $fetchCandidtas= mysqli_query($db,"SELECT * FROM candidates_details WHERE election_id ='".$election_id."'") OR die(mysqli_error($db));
                                           while($candidateData=mysqli_fetch_assoc($fetchCandidtas))
                                           {
                                                $candidate_id = $candidateData['id'];
                                                $candition_photo=$candidateData['candidate_photo'];

                                                $fetchingVote=mysqli_query($db,"SELECT * FROM votings WHERE candidate_id ='". $candidate_id."'") or die(mysqli_error($db));
                                                $totalVotes= mysqli_num_rows($fetchingVote);
                                               ?>
                                                <tr>
                                                      <td><img src="<?php echo $candition_photo;?>" class="candidate_photo"></td>
                                                      <td><?php echo "<b>".$candidateData['candidate_name']."</b><br/>".$candidateData['candidate_details'];?></td>
                                                      <td><?php echo $totalVotes ;?></td>
                                                      
                                                     
                                                </tr>
                                                <?php
                                           }

                                    ?>
                               </tbody>
                        </table>

                        <?php 
                  }
                
                 
              }else
              {
                  echo "No any avtive election";
              }

            ?>
            
      
      </div></div>
</div></div>