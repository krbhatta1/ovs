<?php 
	include('uheader.php');
	include('admin/dbconaction.php');


?>

<?php
	$qu = "SELECT * FROM result";
	$rst = mysqli_query($con, $qu);
	$rw = mysqli_fetch_assoc($rst);

?>


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
<div class="col-sm-7 mt-3 bg-light ">
	<div class="mx-5 mt-4" style="overflow-x:auto;">

		<p class="bg-danger abc text-white  text-center p-2">Result Of &nbsp;&nbsp; 
			<?php echo "<i class='abcd'>".$rw['election_name']."</i>"; ?>&nbsp;&nbsp; Election
		</p>

			<?php 
			if($rw['r_status'] == "Published")
			{
	
				$wquery = "SELECT * FROM candidates WHERE vote=(select max(vote)  from candidates where election_nam='$rw[election_name]')";
				$checkq = mysqli_query($con, $wquery);
				$fetchw = mysqli_fetch_assoc($checkq);
				?>
				<div class="text-center mb-1 mt-0">
				<?php echo "<img src='admin/images/".$fetchw['photo']."' alt='".$fetchw['firstname']." ".$fetchw['middlename'].$fetchw['lastname']." Photo"."'.' height='100' class=' rounded-circle border border-danger'/></td></div>";
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
										echo "<th  class='text-success'>". $row["vote"] . "</th>";

										$qq = "SELECT election_name FROM election where election_id='".$row['election_id']."'";
										$ress = mysqli_query($con, $qq);
										$roww = mysqli_fetch_assoc($ress);

										echo "<td>". $roww['election_name'] . "</td>";
										echo "<td><img src='admin/images/".$row['photo']."' height='50'/></td></tr>";
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
			<?php
			}
			else
			{
				echo "<h2 class='text-success'> Comming soon.....<h2>
					<br><br>
				<h4 class='text-danger text-center'>
					Not published right now !!
				<h4>";							
			}
		?>
				</div>
			</div>
	</div>
	</div>














<?php 
	include('ufooter.php');

?>