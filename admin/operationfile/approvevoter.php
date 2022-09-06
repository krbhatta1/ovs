<?php 
include('../dbconaction.php');


// Voter Approved start
if(isset($_GET['vid']))
  {
    $vid= $_GET['vid'];
    $updatequery = "UPDATE  voters SET  approv_status='Approved'  WHERE voterid='".$vid."'";

    $result = mysqli_query($con,$updatequery);
    if($result)
    {
       echo "<script>window.location='../'</script>";
    }
    else
    {
      echo " Something went wrong.";
    }
  }
// Voter Approved end




// candidate Approved start
  if(isset($_GET['cid']))
    {
      $cid= $_GET['cid'];

      $updatequery = "UPDATE  candidates SET  status='Approved'  WHERE candidate_id='".$cid."'";

      $result = mysqli_query($con,$updatequery);
      if($result)
        {
           echo "<script>window.location='../'</script>";
        }
      else
        {
          echo " Something went wrong.";
        }
    }
//  Candidate Approved end




// Voter rejected start
if(isset($_GET['voterrejectid']))
    {
      $voterrejid= $_GET['voterrejectid'];

      $vrej = "UPDATE  voters SET  approv_status='Rejected'  WHERE voterid='".$voterrejid."'";

      $result = mysqli_query($con,$vrej);
      if($result)
        {
           echo "<script>window.location='../'</script>";
        }
      else
        {
          echo " Something went wrong.";
        }
    }
// Voter Rejected end


// candidate rejected start
if(isset($_GET['crejid']))
    {
      $crejid= $_GET['crejid'];

      $crejq = "UPDATE  candidates SET  status='Rejected'  WHERE candidate_id='".$crejid."'";

      $result = mysqli_query($con,$crejq);
      if($result)
        {
           echo "<script>window.location='../'</script>";
        }
      else
        {
          echo " Something went wrong.";
        }
    }
// Candidate rejected end



// rejected  voter deete start
if(isset($_GET['vdelid']))
    {
      $voterdelid= $_GET['vdelid'];

      $voterdelquery = "DELETE FROM voters WHERE approv_status='Rejected' AND voterid='".$voterdelid."'";

      $result = mysqli_query($con,$voterdelquery);
      if($result)
        {
           echo "<script>window.location='../reject_voter.php'</script>";
        }
      else
        {
          echo " Something went wrong.";
        }
    }
// rejected voter deleteend



// rejected  candidate deete start
if(isset($_GET['cdelid']))
    {
      $cdelid= $_GET['cdelid'];

      $cdelquery = "DELETE FROM candidates WHERE status='Rejected' AND candidate_id='".$cdelid."'";

      $result = mysqli_query($con,$cdelquery);
      if($result)
        {
           echo "<script>window.location='../reject_voter.php'</script>";
        }
      else
        {
          echo " Something went wrong.";
        }
    }
// rejected candidates deleteend





// Voter Approved start
if(isset($_GET['vidbyrej']))
  {
    $vid= $_GET['vidbyrej'];
    $updatequery = "UPDATE  voters SET  approv_status='Approved'  WHERE voterid='".$vid."'";

    $result = mysqli_query($con,$updatequery);
    if($result)
    {
       echo "<script>window.location='../reject_voter.php'</script>";
    }
    else
    {
      echo " Something went wrong.";
    }
  }
// Voter Approved end




// candidate Approved start
  if(isset($_GET['cidbyrej']))
    {
      $cid= $_GET['cidbyrej'];

      $updatequery = "UPDATE  candidates SET  status='Approved'  WHERE candidate_id='".$cid."'";

      $result = mysqli_query($con,$updatequery);
      if($result)
        {
           echo "<script>window.location='../reject_voter.php'</script>";
        }
      else
        {
          echo " Something went wrong.";
        }
    }
//  Candidate Approved end




// Voter rejected start
if(isset($_GET['apc']))
    {
      $candist= $_GET['apc'];

      $vrej = "UPDATE  candidates SET status='Rejected'  WHERE candidate_id='".$candist."'";

      $result = mysqli_query($con,$vrej);
      if($result)
        {
           echo "<script>window.location='../candidates.php'</script>";
        }
      else
        {
          echo " Something went wrong.";
        }
    }
// Voter Rejected end





// rejected  candidate deete start
if(isset($_GET['cidfordel']))
    {
      $cdelid= $_GET['cidfordel'];

      $cdelquery = "DELETE FROM candidates WHERE status='Approved' AND candidate_id='".$cdelid."'";

      $result = mysqli_query($con,$cdelquery);
      if($result)
        {
           echo "<script>window.location='../candidates.php'</script>";
        }
      else
        {
          echo " Something went wrong.";
        }
    }
// rejected candidates deleteend






// Voter rejected start
if(isset($_GET['xr']))
    {
      $candist= $_GET['xr'];

      $vrej = "UPDATE  voters SET approv_status='Rejected'  WHERE voterid='".$candist."'";

      $result = mysqli_query($con,$vrej);
      if($result)
        {
           echo "<script>window.location='../voters.php'</script>";
        }
      else
        {
          echo " Something went wrong.";
        }
    }
// Voter Rejected end





// rejected  candidate deete start
if(isset($_GET['xd']))
    {
      $cdelid= $_GET['xd'];

      $cdelquery = "DELETE FROM voters WHERE approv_status='Approved' AND voterid='".$cdelid."'";

      $result = mysqli_query($con,$cdelquery);
      if($result)
        {
           echo "<script>window.location='../voters.php'</script>";
        }
      else
        {
          echo " Something went wrong.";
        }
    }
// rejected candidates deleteend





?>
