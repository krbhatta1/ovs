
			

<?php 
include('homeheader.php'); 
?>







<div class="col-sm-9 mt-3 " style="background-color: #C1C1C1; min-height: 35rem;">
	<div class="mt-2" style="overflow-x:auto; margin-left: 1%;">
		

	<?php
		include('admin/dbconaction.php');
		if(isset($_GET['electionname']))
		{
			$abc=$_GET['electionname'];
			$q = "SELECT * FROM election WHERE election_name='$abc'";
			$res = mysqli_query($con, $q);

			if (mysqli_num_rows($res) > 0)
			{
				$row = mysqli_fetch_assoc($res);
		?>

	<p class="bg-secondary text-white  text-center p-2"><?php echo $row['election_name'] ?> Election </p>
	<div class="row col-sm-12" >

		<?php
		$qq = "SELECT * FROM candidates WHERE election_nam='$abc'";
		$ress = mysqli_query($con, $qq);
			if (mysqli_num_rows($ress) > 0)
			{
				
				?>



				<?php
						if(isset($_GET['abcdef']))
						  {
						    $candidate=$_GET["abcdef"];
						    $voter=$_SESSION["voterlog"];

				            $stcheck = "SELECT * FROM voters where email='$voter'";
				            $stquery = mysqli_query($con,$stcheck);
				            if(mysqli_num_rows($stquery)>0)
				            {
				               $voterstatus=mysqli_fetch_assoc($stquery);
				           	}
				           	if($voterstatus['voting_status']==="Voted")
				           	{
				           		?>
					        		<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertsms">
					        			<h4 class="text-danger" style="margin-left: 5%;"> Already Voted.</h4>
									  	<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									  </button>
									</div>
				        		<?php
				           	}
				           	else{
						    $statusset="UPDATE voters SET voting_status='Voted', election_name='$abc' WHERE email='$voter'";
							$statusready = mysqli_query($con, $statusset);
							if($statusready)
							{
								$querya = "SELECT * FROM candidates where email='$candidate'";
					            $forcandi = mysqli_query($con,$querya);
					            if(mysqli_num_rows($forcandi)>0)
					            {
					                    $can=mysqli_fetch_assoc($forcandi);
					                    
										$vt=$can['vote'];
			                    $votecount="UPDATE candidates SET vote=$vt+1 WHERE email='$candidate'";
								$votercc = mysqli_query($con, $votecount);
					             ?>
					                 <div id="alertsms" class=" alert alert-success alert-dismissible fade show" role="alert"><h4 class="text-success" style="margin-left: 5%;">Succesfully Vote to <?php echo $can['firstname'].' '.$can['middlename'].' '.$can['lastname'].''; ?>  </h4> 
					        		<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>									  
									</div>
					            
					        		
				        		<?php
								}
							}
							else
							{
								?>
					        		<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertsms"><h4 class="text-danger" style="margin-left: 5%;">
					        			 Operation Failed</h4>
									  	<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									  </button>
									</div>
				        		<?php
								}
							}
						}
					 ?>





				<div class="mt-3 mb-3"><h3>All Candidates for <i class="text-danger"><?php echo $row['election_name'] ?></i>: </h3></div><?php
					$sn=1;
				while ($roww = mysqli_fetch_assoc($ress))
				{?>
					

					<div class="col-sm-12">
						<div class="card text-white bg-danger mb-3 rounded">
							<div class="col-sm-12">
								<div class=" bg-light text-success  bg-warning rounded" style="">
									<div class="card-body">
										<h6 class="mt-auto">
			

			<table  class="bg-light border-danger rounded" style="min-width: 100%;">
			<tr>
				<td rowspan="5" colspan="2" class="p-2"><?php echo "<h1>".$sn; ?></h1></td>
				
				<td rowspan="5"><img  src="<?php echo "admin/images/".$roww['photo']; ?>" alt="Candidate Photo" height="130px" class="rounded border-1"></td>

				<td class="h3 text-danger p-1"><?php echo $roww['firstname'] . " " . $roww['middlename'] . " " . $roww['lastname']."</h3>"; ?></td>
				<td rowspan="5">
					<!--  -->
					<?php
				        $user = $_SESSION["voterlog"];
			            $stcheck = "SELECT * FROM voters where email='$user'";
			            $stquery = mysqli_query($con,$stcheck);
			            if(mysqli_num_rows($stquery)>0)
			            {
		                    $rowww=mysqli_fetch_assoc($stquery);
		                    
			            }
			            if($rowww['voting_status']==="Voted")
			            {
							echo "<button disabled class='btn votebtn btn-danger p-3 text-white text-end'><h4>Already Voted</h4></button>";
			            }
						else
						{
							echo "
							<a href='existele.php?abcdef=$roww[email]&electionname=$row[election_name]'><button class='btn votebtn btn-success p-3 text-white' onclick='cancle(event)'><h4>Vote Now</h4></button></a>
							";
						}
					?>
				</td>
			</tr>
				<tr>
					<td class="p-1"><?php echo "<b>Address: </b>" . $roww['local_level'] . "-" . $roww['ward'] . "," . $roww['district'] . ","; ?></td>
				</tr>
				<tr>
					<td class="p-1"><?php echo "<b>E-mail: </b>" . $roww['email']; ?></td>
					
				</tr>
				<tr>
					<td class="p-1"><?php echo "<b>Contact No: </b>" . $roww['phone']; ?></td>
				</tr>
				<tr>
					<td class="p-1"><?php echo "<b>DOB: </b>" . $roww['dob'] . " &nbsp;&nbsp;&nbsp; <b>Post: </b>" . $row['post'] . "----------------------------"; ?></td></tr>
				<?php  $sn=$sn+1;?>
									
				</table>

								
									</h4>
								</div>
							</div>
						</div> 
					</div>
				</div></a>





















						<?php	}	
							}
							else
							{
								?>
									<div class="text-center" style="margin-top: 15%;">
										<h2 class="text-danger">No Candidates for This Election.
															
										</h2>
									</div>
								<?php
							}
						?>
		</div>





























<?php
			}
			else
			{
				echo "Wrong Entry.";
			}
		}
		else
		{
	?>



<style>
	a{
		text-decoration: none;
	}
	.bgcolor{
		background-color: blue;
	}
	.bgcolor:hover{
		background-color: green;
	}
</style>


<p class="bg-danger text-white  text-center p-2">Now Existing Election</p>
		<div class="row col-sm-8" style="margin-left: 15%;margin-top: 5%;">
					<?php
						$q = "SELECT * FROM election";
						$res = mysqli_query($con, $q);
						if (mysqli_num_rows($res) > 0)
						{
								$sn=1;
							while ($row = mysqli_fetch_assoc($res))
							{?>
								<div class="col-sm-6 mt-3 text-center">
								<?php echo "<a href='existele.php?electionname=$row[election_name]'>";?>
									<div class="card text-white bg-danger mb-3 rounded-pill" style="min-height:rem;">
										<div class="col-sm">
										
											<div class=" text-white m-1 bgcolor rounded-pill" style=" min-height: 7rem; min-width: 6rem; max-height: 7rem;">
												<div class="card-body">
													<h4 class="card-title mt-auto">
														<?php
															echo $sn.".<br>";?>
														<?php echo $row['election_name'];
															$sn=$sn+1;
														?>
													</h4>
												</div>
											</div>
										</div> 
									</div>
								</div></a><br>
						<?php	}	
							}
						?>
		</div>
	</div>
</div>





<?php
	}
?>


<?php include('ufooter.php'); ?>

</body>
</html>




<script>
function cancle(e)
	{
	if( !confirm("Are You sure to Vote This Candidate ?") ) e.preventDefault();
	}
</script>