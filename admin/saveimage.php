
 
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include("db.php");
       $name = $_SESSION['name'];

    function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }
	 
	   function GetImageExtensiont($imagetypet)
     {
       if(empty($imagetypet)) return false;
       switch($imagetypet)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     } 
	 
if (!empty($_FILES["uploadedimage"]["name"])) {

	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time()."dfd".$ext;
	$target_path = "images/".$imagename;
	

if(move_uploaded_file($temp_name, $target_path)) {

 	$query_upload="UPDATE events SET imaget='$target_path' where name='$name'";
	mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());  

}else{

   exit("Error While uploading image on the server");
} 

}

if (!empty($_FILES["uploadedimaget"])) {

  $file_namet=$_FILES["uploadedimaget"];
  $temp_namet=$_FILES["uploadedimaget"]["tmp_name"];
  $imgtypet=$_FILES["uploadedimaget"]["type"];
  $extt= GetImageExtensiont($imgtypet);
  $imagenamet=date("d-m-Y")."-".time().$extt;
  $target_patht = "images/".$imagenamet;
  

if(move_uploaded_file($temp_namet, $target_patht)) {

  $query_upload="UPDATE events SET imagem='$target_patht' where name='$name'";
  mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());  
header("location:edithome.php");
$_SESSION['editevent']=$name;
}else{

   exit("Error While uploading image on the server");
} 

}

?>;

