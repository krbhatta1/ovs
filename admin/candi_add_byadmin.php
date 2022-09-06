
			
<?php include('header.php'); 
 include('dbconaction.php');



if(isset($_GET['cidedit']))
	{
		$ch=$_GET['cidedit'];
		$app="Approved";
		$query = "SELECT * FROM candidates where candidate_id='".$ch."' AND status='".$app."'";
		$result = mysqli_query($con, $query);
		if(mysqli_num_rows($result)>0) 
		{
			$c_value = mysqli_fetch_assoc($result);







?>
<link rel="stylesheet" type="text/css" href="css/bootstrap-4.0.0.css">

<div class="col-sm-8 mt-3 outt">
        <div class="mx-5 mt-4">	



      <style>
        /*body{
         	background-color: #E8E8E8 ;
          }*/
          .body-form {
		    display: flex;
		    align-items: center;
		    padding-top: 40px;
		    padding-bottom: 40px;
		    background-color: gray;
			}

		.form-signin {
		    width: 100%;
		    max-width: 350px;
		    padding: 15px;
		    margin: auto;
		}
		   label{
    		font-size: 16px;
    	}
    	.ff{
    		font-weight: bold;
    	}
    	.ppword{
    		padding: 10px;
    		background-color: skyblue;
    	}
    	#out{
    		border-color:green;
    		border-style: solid;
    		border-width: 5px;
    		border-radius: 7px;
    	}
    	.outt{
    		background-color: #C1C1C1;
    		min-height: 66rem;
    	}
      </style>




<script type="text/javascript">
 function timedMsg()
{
var t=setTimeout("document.getElementById('alertsms').style.display='none';",3000);
} 
</script>
<script language="JavaScript" type="text/javascript">timedMsg()</script>


<?php
if(isset($_POST['update']))
{
	$fname=$_POST['firstname'];
	$mname=$_POST['middlename'];
	$lname=$_POST['lastname'];
	// $email=$_POST['email'];
	$phone=$_POST['mobile'];
	// $passwordcandidate=$_POST['pp'];
	// $cpp=$_POST['cpp'];
	$district=$_POST['district'];
	$munici=$_POST['Munici'];
	$ward=$_POST['ward'];
	$dob=$_POST['date_of_birth'];
	$gender=$_POST['gender'];
	$enam=$_POST['ename'];

	$electionid=$_POST['electionid'];


	// $image=time() . '-' . $_FILES['image']['name'];
	// $target_dir="images/";
	// $target_file=$target_dir . basename($image);




	// if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file))
	// {
   			$sql="UPDATE candidates SET election_id='$electionid', phone='$phone', firstname='$fname', middlename='$mname', lastname='$lname', district='$district', local_level='$munici', ward='$ward', dob='$dob', gender='$gender', election_nam='$enam' Where candidate_id=$ch ";

		$res = mysqli_query($con,$sql);
		if($res)
		{
			?>
				<div class="alert alert-success alert-dismissible fade show" role="alert" id="alertsms">
					Candidates Registered Succefully.
				  	<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </button>
				</div>
			<?php
		} 
		else
		{
			?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertsms">
					Operation Failed. Please Try Again. !!
				  	<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </button>
				</div>
			<?php
		}
	// }
	// else
	// {
	// 	echo "Image Could not Process.";
	// }
}

?>







<div class="row justify-content-center">
		<div class="card mt-0">
			<header class="card-header bg-dark text-light mt-2">
			<a href="\kr/loginfile.php" class="float-right btn bg-primary text-light">Log in</a>
			<h4 class="card-title mt-2 ">Update For Candidate's !!</h4>
		</header>
			<article class="card-body">
				<main class="form-signin"  style="max-width: 100%;">
 					<form action="" method="POST" enctype="multipart/form-data">
					<div class="row g-3">
                <!-- ****************** For Profile Photo************************ -->
						<div class="col-sm-12" style="margin-top: -1%;">
								<!-- <span>Voter Photo</span> -->

							<img src="<?php echo 'images/'.$c_value['photo'];?>"  id="out" height="130px" width="130px" class="mx-auto d-flex rounded"><br>
							<!-- <img id="out" height="130px" width="130px" class="mx-auto d-flex rounded"><br> -->
							<input type="file" id="img" name="image"  class="form-control" accept="image/*" placeholder="no" onchange="loadFile(event)" disabled>
						    <script>
						        var loadFile=function(event)
						        {
						        var img=document.getElementById('out');
						        img.src=URL.createObjectURL(event.target.files[0]);
						        }
						    </script>
						</div>
						   <!-- ****************************************** -->

					    <div class="col-sm-6">
							<label>First name :<font color="red" class="ff">*</font></label>   
						  	<input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo $c_value['firstname']; ?>" required>
						</div>
						<div class="col-sm-6">
							<label>Middle Name :</label>
						  	<input type="text" class="form-control" name="middlename" placeholder="Middle Name" value="<?php echo $c_value['middlename']; ?>">
						</div>
						<div class="col-sm-6">
							<label>Last Name :<font color="red" class="ff">*</font></label>   
						  	<input type="text" class="form-control" name="lastname" placeholder=" Last Name" value="<?php echo $c_value['lastname']; ?>">
						</div>
						<div class="col-sm-6">
							<label>E-mail :<font color="red" class="ff">*</font></label>   
						  	<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $c_value['email'].' &nbsp (cannot change)'; ?>" disabled>
						</div>
						<div class="col-sm-6">
							<label>Mobile No. :<font color="red" class="ff">*</font></label>
						  	<input type="text" class="form-control" name="mobile" placeholder="Mobile No." value="<?php echo $c_value['phone']; ?>" required>
						</div>
<!-- 
						<div class="col-sm-6">
							<label>Create Password :<font color="red" class="ff">*</font></label>   
					  		<input type="text" class="form-control" placeholder="New Password" name="pp">
						</div>
						<div class="col-sm-6">
							<label>Conform Password :<font color="red" class="ff">*</font></label>
					  		<input type="text" class="form-control" placeholder="Retype Password" name="cpp">
						</div> -->

					    <div class="col-sm-6">
					      <label for="inputState">District :<font color="red" class="ff">*</font></label>
					      <select id="inputState" class="form-control" name="district">
					        <option selected value="<?php echo $c_value['district']; ?>"><?php echo $c_value['district']; ?></option>
				            <option value="Taplejung">Taplejung</option>
				            <option value="Panchthar">Panchthar</option>
				            <option value="Ilam">Ilam</option>
				            <option value="Jhapa">Jhapa</option>
				            <option value="Morang">Morang</option>
				            <option value="Sunsari">Sunsari</option>
				            <option value="Dhankutta">Dhankutta</option>
				            <option value="Sankhuwasabha">Sankhuwasabha</option>
				            <option value="Bhojpur">Bhojpur</option>
				            <option value="Terhathum">Terhathum</option>
				            <option value="Okhaldunga">Okhaldunga</option>
				            <option value="Khotang">Khotang</option>
				            <option value="Solukhumbu">Solukhumbu</option>
				            <option value="Udaypur">Udaypur</option>
				            <option value="Saptari">Saptari</option>
				            <option value="Siraha">Siraha</option>
				            <option value="Dhanusa">Dhanusa</option>
				            <option value="Mahottari">Mahottari</option>
				            <option value="Sarlahi">Sarlahi</option>
				            <option value="Sindhuli">Sindhuli</option>
				            <option value="Ramechhap">Ramechhap</option>
				            <option value="Dolkha">Dolkha</option>
				            <option value="Sindhupalchauk">Sindhupalchauk</option>
				            <option value="Kavreplanchauk">Kavreplanchauk</option>
				            <option value="Lalitpur">Lalitpur</option>
				            <option value="Bhaktapur">Bhaktapur</option>
				            <option value="Kathmandu">Kathmandu</option>
				            <option value="Nuwakot">Nuwakot</option>
				            <option value="Rasuwa">Rasuwa</option>
				            <option value="Dhading">Dhading</option>
				            <option value="Makwanpur">Makwanpur</option>
				            <option value="Rauthat">Rauthat</option>
				            <option value="Bara">Bara</option>
				            <option value="Parsa">Parsa</option>
				            <option value="Chitwan">Chitwan</option>
				            <option value="Gorkha">Gorkha</option>
				            <option value="Lamjung">Lamjung</option>
				            <option value="Tanahun">Tanahun</option>
				            <option value="Tanahun">Tanahun</option>
				            <option value="Syangja">Syangja</option>
				            <option value="Kaski">Kaski</option>
				            <option value="Manag">Manag</option>
				            <option value="Mustang">Mustang</option>
				            <option value="Parwat">Parwat</option>
				            <option value="Myagdi">Myagdi</option>
				            <option value="Myagdi">Myagdi</option>
				            <option value="Baglung">Baglung</option>
				            <option value="Gulmi">Gulmi</option>
				            <option value="Palpa">Palpa</option>
				            <option value="Nawalparasi">Nawalparasi</option>
				            <option value="Rupandehi">Rupandehi</option>
				            <option value="Arghakhanchi">Arghakhanchi</option>
				            <option value="Kapilvastu">Kapilvastu</option>
				            <option value="Pyuthan">Pyuthan</option>
				            <option value="Rolpa">Rolpa</option>
				            <option value="Rukum">Rukum</option>
				            <option value="Salyan">Salyan</option>
				            <option value="Dang">Dang</option>
				            <option value="Bardiya">Bardiya</option>
				            <option value="Surkhet">Surkhet</option>
				            <option value="Dailekh">Dailekh</option>
				            <option value="Banke">Banke</option>
				            <option value="Jajarkot">Jajarkot</option>
				            <option value="Dolpa">Dolpa</option>
				            <option value="Humla">Humla</option>
				            <option value="Kalikot">Kalikot</option>
				            <option value="Mugu">Mugu</option>
				            <option value="Jumla">Jumla</option>
				            <option value="Bajura">Bajura</option>
				            <option value="Bajhang">Bajhang</option>
				            <option value="Achham">Achham</option>
				            <option value="Doti">Doti</option>
				            <option value="Kailali">Kailali</option>
				            <option value="Kanchanpur">Kanchanpur</option>
				            <option value="Dadeldhura">Dadeldhura</option>
				            <option value="Baitadi">Baitadi</option>
				            <option value="Darchula">Darchula</option>
					      </select>
					    </div>

						<div class="col-sm-6">
							<label>Municipality :<font color="red" class="ff">*</font></label>   
						  	<input type="text" class="form-control" name="Munici" value="<?php echo $c_value['local_level']; ?>">
						</div>
						<div class="col-sm-6">
							<label>Ward No. :</label>
						  	<input type="text" class="form-control" name="ward" value="<?php echo $c_value['ward']; ?>">
						</div>
				         <div class="col-sm-6">
				            <label for="id_date_of_birth">Date Of Birth :</label>
				            <input type="date" name="date_of_birth" class="form-control" required id="id_date_of_birth" value="<?php echo $c_value['dob']; ?>">
				         </div>

				         <div class="col-sm-6">
					     	<label for="gender">Gender :<font color="red" class="ff">*</font></label>
					      	<select id="gender" class="form-control" name="gender">
						        <option selected value="<?php echo $c_value['gender']; ?>"><?php echo $c_value['gender']; ?></option>
					            <option value="Male">Male</option>
					            <option value="Female">Female</option>
					            <option value="Other">Other</option>
					     	</select>
					    </div>
				     <div class="col-sm-6">
				            <label for="inputename">Election  Name :</label>
						      <select id="inputename" class="form-control" name="ename">
						      	<option selected value="<?php echo $c_value['election_nam']; ?>"><?php echo $c_value['election_nam']; ?></option>
								<?php
									 
										$query="SELECT * FROM election";

											$result = mysqli_query($con, $query);
											if (mysqli_num_rows($result) > 0)
											{
												while($election = mysqli_fetch_assoc($result))
												{?>
													<option value="<?php echo $election['election_name'] ?>">
													<?php echo $election['election_name'] ?></option>
												<?php
												}
											}
									?>

						      </select>
				         </div>
						

				         <div class="col-sm-6">
						     <label for="inputpost">Election ID :</label>
						     <select id="inputpost" class="form-control" name="electionid" >
						        <option selected value="<?php echo $c_value['election_id']; ?>"><?php echo $c_value['election_id']; ?></option>
						        <?php
										$query="SELECT * FROM election";

											$result = mysqli_query($con, $query);
											if (mysqli_num_rows($result) > 0)
											{
												while($election = mysqli_fetch_assoc($result))
												{?>
													<option value="<?php echo $election['election_id'] ?>">
													<?php echo $election['election_id']."-".$election['election_name'] ?></option>
												<?php
												}
											}
									?>
						      </select>
						  </div>

				         <div class="col-sm-12">
				        	 <button class="w-100 mt-3 btn btn-success btn-lg" type="submit" name="update">Update</button>
				         </div>
				      </div>
				  </form>
				</main>
			</article>
		</div>
	</div>
</div>







































<?php
		}
		else
		{
			?><div class="bg-dager col-sm-5 mt-5" style="margin-left: 10%;">
	    		<div class="alert alert-danger alert-dismissible fade show" role="alert " id="alertsms">
	    			Invlaid Entry.
				  	<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </button>
				</div></div>
			<?php
		}
	}
		

else
	{
?>



<link rel="stylesheet" type="text/css" href="css/bootstrap-4.0.0.css">

<div class="col-sm-8 mt-3 outt">
        <div class="mx-5 mt-4">	



      <style>
        /*body{
         	background-color: #E8E8E8 ;
          }*/
          .body-form {
		    display: flex;
		    align-items: center;
		    padding-top: 40px;
		    padding-bottom: 40px;
		    background-color: gray;
			}

		.form-signin {
		    width: 100%;
		    max-width: 350px;
		    padding: 15px;
		    margin: auto;
		}
		   label{
    		font-size: 16px;
    	}
    	.ff{
    		font-weight: bold;
    	}
    	.ppword{
    		padding: 10px;
    		background-color: skyblue;
    	}
    	#out{
    		border-color:green;
    		border-style: solid;
    		border-width: 5px;
    		border-radius: 7px;
    	}
    	.outt{
    		background-color: #C1C1C1;
    		min-height: 66rem;
    	}
      </style>




<script type="text/javascript">
 function timedMsg()
{
var t=setTimeout("document.getElementById('alertsms').style.display='none';",3000);
} 
</script>
<script language="JavaScript" type="text/javascript">timedMsg()</script>


<?php
if(isset($_POST['register']))
{
	$fname=$_POST['firstname'];
	$mname=$_POST['middlename'];
	$lname=$_POST['lastname'];
	$email=$_POST['email'];
	$phone=$_POST['mobile'];
	$passwordcandidate=$_POST['pp'];
	$cpp=$_POST['cpp'];
	$district=$_POST['district'];
	$munici=$_POST['Munici'];
	$ward=$_POST['ward'];
	$dob=$_POST['date_of_birth'];
	$gender=$_POST['gender'];
	$enam=$_POST['ename'];

	$electionid=$_POST['electionid'];

	// $username=stripslashes($_POST['username']);
	$image=time() . '-' . $_FILES['image']['name'];
	$target_dir="images/";
	$target_file=$target_dir . basename($image);

if($passwordcandidate!==$cpp)
	{
		?>
    		<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertsms">
    			 Passsword Not Matched. Please Try Again. 
			  	<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			  </button>
			</div>
		<?php
	}
	else
	{
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file))
	{
   		$sql="INSERT INTO candidates SET election_id='$electionid', email='$email', password='$passwordcandidate', phone='$phone', firstname='$fname', middlename='$mname', lastname='$lname', district='$district', local_level='$munici', ward='$ward', photo='$image', dob='$dob', gender='$gender', election_nam='$enam'";

	$res = mysqli_query($con,$sql);
	if($res)
	{
		?>
    		<div class="alert alert-success alert-dismissible fade show" role="alert" id="alertsms">
    			Candidates Registered Succefully.
			  	<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			  </button>
			</div>
		<?php
	} 
	else
	{
		?>
    		<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertsms">
    			Operation Failed. Please Try Again. !!
			  	<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			  </button>
			</div>
		<?php
	}
}
}
}
?>









<div class="row justify-content-center" >
		<div class="card mt-0">
			<header class="card-header bg-dark text-light mt-2">
			<a href="\kr/loginfile.php" class="float-right btn bg-primary text-light">Log in</a>
			<h4 class="card-title mt-2 ">Register For Candidate's !!</h4>
		</header>
			<article class="card-body">
				<main class="form-signin"  style="max-width: 100%;">
 					<form action="" method="POST" enctype="multipart/form-data">
					<div class="row g-3">
                <!-- ****************** For Profile Photo************************ -->
						<div class="col-sm-12" style="margin-top: -1%;">
								<!-- <span>Voter Photo</span> -->
							<img id="out" height="130px" width="130px" class="mx-auto d-flex rounded"><br>
							<input type="file" id="img" name="image"  class="form-control" accept="image/*" placeholder="no" onchange="loadFile(event)">
						    <script>
						        var loadFile=function(event)
						        {
						        var img=document.getElementById('out');
						        img.src=URL.createObjectURL(event.target.files[0]);
						        }
						    </script>
						</div>
						   <!-- ****************************************** -->

					    <div class="col-sm-6">
							<label>First name :<font color="red" class="ff">*</font></label>   
						  	<input type="text" class="form-control" name="firstname" placeholder="First Name" required>
						</div>
						<div class="col-sm-6">
							<label>Middle Name :</label>
						  	<input type="text" class="form-control" name="middlename" placeholder="Middle Name">
						</div>
						<div class="col-sm-6">
							<label>Last Name :<font color="red" class="ff">*</font></label>   
						  	<input type="text" class="form-control" name="lastname" placeholder=" Last Name">
						</div>
						<div class="col-sm-6">
							<label>E-mail :<font color="red" class="ff">*</font></label>   
						  	<input type="email" class="form-control" name="email" placeholder="Email" required>
						</div>
						<div class="col-sm-6">
							<label>Mobile No. :<font color="red" class="ff">*</font></label>
						  	<input type="text" class="form-control" name="mobile" placeholder="Mobile No." required>
						</div>

						<div class="col-sm-6">
							<label>Create Password :<font color="red" class="ff">*</font></label>   
					  		<input type="text" class="form-control" placeholder="New Password" name="pp">
						</div>
						<div class="col-sm-6">
							<label>Conform Password :<font color="red" class="ff">*</font></label>
					  		<input type="text" class="form-control" placeholder="Retype Password" name="cpp">
						</div>

					    <div class="col-sm-6">
					      <label for="inputState">District :<font color="red" class="ff">*</font></label>
					      <select id="inputState" class="form-control" name="district">
					        <option selected disabled="">--Select District--</option>
				            <option value="Taplejung">Taplejung</option>
				            <option value="Panchthar">Panchthar</option>
				            <option value="Ilam">Ilam</option>
				            <option value="Jhapa">Jhapa</option>
				            <option value="Morang">Morang</option>
				            <option value="Sunsari">Sunsari</option>
				            <option value="Dhankutta">Dhankutta</option>
				            <option value="Sankhuwasabha">Sankhuwasabha</option>
				            <option value="Bhojpur">Bhojpur</option>
				            <option value="Terhathum">Terhathum</option>
				            <option value="Okhaldunga">Okhaldunga</option>
				            <option value="Khotang">Khotang</option>
				            <option value="Solukhumbu">Solukhumbu</option>
				            <option value="Udaypur">Udaypur</option>
				            <option value="Saptari">Saptari</option>
				            <option value="Siraha">Siraha</option>
				            <option value="Dhanusa">Dhanusa</option>
				            <option value="Mahottari">Mahottari</option>
				            <option value="Sarlahi">Sarlahi</option>
				            <option value="Sindhuli">Sindhuli</option>
				            <option value="Ramechhap">Ramechhap</option>
				            <option value="Dolkha">Dolkha</option>
				            <option value="Sindhupalchauk">Sindhupalchauk</option>
				            <option value="Kavreplanchauk">Kavreplanchauk</option>
				            <option value="Lalitpur">Lalitpur</option>
				            <option value="Bhaktapur">Bhaktapur</option>
				            <option value="Kathmandu">Kathmandu</option>
				            <option value="Nuwakot">Nuwakot</option>
				            <option value="Rasuwa">Rasuwa</option>
				            <option value="Dhading">Dhading</option>
				            <option value="Makwanpur">Makwanpur</option>
				            <option value="Rauthat">Rauthat</option>
				            <option value="Bara">Bara</option>
				            <option value="Parsa">Parsa</option>
				            <option value="Chitwan">Chitwan</option>
				            <option value="Gorkha">Gorkha</option>
				            <option value="Lamjung">Lamjung</option>
				            <option value="Tanahun">Tanahun</option>
				            <option value="Tanahun">Tanahun</option>
				            <option value="Syangja">Syangja</option>
				            <option value="Kaski">Kaski</option>
				            <option value="Manag">Manag</option>
				            <option value="Mustang">Mustang</option>
				            <option value="Parwat">Parwat</option>
				            <option value="Myagdi">Myagdi</option>
				            <option value="Myagdi">Myagdi</option>
				            <option value="Baglung">Baglung</option>
				            <option value="Gulmi">Gulmi</option>
				            <option value="Palpa">Palpa</option>
				            <option value="Nawalparasi">Nawalparasi</option>
				            <option value="Rupandehi">Rupandehi</option>
				            <option value="Arghakhanchi">Arghakhanchi</option>
				            <option value="Kapilvastu">Kapilvastu</option>
				            <option value="Pyuthan">Pyuthan</option>
				            <option value="Rolpa">Rolpa</option>
				            <option value="Rukum">Rukum</option>
				            <option value="Salyan">Salyan</option>
				            <option value="Dang">Dang</option>
				            <option value="Bardiya">Bardiya</option>
				            <option value="Surkhet">Surkhet</option>
				            <option value="Dailekh">Dailekh</option>
				            <option value="Banke">Banke</option>
				            <option value="Jajarkot">Jajarkot</option>
				            <option value="Dolpa">Dolpa</option>
				            <option value="Humla">Humla</option>
				            <option value="Kalikot">Kalikot</option>
				            <option value="Mugu">Mugu</option>
				            <option value="Jumla">Jumla</option>
				            <option value="Bajura">Bajura</option>
				            <option value="Bajhang">Bajhang</option>
				            <option value="Achham">Achham</option>
				            <option value="Doti">Doti</option>
				            <option value="Kailali">Kailali</option>
				            <option value="Kanchanpur">Kanchanpur</option>
				            <option value="Dadeldhura">Dadeldhura</option>
				            <option value="Baitadi">Baitadi</option>
				            <option value="Darchula">Darchula</option>
					      </select>
					    </div>

						<div class="col-sm-6">
							<label>Municipality :<font color="red" class="ff">*</font></label>   
						  	<input type="text" class="form-control" name="Munici">
						</div>
						<div class="col-sm-6">
							<label>Ward No. :</label>
						  	<input type="text" class="form-control" name="ward">
						</div>
				         <div class="col-sm-6">
				            <label for="id_date_of_birth">Date Of Birth :<font color="red" class="ff">*</font></label>
				            <input type="date" name="date_of_birth" class="form-control" required id="id_date_of_birth">
				         </div>

				         <div class="col-sm-6">
					     	<label for="gender">Gender :<font color="red" class="ff">*</font></label>
					      	<select id="gender" class="form-control" name="gender">
						        <option selected disabled="">--Select Gender--</option>
					            <option value="Male">Male</option>
					            <option value="Female">Female</option>
					            <option value="Other">Other</option>
					     	</select>
					    </div>
				     <div class="col-sm-6">
				            <label for="inputename">Election  Name :</label>
						      <select id="inputename" class="form-control" name="ename">
						      	<option selected disabled>--Select--</option>
								<?php
									 
										$query="SELECT * FROM election";

											$result = mysqli_query($con, $query);
											if (mysqli_num_rows($result) > 0)
											{
												while($election = mysqli_fetch_assoc($result))
												{?>
													<option value="<?php echo $election['election_name'] ?>">
													<?php echo $election['election_name'] ?></option>
												<?php
												}
											}
									?>

						      </select>
				         </div>
						

				         <div class="col-sm-6">
						     <label for="inputpost">Election ID :</label>
						     <select id="inputpost" class="form-control" name="electionid">
						        <option selected disabled>--Select--</option>
						        <?php
										$query="SELECT * FROM election";

											$result = mysqli_query($con, $query);
											if (mysqli_num_rows($result) > 0)
											{
												while($election = mysqli_fetch_assoc($result))
												{?>
													<option value="<?php echo $election['election_id'] ?>">
													<?php echo $election['election_id']."-".$election['election_name'] ?></option>
												<?php
												}
											}
									?>
						      </select>
						  </div>

				         <div class="col-sm-12">
				        	 <button class="w-100 mt-3 btn btn-success btn-lg" type="submit" name="register">Register</button>
				         </div>
				         <p><font color="red" class="ff">*</font> &nbsp; All filed Required.</p>
				         <!-- <font color="red" class="ff">*</font> All filed Required.<br> -->
				      </div>
				  </form>
				</main>
			</article>
		</div>
	</div>
</div>
<?php
	}
?>























<?php include('footer.php');?>


</body>
</html>