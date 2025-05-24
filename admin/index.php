<?php
   require_once("inc/header.php");
   ?>
   <?php
   require_once("inc/navigation.php");
   ?>
 
      <?php
   if(isset($_GET['HomePage']))
   {
      require_once("inc/homepage.php");
   }
   elseif(isset($_GET['AddElectionPage']))
   {
      require_once("inc/add_elections.php");
   }elseif(isset($_GET['AddCandidatePage']))
   {
      require_once("inc/add_candidate.php");
   }elseif(isset($_GET['viewresult']))
   {
      require_once("inc/viewresult.php");
   }elseif(isset($_GET['edit_election'])){
      require_once("inc/edit_election.php");
   }elseif(isset($_GET['viewelection'])){
      require_once("inc/viewelection.php");
   }
?>

<?php
   require_once("inc/footer.php");
?>

