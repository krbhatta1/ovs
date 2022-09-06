<?php 
	include('homeheader.php');
	include('admin/dbconaction.php');
?>



			<div class="col-sm-6 mt-3 bg-light ">
				<div class="mx-5 mt-4" style="overflow-x:auto;">

					<?php
						 
						    if(isset($_POST['ppchange']))
						      {
						        $opp=$_POST['opp'];
						        $npp=$_POST['npp'];
						        $cpp=$_POST['cpp'];
						        $err="";

						        if($opp=="") 
						        {
						            $err.="Old Password Cann't be empty.</br>";
						        }
						        if($npp=="")
						        {
						            $err.="New Password Cann't be empty.</br>";
						        }
						        if($cpp=="")
						        {
						            $err.="Conform Password Cann't be empty.</br>";
						        }
						        if($npp!==$cpp)
						        {
						            $err.="New Password Not Matched.</br>";
						        }
						        if($npp==$opp)
						        {
						            $err.="New Password Should be Different from Old Password.</br>";
						        }

						        if($err=="")
						          {
						            $sql = "SELECT * FROM voters WHERE email= '".$_SESSION['voterlog']."' AND password='".$opp."'";
						               $result = mysqli_query($con,$sql);
						            if(mysqli_num_rows($result)>0)
						              {
						              	$query="UPDATE voters SET password='".$npp."' WHERE email= '".$_SESSION['voterlog']."' AND password='".$opp."'";
							            if(mysqli_query($con,$query))
							              {						                   
							                   ?>
							                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alertsms">
							                           Successfully Changed Password.
							                        <button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							                    </div>
							                  <?php
						             		}
						              }
						              else
						              {
						                  ?>
						                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertsms">
						                    	<style> .ff{ text-decoration: none; }</style>
						                           Incorrect Old Password.<a class="ff" href="forgetpp.php"> forget old Password</a>
						                        <button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						                    </div>
						                  <?php
						              }
						          }
						          else
						            {
						              ?>
						                  <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertsms">
						                           <?php
						                            echo $err;
						                           ?>
						                      <button type="button" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						                  </div>
						              <?php
						            }
						          }
					?>


					<p class="bg-dark text-white  text-center p-1">Change Password</p>
					<form action="" method="POST">
						<table class="table ">
							<tr>
								<th >Enter Old Password: </th>
								<th ><input type="text" name="opp" autocomplete="off"> </th>
							<tr>
								<th > Create New Password: </th>
								<th > <input type="text" name="npp" minlength="8" maxlength="20" autocomplete="off"> </th>
								
							</tr>
							<tr>
								<th >Conform New Password: </th>
								<th ><input type="text" name="cpp" minlength="8" maxlength="20" autocomplete="off"> </th>
							</tr>
							<tr>
								<th colspan="2" class="text-center "><button type="submit" name="ppchange" class="btn btn-lg btn-info">Change Password </button> </th>
							</tr>
						</table>
					</form>
				</div>
			</div>














<?php 
	include('ufooter.php');
?>