<?php
/*
@author: Shahrukh Khan
@website: http://www.thesoftwareguy.in
@facebook fanpage: https://www.facebook.com/Thesoftwareguy7
*/
require("libs/config.php");

$tmpName = "big-logo-fb-page2.jpg";

$sql = "INSERT INTO `tbl_demo5` ( `id` ,`files` ) VALUES ( NULL , '$tmpName' )";


if (isset($_POST["s"])) {
	
	$img_file = $_FILES["img_file"]["name"];
	$folderName = "images/";
	$validExt = array("jpg", "png", "jpeg", "bmp", "gif");
	
	if ($img_file == "") {
		$msg = errorMessage( "Attach an image");
	} elseif ($_FILES["img_file"]["size"] <= 0 ) {
		$msg = errorMessage( "Image is not proper.");
	} else {
		$ext = strtolower(end(explode(".", $img_file)));
		
		if ( !in_array($ext, $validExt) )  {
			$msg = errorMessage( "Not a valid image file");
		} else {
			$filePath = $folderName. rand(10000, 990000). '_'. time().'.'.$ext;
			
			if ( move_uploaded_file( $_FILES["img_file"]["tmp_name"], $filePath)) {
				$sql = "INSERT INTO tbl_demo5 VALUES (NULL, '".prepare_input($filePath) ."')";
				
				$msg = ( mysql_query($sql))  ? successMessage("Uploaded and saved to database.") : errorMessage( "Problem in saving to database");
				
			} else {
				$msg = errorMessage( "Problem in uploading file");
			}
			
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="http://www.thesoftwareguy.in/favicon.ico" type="image/x-icon" />
<!--iOS/android/handheld specific -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="description" content="Simple Image upload php mysql">
<meta name="keywords" content="image upload php mysql">
<meta name="author" content="Shahrukh Khan">
<title>Upload and Save image with php and mysql - thesoftwareguy</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<style>
.submit_button {
	width:95px;
	height:25px;
	background: #3d3d3d;
	color:#FFF;
	font-size:12px;
	cursor:pointer;
	margin-bottom:10px;
	display:block;
	border:none;
}
</style>
<script src="jquery-1.9.0.min.js"></script>
<script>
function validateImage() {
	var img = $("#img_file").val();
	
	var exts = ['jpg','jpeg','png','gif', 'bmp'];
	// split file name at dot
	var get_ext = img.split('.');
	// reverse name to check extension
	get_ext = get_ext.reverse();


	if (img.length > 0 ) {
		if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
		  return true;
		} else {
			 alert("Upload only jpg, jpeg, png, gif, bmp images");
			return false;
		}			
	} else {
		alert("please upload an image");
		return false;
	}
	return false;
}
</script>
</head>
<body>
<div id="container">
  <div id="body">
    <div class="mainTitle" >Upload and Save image with php and mysql</div>
    <div class="height20"></div>
    <article> <?php echo $msg; ?>
      <div class="height20"></div>
      <form method="post" action="" name="f" enctype="multipart/form-data" onSubmit="return validateImage();" >
        <table id="tableForm" style="width:50%; margin:0 auto;border:1px solid #000;" cellpadding="5" >
          <tr>
            <td valign="top">Upload Image File: </td>
            <td valign="top"><input type="file" name="img_file" id="img_file" />
            <br>
            Only jpg, jpeg, png, gif, bmp files allowed
            </td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" class="submit_button" value="Submit" name="s">
            </td>
          </tr>
        </table>
      </form>
        <div class="height20"></div>
        <table class="bordered" style="width:50%; margin:0 auto;">
        <tr>
        	<th width="20%">ID</th>
            <th>IMAGE</th>
        </tr>
		<?php
        $sql = "SELECT * FROM tbl_demo5 WHERE 1";
        $query = mysql_query($sql);
        while($rs = mysql_fetch_object($query)){ 
        ?>
        <tr>
        	<td align="center" ><?php echo stripslashes($rs->id); ?></td>
            <td align="center"><img src="<?php echo stripslashes($rs->image_url); ?>" alt="" width="100" height="100"> </td>   
        </tr>
        <?php 
		}
		?>
        </table>
    </article>
    <div class="height10"></div>
    <footer>
      <div class="copyright"> &copy; 2013 <a href="http://www.thesoftwareguy.in" target="_blank">thesoftwareguy</a>. All rights reserved </div>
      <div class="footerlogo"><a href="http://www.thesoftwareguy.in" target="_blank"><img src="http://www.thesoftwareguy.in/thesoftwareguy-logo-small.png" width="200" height="47" alt="thesoftwareguy logo" /></a> </div>
    </footer>
  </div>
</div>
</body>
</html>
