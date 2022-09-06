


<?php 
include('homeheader.php'); 
include('admin/dbconaction.php'); 
?>



	<?php

		if(isset($_SESSION['voterlog'] ))
		{
			$user = $_SESSION["voterlog"];
			include('admin/dbconaction.php');
			$q = "SELECT * FROM voters WHERE email='$user'";
			$res = mysqli_query($con, $q);

			if (mysqli_num_rows($res) > 0)
			{
				$row = mysqli_fetch_assoc($res);
			}
		}
		else
		{
			unset($_SESSION["voterlog"]);
		}
	?>


	<div class="col-sm-7 mt-3" style="background-color: #C1C1C1; min-height: 35rem; margin-left: 1%;">
				<div class="mt-2 mx-5" style="overflow-x:auto;">
					
					<h4 class="bg-secondary text-white  text-center p-2">Profile - <i style="color: yellow" class="text-warning"><b>
						<?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];?></i></b>
					</h4>


					<div class='text-center'>
					<?php echo "<img  src='admin/images/".$row['photo']."' alt='".$row['firstname']." ".$row['middlename'].$row['lastname']." Photo"."'.' height='110' class=' rounded-circle border border-danger' />";
					?></div>
			<div class=" col-sm-10" style="background-color: red; margin-left: 5%;margin-right: 5%;">
				<table>
					<tr>
						<th>Full Name :</th>
						<td><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];?></td>
					</tr>
					<tr>
						<th>E-mail : </th>
						<td><?php echo $row['email'];?></td>
					</tr>
					<tr>
						<th>Contact Number : </th>
						<td><?php echo $row['phone'];?></td>
					</tr>
					<tr>
						<th>Address : </th>
						<td><?php echo $row['local_level']."-".$row['ward'].", ".$row['district'].", ".$row['country'];?></td>
					</tr>
					<tr>
						<th>Gender : </th>
						<td><?php echo $row['gender'];?></td>
					</tr>
					<tr>
						<th>Date Of Birth : </th>
						<td><?php echo $row['dob'];?></td>
					</tr>
					<tr>
						<th>Status : </th>
						<td><?php echo $row['voting_status'];?></td>
					</tr>
				</table>
			</div>







<?php 
include('ufooter.php'); 
?>
