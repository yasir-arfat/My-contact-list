<?php
session_start();
include'./conn.php';
//////////////////////////////////////////

if (isset($_POST["submit"])) {
  
if (isset($_SESSION['currentlist'])){
    $tbl= $_SESSION['currentlist'];

    $fh = fopen($_FILES['file']['tmp_name'], 'r');
    $flag = true;
    while(($data=fgetcsv($fh, 0, ",")) !== FALSE) {
        if($flag) { $flag = false; continue; }//skiping 1st row
        $img = mysqli_real_escape_string($conn,$data[1]) ;
        $name = mysqli_real_escape_string($conn,$data[2]) ;
        $phone = mysqli_real_escape_string($conn,$data[3]) ;
        $email = mysqli_real_escape_string($conn,$data[4]) ;
        $gender = mysqli_real_escape_string($conn,$data[5]) ;
        $dob = mysqli_real_escape_string($conn,$data[6]) ;
        $address = mysqli_real_escape_string($conn,$data[7]) ;
        $company = mysqli_real_escape_string($conn,$data[8]) ;
        $fb = mysqli_real_escape_string($conn,$data[9]) ;
        $insta = mysqli_real_escape_string($conn,$data[10]) ;
        $linkd = mysqli_real_escape_string($conn,$data[11]) ;
        $extra = mysqli_real_escape_string($conn,$data[12]) ;
        $category = mysqli_real_escape_string($conn,$data[13]) ;
        $qury="INSERT INTO $tbl(img,name,phone,email,gender,dob,address,company,fb,insta,linkd,extra,category)
        VALUES (
        '$img',
        '$name',
        '$phone',
        '$email',
        '$gender',
        '$dob',
        '$address',
        '$company',
        '$fb',              
        '$insta',
        '$linkd',
        '$extra',
        '$category' 
        )"; 
        
        mysqli_query($conn, $qury);
    }
    fclose($fh); 
    
    header("Location: ./list.php"); 
    die();     
}
else{echo('select current list');}
}
?>