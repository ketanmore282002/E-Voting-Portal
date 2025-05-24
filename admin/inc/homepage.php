<div class="page-wrapper mt-3">
   <?php
    $fetchingtotalelection=mysqli_query($db, "SELECT * FROM elections ") or die(mysqli_error($db));
    $fetchingtotalelection=mysqli_num_rows($fetchingtotalelection);

    $fetchingActiveElection=mysqli_query($db, "SELECT * FROM elections WHERE status='Active'") or die(mysqli_error($db));
     $totalActiveElection=mysqli_num_rows($fetchingActiveElection);

     $fetchinginActiveElection=mysqli_query($db, "SELECT * FROM elections WHERE status='inActive'") or die(mysqli_error($db));
     $totalinActiveElection=mysqli_num_rows($fetchinginActiveElection);

     $fetchingExpiredElection=mysqli_query($db, "SELECT * FROM elections WHERE status='Expired'") or die(mysqli_error($db));
     $totalinExpiredElection=mysqli_num_rows($fetchingExpiredElection);

     $fetchinguser=mysqli_query($db, "SELECT * FROM users ") or die(mysqli_error($db));
     $totalusers=mysqli_num_rows($fetchinguser);

     $fetchingvoter=mysqli_query($db, "SELECT * FROM users  WHERE user_role='voter '") or die(mysqli_error($db));
     $totalvoter=mysqli_num_rows($fetchingvoter);

     $fetchingadmin=mysqli_query($db, "SELECT * FROM users WHERE user_role='Admin'") or die(mysqli_error($db));
     $totalAdmin=mysqli_num_rows($fetchingadmin);
   
   ?>
        
        
            <div class="container-fluid">
            <div class="col-lg-12 ">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Admin Dashboard</h4>
                            </div>
                     <div class="row">
                   
					 <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                <span><i class="fa fa-users f-s-60" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                <h1 class="mb-2" style="font-size: 30px;"><?php echo $totalusers; ?></h1>
                                    <p class="m-b-0">Total Users</p>
                                </div>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    
                                    <span><i class="fa fa-user-circle-o f-s-60" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                <h1 class="mb-2" style="font-size: 30px;"><?php echo $totalAdmin; ?></h1>
                                    <p class="m-b-0">Admin</p>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i class="fa fa-shopping-cart f-s-60" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                <h1 class="mb-2" style="font-size: 30px;"><?php echo $totalvoter; ?></h1>
                                    <p class="m-b-0">no. Voters</p>
                                </div>
                            </div>
                        </div>
                    </div>	                   
                </div>     
                
                <div class="row">
                <div class="col-md-3 ">
                        <div class="card shh p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                   
                                    <span><i class="fa fa-puzzle-piece f-s-60 "></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                     <h1 class="mb-2" style="font-size: 30px;"><?php echo $fetchingtotalelection; ?></h1>
                                    <p class="m-b-0">Total Elecction</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    
                                    <span><i class="fa fa-envelope-open-o f-s-60" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                <h1 class="mb-2" style="font-size: 30px;"><?php echo $totalActiveElection; ?></h1>
                                    <p class="m-b-0">Active election</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                <span><i class="fa fa-window-close-o f-s-60"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                <h1 class="mb-2" style="font-size: 30px;"><?php echo $totalinActiveElection; ?></h1>
                                    <p class="m-b-0">upcoming election</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i class="fa fa-check f-s-60" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                <h1 class="mb-2" style="font-size: 30px;"><?php echo $totalinExpiredElection; ?></h1>

                                    <p class="m-b-0">expired election</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div> 
        </div>     
    </div>