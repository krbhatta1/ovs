<?php 
	include('header.php');
	include('dbconaction.php');


?>

<?php
	$qu = "SELECT * FROM result";
	$rst = mysqli_query($con, $qu);
	$rw = mysqli_fetch_assoc($rst);

?> 



<div class="col-sm-7 mt-3 bg-light ">
	<div class="mx-5 mt-4" style="overflow-x:auto;">
		<?php
			if(isset($_POST['private']))
			{
				$ss="Privated";

				if($ss===$rw['r_status'])
				{
					?>
	        		<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertsms">
	        			 Operation Failed !!
					  	<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					  </button>
					</div>
        			<?php
				}
				else
				{
	        		$privateq = "UPDATE  result SET r_status= '".$ss."' WHERE election_name='".$rw['election_name']."'";

	        		if(mysqli_query($con,$privateq))
	        		{
		        		?>
			        		<div id="alertsms" class="alert alert-success alert-dismissible  show" role="alert"> Result Privated Successfully.
							  	<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							  </button>
							</div>
		        		<?php
	        		}
	        		else
	        		{
		        		?>
			        		<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertsms">
			        			 Operation Failed !!
							  	<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							  </button>
							</div>
		        		<?php
	        		}
	        	 }
			}
			else{	}




		if(isset($_POST['published']))
			{
				$sss="Published";

				if($sss===$rw['r_status'])
				{
					?>
	        		<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertsms">
	        			 Operation Failed !!
					  	<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					  </button>
					</div>
        			<?php
				}
				else
				{
	        		$publishq = "UPDATE  result SET r_status= '".$sss."' WHERE election_name='".$rw['election_name']."'";

	        		if(mysqli_query($con,$publishq))
	        		{
		        		?>
			        		<div id="alertsms" class="alert alert-success alert-dismissible fade show" role="alert"> Result Published Successfully.
							  	<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							  </button>
							</div>
		        		<?php
	        		}
	        		else
	        		{
		        		?>
			        		<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertsms">
			        			 Operation Failed !!
							  	<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							  </button>
							</div>
		        		<?php
	        		}
	        	  }
				}
?>




		<p class="bg-danger abc text-white  text-center p-2">Result Of &nbsp;&nbsp; 
			<?php echo "<i class='abcd'>".$rw['election_name']."</i>"; ?>&nbsp;&nbsp; Election
		</p>



		<?php 
			if($rw['r_status'] == "Published")
				{
					?>
					<form action="" method="POST">
						<div class="bg- text-end">
							<span class="bg-warning p-1">Result is Published now.</span>
							<button type="submit" class="btn btn-sm btn-info p-1" onclick='notpub(event)' name="private"> &nbsp; &nbsp; &nbsp; Private &nbsp; &nbsp; &nbsp; </button>
						</div>
						<script>
							function notpub(e)
								{
									if( !confirm("Are You sure to Result Private?") ) e.preventDefault();
								}
						</script>
					</form>
					<?php
				}
			else
				{

				}

			if($rw['r_status'] == "Privated")
			{
				?>
					<form action="" method="POST">
						<div class="bg- text-end">
							<span class="bg-warning p-1">Result is Private now.</span>
							<button type="submit" class="btn btn-sm btn-success p-1" onclick='publisf(event)' name="published">&nbsp; &nbsp; Published &nbsp; &nbsp; </button>
						</div>
						<script>
							function publisf(e)
								{
								if( !confirm("Are You sure to Result Published?") ) e.preventDefault();
								}
						</script>

					</form> 
				<?php					
			}
			else
			{

			}





				$wquery = "SELECT * FROM candidates WHERE vote=(select max(vote)  from candidates where election_nam='$rw[election_name]')";
				$checkq = mysqli_query($con, $wquery);
				$fetchw = mysqli_fetch_assoc($checkq);
				?>

				<div class="text-center mb-1 mt-0">
			<?php echo "<img src='images/".$fetchw['photo']."' alt='".$fetchw['firstname']." ".$fetchw['middlename'].$fetchw['lastname']." Photo"."'.' height='110' class=' rounded-circle border border-danger'/></td></div>";
			?>


				<marquee  behavior="alternate"  Scrollamount= 2>
					<h5  class="">Winner Candidate: <i class="text-success">
					<?php 
						echo "". $fetchw["firstname"]." ". $fetchw["middlename"]." ". $fetchw["lastname"] ."</i> - <span class='text-success'>With ". $fetchw["vote"]. " Votes.</span>";
					?>
					</h5>
				</marquee>

					 
					<!-- <hr class=" col-sm-12"> -->
					
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Rank</th>
								<th class="col">Name</th>
								<th class="col">Phone</th>
								<th class="col">T. Vote</th>
								<th class="col">Election</th>
								<th class="col">Photo</th>
							</tr>
						</thead>
						<tbody>
					<?php 
								$app="Approved";
								$q = "SELECT * FROM candidates where election_nam='$rw[election_name]' AND status='".$app."' ORDER BY vote desc";
								
								$res = mysqli_query($con, $q);

								if(mysqli_num_rows($res)>0) 
								{
									$serialno=1;
									while ($row = mysqli_fetch_assoc($res)) 
									{

										echo "<tr><th>". $serialno . "</th>";	
										echo "<td>". $row["firstname"]." ". $row["middlename"]." ". $row["lastname"] . "</td>";
										echo "<td>". $row["phone"] . "</td>";	
										echo "<th class='text-success'>". $row["vote"] . "</th>";

										$qq = "SELECT election_name FROM election where election_id='".$row['election_id']."'";
										$ress = mysqli_query($con, $qq);
										$roww = mysqli_fetch_assoc($ress);

										echo "<td>". $roww['election_name'] . "</td>";
										echo "<td><img src='images/".$row['photo']."' height='50'/></td></tr>";
											$serialno=$serialno+1;
									}
								}
								else
								{ ?>
									<tr>
										<th scope="row" colspan="6" class="text-center">No Candidates.</th>
									</tr>
									<?php
								}
							?>
					
							<tr class="text-center" bgcolor="#3EDB96">
								<td colspan="2" style='font-size:22px; text-shadow: 1px 1px white;  '> Total </td>						
								<?php echo "<td style='font-size:22px; text-shadow: 1px 1px white;  ' colspan=2> Candidates - <font color='red' style='text-shadow: 1px 1px white; font-weight: bold;'>". mysqli_num_rows($res) . "</font></td>";?>
								</th>

									<?php 
										$qqq = "SELECT * FROM voters";
										$resss = mysqli_query($con, $qqq);
									?>

								<?php echo "<td style='font-size:22px; text-shadow: 1px 1px white;  ' colspan='2'> Voters - <font color='red' style='text-shadow: 1px 1px white; font-weight: bold;'>". mysqli_num_rows($resss) . "</font></td>";
									mysqli_close($con);
								?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
	</div>
	</div>





<style>
	.abcd{
		color: yellow;
		font-weight: bold;
		font-size: 18px;
	}
	.abc{
		font-size: 18px;
		font-weight: bold;
	}
</style>







<?php 
	include('footer.php');

?>