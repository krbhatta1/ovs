			

<?php include('header.php'); 
include('dbconaction.php');
 	
?>
<style>
	.viewmore{
		font-size: 12px;
		color: white;
	}
	.viewmore:hover{
		background-color: white;
		color: brown;
		font-weight: bold;
	}
	.viewmor{
		text-decoration: none;
	}
</style>

		<div class="col-sm-9 mt-3 bg-light ">
			<div class="row mx-5 text-center">

				<div class="col-sm-3 mt-3">
					<div class="card text-white bg-secondary mb-3" style="min-height:10rem; min-width: 6rem;">
						<div class="card-header bg-dark">Voter</div>
							<div class="card-body">
								<h4 class="card-title">
									<?php
										$sql="SELECT * FROM voters where approv_status='Approved'";

										if ($result=mysqli_query($con,$sql))
										  {
										  	$voterrownum=mysqli_num_rows($result);
										 	echo "<h6>Total Voters = ".$voterrownum."</h6>";
										  }
									 ?>
								</h4>
								<button type="button" class=" mt-4 btn btn-sm viewmore" data-bs-toggle="modal" data-bs-target="#voterviewmore">View More</button>
							</div>
						</div>
					</div>


			<div class="col-sm-6 mt-3">
				<div class="card text-white bg-danger mb-3" style="min-height:10rem;">
					<div class="card-header bg-dark">Total Candidate = 
						<?php
							$sqls="SELECT * FROM candidates where status='Approved'";

							if ($resut=mysqli_query($con,$sqls))
							  {
							  	$canrownum=mysqli_num_rows($resut);
							 	echo "".$canrownum."";
							  }
							?>
					</div>

					<div class="row">
					<?php	
						$results=mysqli_query($con, "SELECT * FROM election");
						$user=mysqli_fetch_all($results, MYSQLI_ASSOC);
					?>

						<?php foreach($user as $item): ?>
							<div class="col-sm">
								<a href="" class="mt-auto viewmor" data-bs-toggle="modal" data-bs-target="#candidateviewmore">
								<div class=" text-white bg-primary m-1" style=" min-height: 7rem; min-width: 6rem; max-height: 7rem;">
									<div class="card-body">
										<h4 class="card-title mt-auto">
											<?php
												$sql="SELECT * FROM candidates where status='Approved' AND election_nam='".$item['election_name']."'";

												if ($result=mysqli_query($con,$sql))
												  {
												  	$voterrownum=mysqli_num_rows($result);
												  	echo "<h6>".$item['election_name']."<br>".$voterrownum."</h6>";
												  }
												  $enamee=$item['election_name'];
											 ?>
										</h4>
									</div>
								</div></a>
							</div> 
						<?php endforeach;?>
					</div>

				</div>
			</div>

									
					<div class="col-sm-3 mt-3">
						<div class="card text-white bg-secondary mb-3 " style="min-height:10rem; min-width: 6rem;">
							<div class="card-header bg-dark">Election</div>
							<div class="card-body">
								<h4 class="card-title">
									<?php
										$sql="SELECT * FROM election";

										if ($result=mysqli_query($con,$sql))
										  {
										  	$electionrownum=mysqli_num_rows($result);
										 	echo "<h6>Total Elections = ".$electionrownum."</h6>";
										  }
									 ?>
								</h4>
								<button type="button" class="btn btn-sm mt-4 viewmore" data-bs-toggle="modal" data-bs-target="#electionviewmore">View More</button>
							</div>
						</div>
					</div>
				</div>

				<div class="mx-5 mt-4 text-center" style="min-height: 15rem;">
					<p class="bg-danger text-white p-1">Panding Voters</p>
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

								$app="";
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
									echo "<td><a href='operationfile/approvevoter.php?vid=$row[voterid]'> <button type='submit' name='apprbtn' class='btn btn-sm btn-success'  onclick='voterapp(event)'>Approve</button></a>";
									echo "<a href='operationfile/approvevoter.php?voterrejectid=$row[voterid]' onclick='voterrej(event)'> <button type='submit' name='rejectbtn' class='btn btn-sm btn-danger' > Reject</button> <a/></td></tr>";

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
function  voterrej(e)
	{
	if( !confirm("Are You sure to Rejected This Voter ?") ) e.preventDefault();
	}

function  voterapp(e)
	{
	if( !confirm("Are You sure to Approve This Voter ?") ) e.preventDefault();
	}

function  candiapprove(e)
	{
	if( !confirm("Are You sure to Approve This Candidate ?") ) e.preventDefault();
	}

function  candireject(e)
	{
	if( !confirm("Are You sure to Rejeceted This candidate ?") ) e.preventDefault();
	}
</script>



				<div class="mx-5 mt-4 text-center" style="min-height: 15rem;">
					<p class="bg-danger text-white p-1">Panding Candidates</p>
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

								$app="";
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
									echo "<td><a href='operationfile/approvevoter.php?cid=$row[candidate_id]'> <button type='submit' name='apprbtn' class='btn btn-sm btn-success'  onclick='candiapprove(event)'>Approve</button></a>";
									echo "<a href='operationfile/approvevoter.php?crejid=$row[candidate_id]' > <button type='submit' name='rejectbtn' class='btn btn-sm btn-danger' onclick='candireject(event)'> Reject</button> <a/></td></tr>";

									}
								}
								else
								{ ?>
									<tr>
										<th scope="row" colspan="7" class="text-center">No Panding candidates.</th>
									</tr>
									<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>



<!-- View more for voter start-->
<div class="modal fade" id="voterviewmore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Total Approved Voter's List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      	<form action="" method="POST">
	      <div class="modal-body">
	      <div class=" mt-" style="min-height: 20rem;">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">SN.</th>
								<th class="col">Name</th>
								<th class="col">Email</th>
								<th class="col">Phone</th>
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
										echo "<td>". $row["firstname"]." ". $row["middlename"]." ". $row["lastname"] . "</td>";
										echo "<td>". $row["email"] . "</td>";
										echo "<td>". $row["phone"] . "</td>";
										echo "<td><img src='images/".$row['photo']."' height='50'/></td>";
											$serialno=$serialno+1;
									}
								}
								else
								{ ?>
									<tr>
										<th scope="row" colspan="7" class="text-center">No Approved Voters.</th>
									</tr>
									<?php
								}
							?>
						</tbody>
					</table>
				</div>
			
			<div class="modal-footer">
			        <button type="button" class="btn btn-lg btn-danger" data-bs-dismiss="modal">Close</button>
	     		 </div>

	      </div>  
  		</form>
    </div>
  </div>
</div>
<!-- View more for voter end-->


<!-- View more for election start-->
<div class="modal fade" id="electionviewmore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Total Election List: </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      	<form action="" method="POST">
	      <div class="modal-body">
	      <div class="mx-5 mt-3 text-center" style="min-height: 15em;">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">SN.</th>
								<th class="col">Election Name</th>
								<th class="col">Post</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$q = "SELECT * FROM election";
								$res = mysqli_query($con, $q);

								if(mysqli_num_rows($res)>0) 
								{
										$serialno=1;
									while ($row = mysqli_fetch_assoc($res)) 
									{
										echo "<tr><th>". $serialno . "</th>";	
										echo "<td>". $row["election_name"] . "</td>";
										echo "<td>". $row["post"] . "</td>";
											$serialno=$serialno+1;
									}
								}
								else
								{ ?>
									<tr>
										<th scope="row" colspan="7" class="text-center">No Election.</th>
									</tr>
									<?php
								}
							?>
						</tbody>
					</table>
				</div>
			
			<div class="modal-footer">
			        <button type="button" class="btn btn-lg btn-danger" data-bs-dismiss="modal">Close</button>
	     		 </div>

	      </div>  
  		</form>
    </div>
  </div>
</div>
<!-- View more for election end-->
















<!-- View more for candidate start-->
<div class="modal fade" id="candidateviewmore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Total Approved Candidate's List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      	<form action="" method="POST">
	      <div class="modal-body">
	      	<!-- <div class="mx-5 mt-4 text-center" style="min-height: 15rem;"> -->
	      <div class=" mt-1 text-center" style="min-height: 20rem;">
					
					<?php 
						$q = "SELECT * FROM election";
						$res = mysqli_query($con, $q);

						if(mysqli_num_rows($res)>0) 
						{
							
							while ($row = mysqli_fetch_assoc($res)) 
							{
								?>
							<div>
								<p class="bg-success text-white p-1">Total Approved Candidate of <?php echo $row["election_name"];?></p>
									<table class="table">
										<thead>
											<tr>
												<th scope="col">SN.</th>
												<th class="col">Name</th>
												<th class="col">Email</th>
												<th class="col">Phone</th>
												<th class="col">Photo</th>
											</tr>
										</thead>
										<tbody>

							<?php
								$app="Approved";
								$qq = "SELECT * FROM candidates where status='".$app."' AND election_nam='".$row["election_name"]."'";
								$ress = mysqli_query($con, $qq);

								if(mysqli_num_rows($ress)>0) 
									{
											$serialno=1;
										while ($row = mysqli_fetch_assoc($ress)) 
										{

											echo "<tr><th>". $serialno . "</th>";	
											echo "<td>". $row["firstname"]." ". $row["middlename"]." ". $row["lastname"] . "</td>";
											echo "<td>". $row["email"] . "</td>";
											echo "<td>". $row["phone"] . "</td>";
											echo "<td><img src='images/".$row['photo']."' height='50'/></td></tr>";
												$serialno=$serialno+1;
										}
									}
								else
									{
										?><tr>
											<th scope="row" colspan="7" class="text-center">No Approved candidates.</th></tr>

										<?php
									}
									
									echo "</tbody></table></div>";
							}
						}
						else
						{
							echo "No Election.";
						}
					?>

						</tbody>
					</table>
				</div>
			
			<div class="modal-footer">
			        <button type="button" class="btn btn-lg btn-danger" data-bs-dismiss="modal">Close</button>
	     		 </div>

	      </div>  
  		</form>
    </div>
  </div>
</div>
<!-- View more for candidate end-->





<?php include('footer.php'); ?>

<script type="text/javascript" src="js/jquery-3.6.0.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>