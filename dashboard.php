
			

<?php 
include('homeheader.php'); 
?>



<?php

		if(isset($_SESSION['voterlog'] ))
		{
			$user = $_SESSION["voterlog"];
			include('admin/dbconaction.php');
			$q = "SELECT * FROM voters WHERE email='$user'";
			$res = mysqli_query($con, $q);

			if (mysqli_num_rows($res) > 0)
			{
				$row = mysqli_fetch_assoc($res);
			}
		}
		else
		{
			unset($_SESSION["voterlog"]);
		}
	?>



<div class="col-sm-9 mt-3 " style="background-color: #E1E1E1; min-height: 32rem;">
	<div class="mt-2 " style="overflow-x:auto;">
		<div class="bg-dark text-white"><p class="p-2" style="margin-left: 5%;">Welcome <i style="color: yellow" class="text-warning"><b>
						<?php echo $row['firstname']." !!"?></i></b></p></div>


						<div class="" style="margin-top: 25%">
							<h1 class="text-success text-center">
								Now You Can Vote.
							</h1>
						</div>




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

		<div class="row col-sm-8" style="margin-left: 15%;margin-top: 5%;">
					
		</div>
	</div>
</div>








<?php include('ufooter.php'); ?>

</body>
</html>