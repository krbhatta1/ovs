

<?php 
include('header.php');
?>	
		<div class="col-sm-9 mt-0 bg-light ">
		<div class="mx-5 mt-4 text-center">


			<div class="mx-5 mt-4 text-center" style="min-height: 15rem;">
					<p class="bg-dark text-white p-1">Panding Voters</p>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Voter ID</th>
								<th class="col">Name</th>
								<th class="col">Email</th>
								<th class="col">Phone</th>
								<th class="col">Photo</th>
								<th class="col" colspan="2">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 

								$app="";
								$q = "SELECT * FROM voters where approv_status='".$app."'";
								$res = mysqli_query($con, $q);

								if(mysqli_num_rows($res)>0) 
								{
									while ($row = mysqli_fetch_assoc($res)) 
									{
										echo "<tr><th>". $row["voterid"] . "</th>";	
										echo "<td>". $row["firstname"]." ". $row["middlename"]." ". $row["lastname"] . "</td>";
										echo "<td>". $row["email"] . "</td>";
										echo "<td>". $row["phone"] . "</td>";
										echo "<td><img src='images/".$row['photo']."' height='50'/></td>";


									// echo "<td><a href='viewmorevoter.php?vid=$row[voterid]'> <button type='submit' name='viewvoterbtn' class='btn btn-sm btn-warning border-primary'> More</button> <a/>";
									echo "<td><a href='operationfile/approvevoter.php?vid=$row[voterid]'> <button type='submit' name='apprbtn' class='btn btn-sm btn-success'>Approve</button></a>";
									echo "<a href='operationfile/approvevoter.php?voterrejectid=$row[voterid]' onclick='cancle(event)'> <button type='submit' name='rejectbtn' class='btn btn-sm btn-danger'> Reject</button> <a/></td></tr>";

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



<?php 
include('footer.php');
?>