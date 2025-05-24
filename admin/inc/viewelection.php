<div class="page-wrapper">
         
        
        
            <div class="container-fluid">
            <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Elecrion Section</h4>
                            </div>
                        </div>
                         

<div class="card card-outline-primary">
<div class="row my-3">
<div class="col-12">
            <h3>Election</h3>
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
                                           $election_id= $row['id']
                                            ?>
                                                  <tr>
                                                      <td><?php echo $sno++; ?></td>
                                                      <td><?php echo $row['election_topic'];?></td>
                                                      <td><?php echo $row['no_of_candidates'];?></td>
                                                      <td><?php echo $row['starting_date'];?></td>
                                                      <td><?php echo $row['ending_date'];?></td>
                                                      <td><?php echo $row['status'];?></td>
                                                      <td>
                                                        <a href="index.php?viewresult=<?php echo $election_id; ?>" class="btn btn-sm btn-success">View Result</a>
                                                       
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
</div>
</div>
