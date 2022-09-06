<?php 
	session_start();
	if(!isset($_SESSION['voterlog'] ))
	{
		header('Location: \kr/index.php');
	}
	include('admin/dbconaction.php');
?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="admin/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css">

</head>
<body>
	<style>
		.sidebar-sticky{
		}
		li:hover{
			background-color:blue;
			font-size: 15px;
		}
		.logg{
			background-color: #FFCBC4;
		}
  </style>
    
	<?php
		$quniq = "SELECT * FROM voters where email='".$_SESSION['voterlog']."'";
		$uniques = mysqli_query($con, $quniq);
		// if(mysqli_num_rows($uniques)>0) 
		$uniq = mysqli_fetch_assoc($uniques);
	?> 

  <nav class="navbar  bg-success ">
    <div class="container-fluid">
      <a class="navbar-brand text-light fw-bold" href="dashboard.php">&nbsp; Online Voting System &nbsp;</a>
      	<span class="text-light">
      		<?php echo $uniq['firstname']." &nbsp;"; ?> 
      		<img src="<?php echo "admin/images/".$uniq['photo'];?>" height="40px" class="rounded-circle"> 
      	</span>	

	<div class="dropdown">
		<span class="text-white">
			<?php echo date("Y-m-d");?> &nbsp;&nbsp;
		</span>
	  	<button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropd" data-bs-toggle="dropdown" aria-expanded="false">My Profile</button>
		  <ul class="dropdown-menu" aria-labelledby="dropd">
		    <li><a class="dropdown-item" href="myprofile.php">View Profile</a></li>
		    <li><a class="dropdown-item" href="changevpp.php">Change Password</a></li>
		    <li class="logg"><a class="dropdown-item logg" href="admin/operationfile/logoff.php">Logout</a></li>
		  </ul>
	</div>
      </div>
    </div>
  </nav>




<div class="container-fluid mb-5" style="margin-top: px;">
		<div class="row">
			<nav class="col-sm-3 col-md-2  sidebar py-3 d-print-none">
				<div class="sidebar-sticky">
					<ul class="nav flex-column bg-secondary">
						<span class="bg-danger py-2 text-center text-white">Voter Menu</span>
						<li class="nav-item">
							<a class="nav-link text-white" href="dashboard.php">Dashboard</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="existele.php">Election</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="vresult.php">Result</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="vresult.php">Result</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="vresult.php">Result</a>
						</li>
					</ul>
				</div>
			</nav>