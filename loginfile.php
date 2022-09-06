<?php
  include('uheader.php');
  session_start();
  if(isset($_SESSION['adminuser']))
  {
    header('Location: \kr/admin/');
  }


  if(isset($_SESSION['voterlog']))
  {
    header('Location: \kr/dashboard.php');
  }
 ?>
<div class="col-sm-8 mt-3 bg-light outt">
        <div class="mx-5 mt-4">


<style type="text/css">
  .outt{
    min-height: 32rem;
    min-height: 35rem;
  }
  .nnn{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  .wrapper{
    background-color: #E3E3E3;
    overflow: hidden;
    margin-left: 15%;
    max-height: 500px;
    max-width: 390px;
    padding: 20px;
    border-radius: 5px;
    border: 4px solid #D6D5D5 ;
    box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
  }
  .wrapper .title-text{
    display: flex;
    width: 200%;
  }
  .wrapper .title{
    width: 50%;
    font-size: 30px;
    font-weight: 600;
    text-align: center;
    transition: all 0.6s cubic-bezier(0.68,-0.55,0.265);
  }
  .wrapper .slide-controls{
    position: relative;
    display: flex;
    height: 50px;
    width: 100%;
    overflow: hidden;
    margin: 30px 0 10px 0;
    justify-content: space-between;
    background-color: #FFC5BB;
    border: 1px groove yellow;
    border-radius: 5px;
  }
  .slide-controls .slide{
    height: 100%;
    width: 100%;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    text-align: center;
    line-height: 48px;
    cursor: pointer;
    z-index: 1;
  }
  .slide-controls .slider-tab{
    position: absolute;
    height: 100%;
    width: 50%;
    left: 0;
    z-index: 0;
    border-radius: 5px;
    background: red;
  }
  input[type="radio"]{
    display: none;
  }
  #signup:checked ~ .slider-tab{
    left: 50%;
  }
  #signup:checked ~ label.signup{
    color: #fff;
    cursor: default;
    user-select: none;
  }
  #signup:checked ~ label.login{
    color: #000;
  }
  #login:checked ~ label.signup{
    color: #000;
  }
  #login:checked ~ label.login{
    cursor: default;
    user-select:;
  }
  .wrapper .form-container{
    width: 100%;
    overflow: hidden;
  }
  .form-container .form-inner{
    display: flex;
    width: 200%;
  }
  .form-container .form-inner form{
    width: 50%;
    transition: 0.0s;
  }
  .form-inner form .field{
    height: 50px;
    width: 100%;
    margin-top: 20px;
  }
  .form-inner form .field input{
    height: 80%;
    width: 100%;
    outline: none;
    padding-left: 15px;
    border-radius: 5px;
    border: 1px solid green;
    border-bottom-width: 1px;
    font-size: 17px;
  }
  form .butn{
    font-size: 18px;
    position: relative;
    overflow: hidden;
    border-radius: 20px;
  }
  form .butn .butn-layer{
    height: 100%;
    width: 300%;
    position: absolute;
    left: -100%;
    background: #32A54F;
  }
  form .butn:hover .butn-layer{
   background: -webkit-linear-gradient(green,red);
  }
  form .butn input[type="submit"]{
    height: 100%;
    width: 100%;
    position: relative;
    background: none;
    border: none;
    color: #fff;
    padding-left: 0;
    border-radius: 5px;
    font-size: 20px;
    font-weight: 500;
    cursor: pointer;
  }
  .anch{
    text-decoration: none;
    color: red;
  }
  .anch:hover{
    font-size: 14px;
    color: red;
    font-weight: bold;
  }
</style>




 <?php
 include('admin/dbconaction.php');
    if(isset($_POST['asubmit']))
      {
        $aemail=stripslashes($_POST['aemail']);
        $apass=stripslashes($_POST['apass']);
        $err="";
        if($aemail=="")
        {
            $err.="Email address is empty</br>";
        }
        if($apass=="")
        {
            $err.="password is empty</br>";
        }

        if($err=="")
          {
              $sql = "SELECT * FROM admin WHERE username= '".$aemail."' AND password='".$apass."'";
               $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0)
              {
                  
                  $_SESSION['adminuser'] = $aemail;
                  $currentDate = date('Y-m-d g:i:s');
                  $_SESSION['adminlogtime'] = $currentDate;
                  echo "<script>window.location = 'admin/';</script>";
                   
                  // header('Location:abc.php');
              }
              else
              {
                  ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertsms">
                           Invalied Username & Password
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


   if(isset($_POST['vsubmit']))
      {
        $vemail=$_POST['vemail'];
        $vpass=$_POST['vpassword'];
        $err="";
        if($vemail=="")
        {
            $err.="Email address is empty</br>";
        }
        if($vpass=="")
        {
            $err.="password is empty</br>";
        }

        if($err=="")
          {
              $sql = "SELECT * FROM voters WHERE email='".$vemail."' AND password= '".$vpass."' AND approv_status='Approved'";
               $resultts = mysqli_query($con,$sql);
            if(mysqli_num_rows($resultts)>0)
              {
                  
                  $_SESSION['voterlog'] = $vemail;
                  // $currentDate = date('Y-m-d g:i:s');
                  // $_SESSION['voterlogtime'] = $currentDate;
                  echo "<script>window.location = 'dashboard.php';</script>";
                   
                  // header('Location:abc.php');
              }
              else
              {
                  ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertsms">
                           Invalied Username & Password
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





      <script type="text/javascript">
        function timedMsg()
          {
            var t=setTimeout("document.getElementById('alertsms').style.display='none';",3000);
          } 
      </script>
      <script language="JavaScript" type="text/javascript">timedMsg()</script>






      <div class="wrapper nnn">
         <div class="title-text">
            <div class="title login">
               Voter Login
            </div>
            <div class="title signup">
               Admin Login
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Voter</label>
               <label for="signup" class="slide signup">Admin</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">


               <form action="" method="POST" class="login">
                    <div class="field">
                       <input type="text" name="vemail" placeholder="Email Address" required>
                    </div>
                    <div class="field">
                       <input type="password" name="vpassword" placeholder="Password" required>
                    </div>
                    <div class="pass-link">
                       <a class="anch" href="forgetvoterpp.php">Forgot password?</a>
                    </div>
                    <div class="field butn">
                       <div class="butn-layer"></div>
                       <input type="submit" value="Voter Login" name="vsubmit">
                    </div>
                    <div class="signup-link">
                       Not Registered?  <a class="anch" href="voter_register.php">Voter register</a>
                    </div>
               </form>



               <form action="" method="POST" class="signup">
                    <div class="field">
                       <input type="text" name="aemail" placeholder="Email Address" required>
                    </div>
                    <div class="field">
                       <input type="password" name="apass" placeholder="Password" >
                    </div>
                     <div class="pass-link">
                       <a class="anch" href="forgetadminpp.php">Forgot password?</a>
                    </div>
                    <div class="field butn">
                       <div class="butn-layer"></div>
                       <input type="submit" value="Admin Login" name="asubmit">
                    </div>
                    <div class="signup-link"> Candidate Register
                      <a class="anch" href="candidate_register.php"> Here..</a>
                    </div>
               </form>


            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
      </script>
   </body>
</html>

    <style>
.footer {
  font-size: 10px;
  position: fixed;
  left: 0;
  bottom: 0;
  height: 15px;
  width: 100%;
  color: black;
  text-align: center;
  padding: 0px;
}
</style>

<?php
  include('ufooter.php');
 ?>
