
			
<?php include('header.php'); ?>

<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
  height: 10px;
}

tr:nth-child(even){background-color: #f2f2f0}
</style>

			<div class="col-sm-7 mt-0 bg-light ">
				<div class="mx-5 mt-4" style="overflow-x:auto;">
					<p class="bg-dark text-white  text-center p-1">Election</p>

					
					<?php
					include('dbconaction.php');
			        	if(isset($_POST['adde']))
			        	{
			        		$eid = $_POST['eid'];
			        		$ename = $_POST['ename'];
			        		$epost = $_POST['epost'];

			        		$query= "insert into election(election_id,election_name,post) values('$eid','$ename','$epost')";
			        		if(mysqli_query($con,$query))
			        		{
				        		?>
					        		<div id="alertsms" class="alert alert-success alert-dismissible fade show" role="alert"><?php echo $ename; ?> is Add Successfully !
									  	<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									  </button>
									</div>
				        		<?php
			        		}
			        		else
			        		{
				        		?>
					        		<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertsms">
					        			 Operation Failed
									  	<button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									  </button>
									</div>
				        		<?php
			        		}
			        	}
			        ?>

			        <script type="text/javascript">
						 function timedMsg()
						{
						var t=setTimeout("document.getElementById('alertsms').style.display='none';",3000);
						} 
					</script>
					<script language="JavaScript" type="text/javascript">timedMsg()</script>



						<table class="table ">
						<thead>
							<button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addelection">Add New Election</button>


							<tr>
								<th >SN.</th>
								<th >Election ID</th>
								<th > ELection Name</th>
								<th >Post</th>
								<th >Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$q = "SELECT * FROM election";
								$res = mysqli_query($con, $q);

								if (mysqli_num_rows($res) > 0) 
								{
									$serialno=1;
									while ($row = mysqli_fetch_assoc($res)) 
									{
										echo "<tr><th>". $serialno . "</th>";	
										echo "<th>". $row["election_id"] . "</th>";	
										echo "<td>". $row["election_name"] . "</td>";
										echo "<td>". $row["post"] . "</td>";

											$serialno=$serialno+1;
									echo "<td><a href='electiondel.php?eidd=$row[auto_id]'> <button type='submit' name='editbtn' class='btn btn-sm btn-info'>Edit</button></a>";
									echo "<a href='electiondel.php?ename=$row[election_name]' onclick='cancle(event)'> <button type='submit' name='deletebtn' class='btn btn-sm btn-danger'> Delete</button> <a/></td></tr>";
									}
								}
								else
								{ ?>
									<tr>
										<th scope="row" colspan="3" class="text-center">No Election</th>
									</tr>
									<?php
								}
							?>
<script>
function cancle(e)
	{
	if( !confirm("Are You sure to Delete This Voter ?") ) e.preventDefault();
	}
</script>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<!-- Election add Model -->
<div class="modal fade" id="addelection" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Add New Election</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      	<form action="" method="POST">
	      <div class="modal-body">
	       
	          	<div class="mb-2">
		            <label for="recipient-name" class="col-form-label">Election ID: </label>
		            <input type="number" class="form-control" id="recipient-name" name="eid" required="">
	        	</div>
		        <div class="mb-2">
		           <label for="ename" >Election Name:</label>
		             <input type="text" class="form-control" id="ename" name="ename" required="">
		        </div>
		        <div class="mb-2">
		           <label for="epost" >Election Post: </label><br>
		           <select id="epost" name="epost" class="form-control" required="">
			           	<option selected>--Select--</option>
			           	<option value="Chairman">Chairman</option>
			           	<option value="Voice Chairman">Voice Chairman</option>
			           	<option value="Ideal">Ideal</option>
			           	<option value="Leder">Leder</option>
		           </select>
		        </div>
		        <div class="modal-footer">
			        <button type="submit" name="adde" class="btn btn-sm btn-success">Add</button>
			        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
	     		 </div>
	      
		        
	      </div>  
  		</form>
    </div>
  </div>
</div>
				









<?php include('footer.php');?>


</body>
</html>