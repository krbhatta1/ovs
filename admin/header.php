<?php 
	session_start();
	if(!isset($_SESSION['adminuser'] ))
	{
		header('Location: \kr/index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

</head>
<body>
	<style>
		.sidebar-sticky{
		}
		li:hover{
			background-color: blue;
			font-size: 15px;
		}
  </style>
    
  <nav class="navbar  bg-success ">
    <div class="container-fluid">
      <a class="navbar-brand text-light fw-bold" href="index.php">&nbsp; Online Voting System &nbsp;</a>
      	<span class="text-light"> Admin</span>	

	<div class="dropdown">
		<span class="text-white">
		<?php echo date("Y-m-d");?> &nbsp;&nbsp;
		</span>
		<!-- <button class="float-right btn btn-sm btn-danger">Profile</button> -->
	  	<button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropd" data-bs-toggle="dropdown" aria-expanded="false">Profile</button>
		  <ul class="dropdown-menu" aria-labelledby="dropd">
		    <li>
		    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">View Profile
		    	</button>
			</li>
		    <li><a class="dropdown-item" href="changepp.php">Change Password</a></li>
		    <li><a class="dropdown-item" href="#"></a></li>
		    <li> <a class="dropdown-item" href="operationfile/logoff.php">Logout</a></li>
		  </ul>
	</div>

<?php 
	include('dbconaction.php');
	$resultas=mysqli_query($con, "SELECT * FROM admin where username='".$_SESSION['adminuser']."'");
	$elec = mysqli_fetch_assoc($resultas);
?>
			<!-- View Profile Admin in modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header bg-primary">
			        <h5 class="modal-title text-white" id="exampleModalLabel">Admin Profile</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <?php 
						if(isset($_POST['adminpsuubmit']))
						{	
							
							$iiid=stripslashes($_POST['iiid']);
							$image=time() . '-' . $_FILES['image']['name'];

							 $target_dir="images/";
							 $target_file=$target_dir . basename($image);

							if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file))
							{
					       		$query="UPDATE admin SET admin_id='".$iiid."', photo='".$image."' WHERE username= '".$_SESSION['adminuser']."'";
				            if(mysqli_query($con,$query))
				              {						                   
				                   ?>
				                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alertsms">
				                           Successfully Updated.
				                        <button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				                    </div>
				                  <?php
			             		}
			             		else
			             		{
			             			?>
				                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertsms">
				                           Update Failed !!
				                        <button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				                    </div>
				                  <?php
			     	    		}								
							}
						}


						$results=mysqli_query($con, "SELECT * FROM admin");
						$user=mysqli_fetch_all($results, MYSQLI_ASSOC);
			      ?>
			      	<form action="" method="POST" enctype="multipart/form-data">
				      <div class="modal-body">
				      	<table border="0">
				        	<tr><th colspan="2">
					             <label for="recipient-name" class="col-form-label">Username :  </label>
					        	</th>
					        	<td>
					            <input disabled type="text" name="ussser" value="<?php echo $elec['username']; ?>"> 
					        	</td>
					        	<td colspan="1"></td>
					        	<td colspan="1"> </td>
				        	</tr>
				        	<tr>
				        		<th colspan="2">
					             <label for="recipient-name" class="col-form-label">Admin ID :  </label>
					        	</th>
					        	<td>
					           <input type="text" name="iiid" value="<?php echo $elec['admin_id']; ?>"> 
					        	</td>
					        	<td colspan="1"> </td>
					        	<td colspan="1"> </td>
				        	</tr>
				        	<tr>
				        		<th colspan="2">
					            	<label for="ename" >Last Login Date/ Time :</label>
					        	</th>
					        	<td colspan="2">
					        		<?php echo $_SESSION['adminlogtime'] ?> 
					        	</td>
				        	</tr>
				        	<tr>
				        		<th colspan="2">
					            <label for="recipient-name" class="col-form-label"> Chose New Photo:</label>
				        			
				        		</th>
				        		<td colspan="3">
				        			 <input type="file" name="image"/>
				        		</td>
				        	</tr>
				        	<tr><th colspan="2">
					            <label for="recipient-name" class="col-form-label"> Existing Photo:</label>
					        	</th>
					        	<td class="">
					             <img src="<?php echo 'images/'. $elec['photo']; ?>" width='80' height='80'/>
					        	</td>
					        	<td colspan="1"></td>
					        	<td colspan="1"></td>
				        	</tr>
				        	<tr >
				        		<td colspan="2"></td>
					        	<td colspan="3" class="text-center">
							        <button type="submit" name="adminpsuubmit" class="btn btn-sm btn-success">Update</button>
							        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
					        	</td>
				     		 </div>
				        	</tr>


					        
				     	</table>
				      </div>  
			  		</form>
			    </div>
			  </div>
			</div>
			<!-- End View Profile Admin in modal -->


      </div>
    </div>
  </nav>


<!-- <img src="images/nepal_flag.gif" height="40px"> -->

	<div class="container-fluid mb-5" style="margin-top: px;">
		<div class="row">
			<nav class="col-sm-3 col-md-2  sidebar py-3 d-print-none">
				<div class="sidebar-sticky">
					<ul class="nav flex-column bg-secondary">
						<span class="bg-danger py-2 text-center text-white">Admin Menu</span>
						<li class="nav-item">
							<a class="nav-link text-white" href="index.php">Dashboard</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="election.php">Election</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="candidates.php">Candidate</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="voters.php">Voter</a>
						</li>
<!-- 						<li class="nav-item">
							<a class="nav-link text-white" href="pandingvoter.php">Panding Voter</a>
						</li> -->
						<li class="nav-item">
							<a class="nav-link text-white" href="result.php">Result</a>
						</li>
<!-- 						<li class="nav-item">
							<a class="nav-link text-white" href="changepp.php">Change Password</a>
						</li> -->
						<li class="nav-item">
							<a class="nav-link text-white" href="reject_voter.php">Rejected User</a>
						</li>
					</ul>
				</div>
			</nav>