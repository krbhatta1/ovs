



<?php
include('uheader.php');
?>

	<link rel="stylesheet" type="text/css" href="admin/css/bootstrap-4.0.0.css">

<div class="col-sm-8 mt-3 outt">
        <div class="mx-5 mt-4">	

<style type="text/css">
    	label{
    		/*font-weight: bold;*/
    		font-size: 16px;
    	}
    	.ff{
    		/*font-size: 25px;*/
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
    		/*background-color: red;*/
    	}
    	.outt{
    		background-color: #C1C1C1;
    		min-height: 60rem;

    	}
    	.abc{
    		background-color: ;
    	}
</style>



<?php
include('admin/dbconaction.php');
if(isset($_POST['register']))
{
	$fname=$_POST['firstname'];
	$mname=$_POST['middlename'];
	$lname=$_POST['lastname'];
	$phone=$_POST['mobile'];
	$gmail=$_POST['email'];
	$pp=$_POST['pp'];
	$cpp=$_POST['cpp'];
	$country=$_POST['country'];
	$district=$_POST['district'];
	$munici=$_POST['munici'];
	$ward=$_POST['ward'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];

	$image=time() . '-' . $_FILES['image']['name'];
	$target_dir="admin/images/";
	$target_file=$target_dir . basename($image);

if($pp!==$cpp)
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
   		$sql="INSERT INTO voters SET firstname='$fname', middlename='$mname', lastname='$lname', email='$gmail', password='$pp', phone='$phone', country='$country', district='$district', local_level='$munici', ward='$ward', gender='$gender', dob='$dob', photo='$image'";

	$res = mysqli_query($con,$sql);
	if($res)
	{
		?>
    		<div class="alert alert-success alert-dismissible fade show" role="alert" id="alertsms">
    			Voter Registered Succefully. Wait for approve. <!-- Please Check Your E-mail,<br> We will send Email after approve your --> registration.
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








<div class="  row justify-content-center">
<div class="card abc">
<header class="card-header bg-dark text-light mt-2">
	<a href="\kr/loginfile.php" class="float-right btn bg-primary text-light">Log in</a>
	<h4 class="card-title mt-2 ">Register For Voter !!</h4>
</header>
<article class="card-body">

<form method="POST" action="" enctype="multipart/form-data">
<div class="form-row">
	<div class="col form-group">

		    <!-- <label>Photo :</label> -->
		<br><br>
		    <input type="file" id="img" name="image" accept="image/*" style="display:none" onchange="loadFile(event)">
		   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <label for="img" class="ppword" required>Select Photo <font color="red">*</font></label>

		    <script>
		        var loadFile=function(event)
		        {
		        var img=document.getElementById('out');
		        img.src=URL.createObjectURL(event.target.files[0]);
		        }
		    </script>
	</div>
	<div class="col form-group">
		<img id="out" width="150px" height="150px">
	</div>
</div>

	<div class="form-row">
		<div class="col form-group">
			<label>First name :<font color="red" class="ff">*</font></label>   
		  	<input type="text" class="form-control" name="firstname" required>
		</div>
		<div class="col form-group">
			<label>Middle Name :</label>
		  	<input type="text" class="form-control" name="middlename">
		</div>
		<div class="col form-group">
			<label>Last Name :<font color="red" class="ff">*</font></label>   
		  	<input type="text" class="form-control" name="lastname">
		</div>
	</div>

	<div class="form-row">
		<div class="col form-group">
			<label>E-mail :<font color="red" class="ff">*</font></label>   
		  	<input type="email" class="form-control" name="email" required>
		</div>
		<div class="col form-group">
			<label>Mobile No. :<font color="red" class="ff">*</font></label>
		  	<input type="text" class="form-control" name="mobile" required>
		</div>
	</div>

	<div class="form-row">
		<div class="col form-group">
			<label>Create Password :<font color="red" class="ff">*</font></label>   
		  	<input type="text" class="form-control" name="pp">
		</div>
		<div class="col form-group">
			<label>Conform Password :<font color="red" class="ff">*</font></label>
		  	<input type="text" class="form-control" name="cpp">
		</div>
	</div>

	<div class="form-row">
	    <div class="form-group col-md-6">
	      <label for="inputState">Country :</label>
	      <select id="inputState" class="form-control" name="country">
	        <option selected value="Nepal">Nepal</option>
	      </select>
	    </div>
	    <div class="form-group col-md-6">
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
	   </div>
	<div class="form-row">
		<div class="col form-group">
			<label>Municipality :<font color="red" class="ff">*</font></label>   
		  	<input type="text" class="form-control" name="munici">
		</div>
		<div class="col form-group">
			<label>Ward No. :</label>
		  	<input type="text" class="form-control" name="ward">
		</div>
	</div>
<div class="form-group">
	<label>Gender :<font color="red" class="ff">*</font></label>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="custom-control custom-radio custom-control-inline">
	  	<input type="radio" id="id1" name="gender" class="custom-control-input" value="Male">
	  	<label class="custom-control-label" for="id1">Male</label>
	</div>
	<div class="custom-control custom-radio custom-control-inline">
	  	<input type="radio" id="id2" name="gender" class="custom-control-input" value="Female">
	  	<label class="custom-control-label" for="id2">Female</label>
	</div>
	<div class="custom-control custom-radio custom-control-inline">
	  	<input type="radio" id="id3" name="gender" class="custom-control-input" value="Others">
	  	<label class="custom-control-label" for="id3">Others</label>
	</div>
</div>
	<div class="form-row">
		<div class="col form-group">
			<label>Date Of Birth <i>(In Nepali)</i> :<font color="red" class="ff">*</font></label>   
		  	<input type="text" class="form-control" name="dob" placeholder=" Example : (2055/05/30)">
		</div>
	</div>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" name="register"> Register  </button>
    </div>
</form>
</article>
</div>
</div>
</div>

<script type="text/javascript">
	function timedMsg()
	{
	var t=setTimeout("document.getElementById('alertsms').style.display='none';",60000);
	} 
</script>
<script language="JavaScript" type="text/javascript">timedMsg()</script>



</div></div>
<?php
include('ufooter.php');
?>