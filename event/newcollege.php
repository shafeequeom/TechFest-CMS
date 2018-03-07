<?php
include('db.php');


function clean_string($string) {
      $bad = array(";","<",">","$");
      return str_replace($bad,"",$string);
}
if (isset($_POST['collegename'])) {
	# code...

$name=$_POST['collegename'];
$name = clean_string($name);
$sql="INSERT INTO college(name) VALUES('$name')";
	mysql_query($sql);
	header('Location: login.php');
	}
?>
<html>
<head>
<style type="text/css">
	body{
		background-color: black;
	}
</style>
	                <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

</head>
<body>
            <div id="regform" class="modal">  
               <div class="modal-header">  
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
        </div>  
                </form> 
             </div>
             </body>
</html>