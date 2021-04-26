<?php
session_start();
include'./conn.php';
error_reporting(0);

?>

<?php
  $msg = "";
  
  // upload button is clicked ...
  if (isset($_POST['upload'])) {
    $tbl= $_SESSION['currentlist'];
    $conid=$_SESSION['conid'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "../contactimages/".$filename;
         
        // Get all the submitted data from the form
        
        $sql = "UPDATE $tbl SET `img` =  '$filename'  WHERE `id` = '$_SESSION[conid]'";
  
        // Execute query
        mysqli_query($conn, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            echo  ("Image uploaded successfully");
        }else{
            echo  ("Failed to upload image");
      }
  }
  $result = mysqli_query($db, "SELECT * FROM image");

////////////// if file esist
if (file_exists($path_to_file)) {
	echo 'The file ' . $path_to_file . ' exists';
} else {
	echo 'The file ' . $path_to_file . ' does not exist';
}
/////////////////////

?>