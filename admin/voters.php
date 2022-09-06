<?php 
	include('header.php');
?>







<div class="col-sm-9 mt-0 bg-light ">
	<div class="mx-5 mt-4" style="overflow-x:auto;">
			<p class="bg-dark text-white p-1 text-center"> Voters</p>

		<table class="table">
			<thead>
			<a href="voteradd_byadmin.php">
				<button class="btn btn-sm btn-success text-center">Add New Voter</button>
			</a>
			<tr>
					<th scope="col">SN.</th>
					<th class="col">Name</th>
					<th class="col">Email</th>
					<th class="col">Phone</th>
					<th class="col">Photo</th>
					<th class="col" colspan="2">Action</th>
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
						echo "<td>". $row["firstname"]." ". $row["middlename"]." ". $row["lastname"] . "</td>";
						echo "<td>". $row["email"] . "</td>";
						echo "<td>". $row["phone"] . "</td>";
						echo "<td><img src='images/".$row['photo']."' height='50'/></td>";
							$serialno=$serialno+1;



					echo "<td><a href='operationfile/approvevoter.php?xd=$row[voterid]'> <button type='submit' name='rejectbtn' class='btn btn-sm btn-danger' onclick='deletev(event)'> Delete </button> <a/>";

					echo "<a href='operationfile/approvevoter.php?xr=$row[voterid]'> <button type='submit' name='viewvoterbtn' class='btn btn-sm btn-warning border-primary' onclick='approve(event)'> Reject </button> <a/>";

					echo "<a href='voteradd_byadmin.php?xe=$row[voterid]'> <button type='submit' name='apprbtn' class='btn btn-sm btn-success' onclick='edit(event)'>Edit</button></a></td></tr>";


					}
				}
				else
				{ ?>
					<tr>
						<th scope="row" colspan="7" class="text-center">No Panding Voters.</th>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>






<script>
function  deletev(e)
	{
	if( !confirm("Are You sure to Delete This Voter ?") ) e.preventDefault();
	}

function  edit(e)
	{
	if( !confirm("Are You sure to Edit This Voter ?") ) e.preventDefault();
	}

function  approve(e)
	{
	if( !confirm("Are You sure to Rejected This voter ?") ) e.preventDefault();
	}
</script>








<?php 
	include('footer.php');
?>