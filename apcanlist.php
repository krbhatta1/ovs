<?php 
	include('uheader.php');
	include('admin/dbconaction.php');
?>



<div class="col-sm-9 mt-3 bg-light" style="margin-left:;">
<div class="row">
<div class="col-sm-6 mt-3 bg-light" style="margin-left: ;">
	<div class="mx-3 mt-4" style="overflow-x:auto;">
		<p class="bg-success text-white  text-center p-1">Approved Voters List</p>
		<table class="table" style="width:">
		<thead>
			<tr>
				<th scope="col">SN.</th>
				<th class="col text-center">Name</th>
				<th class="col">Photo</th>
			</tr>
			</thead>
			<tbody>
			<?php  
				$app="Approved";
				$q = "SELECT * FROM voters where approv_status='".$app."'";
				$res = mysqli_query($con, $q);
				if(mysqli_num_rows($res)>0) 
				{
						$serialno=1;
					while ($row = mysqli_fetch_assoc($res)) 
					{
							
						echo "<tr><th>". $serialno . "</th>";
						echo "<td>". $row["firstname"]." ".$row["middlename"]." ".$row["lastname"]."</td>";
						echo "<td><img src='admin/images/".$row['photo']."' height='40'/></td>";
							$serialno=$serialno+1;
					}
				}
				else
				{ ?>
					<tr>
						<th scope="row" colspan="7" class="text-center"><h3 style="font-style: italic; color: red;">Empty</h3></th>
					</tr>
					<?php
				}
				echo "</tbody></table>";
			?>
</div>
</div>



<div class="col-sm-6 mt-3 bg-light" style="margin-left: ;">
	<div class="mx-3 mt-4" style="overflow-x:auto;">
		<p class="bg-success text-white  text-center p-1">Approved Candidates List</p>
		<table class="table" style="width:">
		<thead>
			<tr>
				<th scope="col">SN.</th>
				<th class="col text-center" >Name</th>
				<th class="col text-center" >Election</th>
				<th class="col">Photo</th>
			</tr>
			</thead>
			<tbody>
			<?php  
				$app="Approved";
				$q = "SELECT * FROM candidates where status='".$app."'";
				$res = mysqli_query($con, $q);

				if(mysqli_num_rows($res)>0) 
				{
						$serialno=1;
					while ($row = mysqli_fetch_assoc($res)) 
					{
						echo "<tr><th>". $serialno . "</th>";	
						echo "<td>". $row["firstname"]." ". $row["middlename"]." ". $row["lastname"] . "</td>";
						echo "<td>". $row["election_nam"]."</td>";
						echo "<td><img src='admin/images/".$row['photo']."' height='40'/></td>";
							$serialno=$serialno+1;
					}
				}
				else
				{ ?>
					<tr>
						<th scope="row" colspan="7" class="text-center"><h3 style="font-style: italic; color: red;">Empty</h3></th>
					</tr>
					<?php
				}
			?>
		</tbody></table>
	</div>

</div>
</div>




<div class="row">
<div class="col-sm-6 mt-3 bg-light" style="margin-left: ;">
	<div class="mx-3 mt-4" style="overflow-x:auto;">
		<p class="bg-danger text-white  text-center p-1">Reject Voters List</p>
		<table class="table" style="width:">
		<thead>
			<tr>
				<th scope="col">SN.</th>
				<th class="col text-center">Name</th>
				<th class="col">Photo</th>
			</tr>
			</thead>
			<tbody>
			<?php  
				$app="Rejected";
				$q = "SELECT * FROM voters where approv_status='".$app."'";
				$res = mysqli_query($con, $q);
				if(mysqli_num_rows($res)>0) 
				{
						$serialno=1;
					while ($row = mysqli_fetch_assoc($res)) 
					{
							
						echo "<tr><th>". $serialno . "</th>";
						echo "<td>". $row["firstname"]." ".$row["middlename"]." ".$row["lastname"]."</td>";
						echo "<td><img src='admin/images/".$row['photo']."' height='40'/></td>";
							$serialno=$serialno+1;
					}
				}
				else
				{ ?>
					<tr>
						<th scope="row" colspan="7" class="text-center"><h3 style="font-style: italic; color: red;">Empty</h3></th>
					</tr>
					<?php
				}
				echo "</tbody></table>";
			?>
</div>
</div>



<div class="col-sm-6 mt-3 bg-light" style="margin-left: ;">
	<div class="mx-3 mt-4" style="overflow-x:auto;">
		<p class="bg-danger text-white  text-center p-1">Rejected Candidates List</p>
		<table class="table" style="width:">
		<thead>
			<tr>
				<th scope="col">SN.</th>
				<th class="col text-center" >Name</th>
				<th class="col">Photo</th>
			</tr>
			</thead>
			<tbody>
			<?php  
				$app="Rejected";
				$q = "SELECT * FROM candidates where status='".$app."'";
				$res = mysqli_query($con, $q);

				if(mysqli_num_rows($res)>0) 
				{
						$serialno=1;
					while ($row = mysqli_fetch_assoc($res)) 
					{
						echo "<tr><th>". $serialno . "</th>";	
						echo "<td>". $row["firstname"]." ". $row["middlename"]." ". $row["lastname"] . "</td>";
						echo "<td><img src='admin/images/".$row['photo']."' height='40'/></td>";
							$serialno=$serialno+1;
					}
				}
				else
				{ ?>
					<tr>
						<th scope="row" colspan="7" class="text-center"><h3 style="font-style: italic; color: red;">Empty</h3></th>
					</tr>
					<?php
				}
			?>
		</tbody></table>
	</div>

</div>
</div>

</div>






<?php 
	include('ufooter.php');
?>