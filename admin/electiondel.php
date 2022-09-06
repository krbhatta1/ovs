


<?php 
  include('header.php');
?>
         
<?php
include('dbconaction.php');
       $eidd= $_GET['eidd'];
      if(isset($eidd))
      {
          $selecte = "select * from election WHERE auto_id='{$eidd}'";
          $result = mysqli_query($con,$selecte);
          if (mysqli_num_rows($result) > 0) 
            {
                $row = mysqli_fetch_assoc($result);
            }

          ?> <!-- Election Edit Model -->

              <div class="col-sm-7 mt-0 bg-light ">
                <div class="mx-5 mt-4" style="overflow-x:auto;">
                  <p class="bg-dark text-white  text-center p-1">Update Election</p>
                  <form action="" method="POST">
                    <table class="table ">
                      <tr>
                        <th >Election ID: </th>
                        <th ><input type="number" name="eid" value="<?php echo $row['election_id']; ?>"> </th>
                      <tr>
                        <th > Election Name: </th>
                        <th > <input type="text" name="elname" value="<?php echo $row['election_name']; ?>"> </th>                        
                      </tr>
                      <tr>
                        <th >Election Post: </th>
                        <th ><input type="text" name="epost" value="<?php echo $row['post']; ?>"> </th>
                      </tr>
                      <tr>
                        <th colspan="2" class="text-center ">
                          <button type="submit" name="upel" class="btn btn-sm btn-success">Update Election </button>
                          <a href="election.php"> <button type="button" class="btn btn-sm btn-danger">Cancle</button></a>
                        </th>
                      </tr>
                    </tbody>
                  </table>
                          
                  </form>
                  <?php
                          if(isset($_POST['upel']))
                            {
                              $eid=$_POST['eid'];
                              $en=$_POST['elname'];
                              $epost=$_POST['epost'];
                              $updatequery = "UPDATE  election SET election_id='".$eid."', election_name= '".$en."', post= '".$epost."' 
                              WHERE auto_id='".$eidd."'";

                              $result = mysqli_query($con,$updatequery);
                              if($result)
                              {
                                echo "<script>window.location='election.php'</script>";
                              } 
                              else
                              {
                                ?>
                                <script>
                                  alert("Election Cann't be Deplicate.");
                                </script>
                                <?php
                              }
                            }

                          ?>


                </div>
              </div>
          </div>
          </div>

        <?php
      }




      else
      {
          $ename= $_GET['ename'];
          if(!isset($ename))
            {
              header('Location:election.php');
            }
            $drope = "DELETE FROM election WHERE election_name='{$ename}'";
            $result = mysqli_query($con,$drope);
            if($result)
            {
            echo "<script>window.location='election.php';</script>";
            } 
            else
              {
                ?>
                <script>
                  alert("Voter Delete Failed");
                  window.location='election.php';
                </script>
                <?php
              }
      }
  ?>




  <?php 
  include('footer.php');
?>
