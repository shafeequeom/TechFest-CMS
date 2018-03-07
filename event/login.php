<!DOCTYPE html>
<?php

include('db.php');
$clgquery=mysql_query("SELECT name FROM college");

?>
  
<html lang="en">
<head>
  <title>Advay'16 Events</title>
  <meta charset="utf-8">
  <meta name="author" content="tist">
  <meta name="description" content="Advay 2016"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" href="css/normalize.css">


        <script type="text/javascript" src="js/jquery.min.js"></script>

        <script src="js/bootstrap-modal.js"></script>   


        <script src="js/modernizr.custom.js"></script>

    
        <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
<script>
       function show_select()
           {
          var college = document.getElementById("college");
          var dept = document.getElementById("dept");

         var desired_box = college.options[college.selectedIndex].value;
          if(desired_box == "Toc H Institute of Science and Technology") {
              dept.style.display = '';
          } else {
                dept.style.display = 'none';
          }
      }
      
      
    </script>
</head>

<body onload='show_select()'>

  <header>
    <div class="logo">
    </div><!-- end logo -->

    <div id="menu_icon"></div>
    <nav>
      <ul name="mode">
        <li><a href="index.php" class="selected">Home</a></li>
        <li><a href="index.php?category=Technical">Technical</a></li>
        <li><a href="index.php?category=Cultural">Cultural</a></li>
        <li><a href="index.php?category=Sports">Sports</a></li>
        <li><a href="index.php?category=Fun">Fun</a></li>
<?php
if(isset($_SESSION['email'])){ 
        echo  '<li><a href="myevent.php">My Events</a></li>';
      echo  '<li><a class="loginn" href="logout.php">Logout</a></li>';
}
      else{
              echo  '<li><a class="loginn" href="login.php">Login</a></li>';}
?>
      </ul>
    </nav><!-- end navigation menu -->

    <div class="footer clearfix">
      <ul class="social clearfix">
        <li><a href="#" class="fb" data-title="Facebook"></a></li>
        <li><a href="#" class="google" data-title="Google +"></a></li>
        <li><a href="#" class="behance" data-title="Behance"></a></li>
        <!--<li><a href="#" class="twitter" data-title="Twitter"></a></li>
        <li><a href="#" class="dribble" data-title="Dribble"></a></li>-->
        <li><a href="#" class="rss" data-title="RSS"></a></li>
      </ul><!-- end social -->

      <div class="rights">
        <p>Copyright © 2016 ADVAY<a href=""></a></p>
      </div><!-- end rights -->
    </div ><!-- end footer -->
  </header><!-- end header -->

  <section class="main clearfix">
			<div class="content">

   <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Register</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   

          <h1>Register for Free</h1>
          
          <form action="reg.php" method="post">
          

            <div class="field-wrap">
              <label>
			Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="name" />
            </div>
                                        <a href="newcollege.php">Register College</a> 

            <div class="field-wrap">
            
              <select name="college" id="college"  onchange='show_select()'>
         <?php 
         while ($row = mysql_fetch_array($clgquery)) {
           if($row[0]=="Toc H Institute of Science and Technology"){
              echo '<option value="'.$row[0].'" selected>'.$row[0].'</option>';
           
           }
           else {
                echo '<option value="'.$row[0].'">'.$row[0].'</option>';}
         }
          ?>
                  </select>
            </div>
             <div class="field-wrap" id="dept" style='display:none'>
                 <label for="department">Department</label>
                 <select name="department">
                     <option value="" ></option>
                     <option value="CSE" >CSE</option>
                     <option value="IT" >IT</option>
                     <option value="Mech" >Mech</option>
                     <option value="Civil" >Civil</option>
                     <option value="EEE" >EEE</option>
                     <option value="FS" >FS</option>
                     <option value="ECE" >ECE</option>
                     <option value="BCA" >BCA</option>
                     <option value="MCA" >MCA</option>
                     <option value="MBA" >MBA</option>
                  </select>
                 </div>
            <div class="field-wrap">
              <label>
              Contact<span class="req">*</span>
              </label>
              <input type="number"required autocomplete="off" name="contact" />
            </div>

            <div class="field-wrap">
              <label>
              Unique Reg Id<span class="req">*</span>
              </label>
              <input type="number"required autocomplete="off" name="usn" />
            </div>
          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="regemail" />
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="password" />
          </div>
          
          <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="auth.php" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req" >*</span>
            </label>
            <input type="email"required autocomplete="off" name="email" />
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="password" />
          </div>
          

          
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div>
			</div><!-- end content -->
  
	</section>

            <div id="regform" class="modal hide fade in" style="display: none; z-index:20000; ">  
               <div class="modal-header">  
                   <a class="close" data-dismiss="modal">×</a>  
                   <h3>Register College</h3>  
               </div>  
               <form action="newcollege.php" method="post">
               <div class="modal-body">  
                  
                                   <div class="form-group">
                            <label for="clgname">College Name</label>
                            <input type="text" class="form-control" id="clgname" placeholder="College Name" name="collegename">
                          </div>
 
        </div>  
        <div class="modal-footer">  
                    <button type="submit" class="btn btn-success">Submit </button>
          <a href="#" class="btn" data-dismiss="modal">Close</a>  
        </div>  
                </form> 
             </div><!-- end main -->
	    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>
	
</body>
</html>





