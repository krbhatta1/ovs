<?php 
	include('header.php');
?>





<script>
function  canddel(e)
	{
	if( !confirm("Are You sure to Delete This Candidate ?") ) e.preventDefault();
	}

function  candedit(e)
	{
	if( !confirm("Are You sure to Edit This Voter ?") ) e.preventDefault();
	}

function  candiapp(e)
	{
	if( !confirm("Are You sure to Rejected This Candidate ?") ) e.preventDefault();
	}
</script>


<div class="col-sm-9 mt-0 bg-light ">
	<div class="mx-5 mt-4" style="overflow-x:auto;">
			<p class="bg-dark text-white p-1 text-center"> Candidates</p>

		<table class="table">
		<thead>
			<a href="candi_add_byadmin.php">
				<button class="btn btn-sm btn-success text-center">Add New Candidates</button>
			</a>
				<tr>
					<th >SN.</th>
					<th >Voter_Full_Name</th>
					<th >Email</th>
					<th >Phone</th>
					<th >Voters_Address</th>
					<th >Date_Of_Birth</th>
					<th >Gender</th>
					<th >Election</th>
					<th >Photo</th>
					<th >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
							echo "<td>". $row["email"] . "</td>";
							echo "<td>". $row["phone"] . "</td>";


						echo "<td>". $row["local_level"]."-". $row["ward"].", ". $row["district"] . "</td>";

						echo "<td>".$row["dob"]."</td>";
						echo "<td>".$row["gender"]."</td>";
						echo "<td>".$row["election_nam"]."</td>";
						echo "<td><img src='images/".$row['photo']."' height='50'/></td>";

						// echo "<td><a href='viewmorevoter.php?vid=$row[voterid]'> <button type='submit' name='viewvoterbtn' class='btn btn-sm btn-warning border-primary'> More</button> <a/>";

						echo "<td><a href='candi_add_byadmin.php?cidedit=$row[candidate_id]'> <button type='submit' name='apprbtn' class='btn btn-sm btn-success' onclick='candedit(event)'>Edit</button></a>";

						echo "<a href='operationfile/approvevoter.php?apc=$row[candidate_id]'> <button type='submit' name='apprbtn' class='btn btn-sm btn-warning m-1' onclick='candiapp(event)'> Reject </button></a>";

						echo "<a href='operationfile/approvevoter.php?cidfordel=$row[candidate_id]' onclick='canddel(event)'> <button type='submit' name='rejectbtn' class='btn btn-sm btn-danger'> Delete</button> <a/></td></tr>";


						}
					}
					else
					{ ?>
						<tr>
							<th scope="row" colspan="7" class="text-center">No Voters.</th>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
















<?php 
	include('footer.php');
?>