<div class="row my-3">
      <div class="col-12 ">
            <div class="aee mb-3">
                  <h3>Active Election</h3>
            </div>
            
            <?php 
              $fetchingActiveElection=mysqli_query($db, "SELECT * FROM elections WHERE status='Active'") or die(mysqli_error($db));
              $totalActiveElection=mysqli_num_rows($fetchingActiveElection);
              if($totalActiveElection > 0)
              {?>
            <div class=" aea py-2 mr-1 ml-1 my-3" >
              <?php
                  while($data=mysqli_fetch_assoc($fetchingActiveElection))
                  {
                        $election_id= $data['id'];
                        $election_topic=$data['election_topic'];
                        ?>
                        <div class="  aee  m-4" style="padding: 10px;">
                        <table class="table">
                              <thead>
                                   <tr>
                                         <th colspan="4" class="bg-green text-white ml-2 mr-2"><h5>ELECTION TOPIC: <?php echo $election_topic ;?></h5></th>
                                   </tr>
                                   <tr>
                                         <th>photo</th>
                                         <th>Candidate Details</th>
                                         
                                         <th>Action</th>
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
                                                      
                                                      <td>
                                                        <?php    
                                                        $checkifVoterCasted= mysqli_query($db,"SELECT * FROM votings WHERE voters_id='".  $_SESSION['user_id']."'AND election_id ='". $election_id."'") or die(mysqli_error($db));
                                                        $isvotercasted=mysqli_num_rows($checkifVoterCasted);
                                                         
                                                        if($isvotercasted > 0)
                                                        {
                                                            $votecastedData=mysqli_fetch_assoc($checkifVoterCasted);
                                                            $voterCastedToCandidate= $votecastedData['candidate_id'];
                                                            
                                                            if($voterCastedToCandidate == $candidate_id)
                                                            {
                                                                  ?>
                                                                  <img src="../assets/images/f.jpg" width="60px">
                                                                  <?Php
                                                            }
                                                            
                                                                  
                                                        }else{
                                                            ?>
                                                            <button class="btn btn-md btn-success" onclick="CastVote(<?php echo $election_id; ?>, <?php echo $candidate_id; ?>, <?php echo $_SESSION['user_id'];?>)">Vote
                                                            <?php
                                                        }
                                                            ?>
                                                            </td>
                                                     
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
      
      </div></div>
</div></div>

<script>
      const CastVote = (election_id, customer_id, voters_id) =>
      {
           
            $.ajax({
                  type:"POST",
                  url:"inc/ajaxCall.php",
                  data:"e_id="+ election_id + "&c_id=" + customer_id + "&v_id=" + voters_id,
                  success: function(response){
                   if (response == "success")
                   {
                             location.assign("index.php?HomePage=1?voteCasted=1");
                   }else{
                        location.assign("index.php?HomePage=1?voteNotCasted=1");
                   }
                 }
             });

      }
</script>

