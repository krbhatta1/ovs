<?php 
	// session_start();
	// if(isset($_SESSION['adminuser']))
	// {
	// 	header('Location: \kr/admin/');
	// }
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
			background-color: blue;
			font-size: 15px;
		}
		body{
			background-color: #ECECEC;
		}
		.navbar{
			/*height: 3rem;*/
		}
  </style>
    
  <nav class="navbar  bg-success ">
    <div class="container-fluid">
      <a class="navbar-brand text-light fw-bold" href="index.php">&nbsp; Online Voting System &nbsp;</a>
      	<!-- <span class="text-light"> Home</span> -->

	<div class="dropdown">
		<span class="text-white">
		<?php echo date("Y-m-d");?> &nbsp;&nbsp;
		</span>
		<!-- <button class="float-right btn btn-sm btn-danger">Profile</button> -->
	  	<button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropd" data-bs-toggle="dropdown" aria-expanded="false">Register</button>
		  <ul class="dropdown-menu" aria-labelledby="dropd">
		    <li><a class="dropdown-item" href="voter_register.php">Register Voter</a></li>
		    <li><a class="dropdown-item" href="candidate_register.php">Register Candidate</a></li>
		  </ul>
	</div>


      </div>
    </div>
  </nav>


<!-- <img src="images/nepal_flag.gif" height="40px"> -->

	<div class="container-fluid mb-5">
		<div class="row">
			<nav class="col-md-2  sidebar py-3 d-print-none">
				<div class="sidebar-sticky">
					<ul class="nav flex-column bg-secondary" style="min-width: 7rem;" >
						<span class="bg-danger py-2 text-center text-white">Menu</span>
						<li class="nav-item">
							<a class="nav-link text-white" href="index.php">Home Page</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="loginfile.php">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="voter_register.php">Voter Register</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="candidate_register.php">Candidate Register</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="uresult.php">Result</a>
						</li>
						<li class="nav-item">
							<as class="nav-link text-white" href="apcanlist.php" >Approved List</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="aboutovs.php">About OVS</a>
						</li>
					</ul>
				</div>
			</nav>