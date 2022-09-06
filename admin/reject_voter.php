<?php 
	include('header.php');
?>








<div class="col-sm-8 mt-3 bg-light ">
				<div class="mx-5 mt-4">

			<div class="mt-3 text-center" style="min-height: 20rem;">
					<p class="bg-danger text-white p-1">Rejected Voters</p>
					<table class="table">
						<thead>
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

								$app="Rejected";
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
									// echo "<td><a href='viewmorevoter.php?vid=$row[voterid]'> <button type='submit' name='viewvoterbtn' class='btn btn-sm btn-warning border-primary'> More</button> <a/>";
									echo "<td><a href='operationfile/approvevoter.php?vidbyrej=$row[voterid]'> <button type='submit' name='apprbtn' class='btn btn-sm btn-success' onclick='approvevoter(event)'>Approve</button></a>";
									echo "<a href='operationfile/approvevoter.php?vdelid=$row[voterid]' onclick='delvoter(event)'> <button type='submit' name='rejectbtn' class='btn btn-sm btn-danger'> Delete</button> <a/></td></tr>";

									}
								}
								else
								{ ?>
									<tr>
										<th scope="row" colspan="7" class="text-center">No Rejected Voters.</th>
									</tr>
									<?php
								}
							?>
						</tbody>
					</table>
				</div>


<script>
function  delvoter(e)
	{
	if( !confirm("Are You sure to Delete This Voter ?") ) e.preventDefault();
	}

function  approvevoter(e)
	{
	if( !confirm("Are You sure to Approve This Voter ?") ) e.preventDefault();
	}

function  approvecandi(e)
	{
	if( !confirm("Are You sure to DApproved This Candidate ?") ) e.preventDefault();
	}

function  delcandi(e)
	{
	if( !confirm("Are You sure to Delete This candidate ?") ) e.preventDefault();
	}
</script>



			<div class="mt-3 text-center" style="min-height: 15rem;">
					<p class="bg-danger text-white p-1">Rejected Candidates</p>
					<table class="table">
						<thead>
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
										echo "<td>". $row["email"] . "</td>";
										echo "<td>". $row["phone"] . "</td>";
										echo "<td><img src='images/".$row['photo']."' height='50'/></td>";
											$serialno=$serialno+1;

									// echo "<td><a href='viewmorevoter.php?vid=$row[voterid]'> <button type='submit' name='viewvoterbtn' class='btn btn-sm btn-warning border-primary'> More</button> <a/>";
									echo "<td><a href='operationfile/approvevoter.php?cidbyrej=$row[candidate_id]'> <button type='submit' name='apprbtn' class='btn btn-sm btn-success' onclick='approvecandi(event)'>Approve</button></a>";
									echo "<a href='operationfile/approvevoter.php?cdelid=$row[candidate_id]' onclick='cancle(event)'> <button type='submit' name='rejectbtn' class='btn btn-sm btn-danger' onclick='delcandi(event)'> Delete </button> <a/></td></tr>";

									}
								}
								else
								{ ?>
									<tr>
										<th scope="row" colspan="7" class="text-center">No Rejected Candidates.</th>
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