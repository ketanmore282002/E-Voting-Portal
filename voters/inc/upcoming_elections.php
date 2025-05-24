<div class="row my-3">
      <div class="col-12 ">
            <div class="aee mb-3">
                  <h3>upcoming Election</h3>
            </div>
            
            <?php 
              $fetchingActiveElection=mysqli_query($db, "SELECT * FROM elections WHERE status='inActive'") or die(mysqli_error($db));
              $totalActiveElection=mysqli_num_rows($fetchingActiveElection);
              if($totalActiveElection > 0)
              {?>
               <div class="row aea mr-1 ml-1 my-3" >
                <?php
                  while($data=mysqli_fetch_assoc($fetchingActiveElection))
                  {
                        $election_id= $data['id'];
                        $election_topic=$data['election_topic'];
                        $sdate=$data['starting_date'];
                        $edate=$data['ending_date'];
                        ?>
                       <div class="col-5 aee  m-4"style="padding: 10px;">
                        <table class="table ">
                              <thead>
                                
                                   <tr>
                                         <th colspan="4" class="bg-green text-white ml-2 mr-2 ">
                                         <span class="name mt-3"> <h6>ELECTION TOPIC: <?php echo $election_topic ;?></h6></span>
                                         <span class="name mt-3"> <h6>starting date: <?php echo $sdate ;?></h6></span>
                                         <span class="name mt-3"> <h6> Ending date : <?php echo $edate ;?></h6></span>
                                        </th>
                                   </tr>
                                   <tr>
                                         <th>photo</th>
                                         <th>Candidate Details</th>
                                         
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
                                                      
                                                      
                                                     
                                                </tr>
                                                <?php
                                           }

                                    ?>
                               </tbody>
                        </table></div>

                        <?php 
                  }
                
                 
              }else
              {
                  echo "No any avtive election";
              }

            ?>
      </div>
      
      </div>
</div></div>





