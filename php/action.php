<?php
session_start();
include'./conn.php';

/////////////////////////////////////////////regester new user
   
   if(isset($_POST['reg'])){
    $user=$_POST["user"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
       
    $qury="SELECT email FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $qury);
    if(mysqli_num_rows($result) > 0){$_SESSION['message'] ="you are already regester";}
    else{
       $qury = "INSERT INTO users ( name, email, pass) VALUES ( '$user', '$email', '$pass')";
       if(mysqli_query($conn, $qury)){
        $_SESSION['message'] = "Account created successfully.";
       
       } else{
        $_SESSION['message'] = "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

       }
      }

         header("Location: ./reg.php");
         exit();
  }

////////////////////////////////////////////login
 if(isset($_POST['log'])){
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    
    $qury="SELECT * FROM users WHERE email='$email'&& pass='$pass'";
    $result = mysqli_query($conn, $qury);

    if(mysqli_num_rows($result) == 1){
      while($row = mysqli_fetch_array($result)) {
     
        $_SESSION['log'] =  $row['name'];
        $_SESSION['type'] =  $row['type'];
        $_SESSION['list'] =  $row['list'];
        
        $_SESSION['uid'] =  $row['id'];
       
      }
    
        header("Location: ./list.php");
        exit();
      
    }

    else{
     $_SESSION['message'] ="This email passward not match or you are not regestered";
      header("Location: ../index.php");
      exit();
   }
 }
 ///////////////////////////////////////////logout
 if(isset($_POST['logout'])){
      session_unset ( );
      header("Location: /index.php");
      exit();

 }
 
////////////////////////////////////////////// new list
if(isset($_POST['nl'])){
if (($_SESSION['type'] == 'Free Account') && ($_SESSION['list'] == '1'))
 {echo('free acount only one list');
}else{
  $listname= mysqli_real_escape_string($conn,$_POST["listname"]);
  $qury = "CREATE TABLE `$listname`
  (
  id int NOT NULL AUTO_INCREMENT,
  img varchar(255),
  name varchar(255),
  phone varchar(255),
  email varchar(255),
  gender varchar(255),
  dob varchar(255),
  address varchar(255),
  company varchar(255),
  fb varchar(255),
  insta varchar(255),
  linkd varchar(255),
  extra varchar(255),
  category varchar(255),
  PRIMARY KEY (id)
  
  )";
  
  if (mysqli_query($conn, $qury)) {
    $qury="UPDATE users SET list =  list + 1  WHERE id = $_SESSION[uid];
   
 INSERT INTO `lnk` (`userid`, `tablename`) VALUES ($_SESSION[uid], '$_POST[listname]')";
    mysqli_multi_query($conn, $qury);
   
    echo "List $listname created successfully";
    $_SESSION['currentlist']=$listname;
  } 
   else {
    echo "Error creating List: " . mysqli_error($conn);
    }
    $_POST=[''];
  }
}
/////////////////////////// delete list
if(isset($_POST['dl'])){
  $listname= mysqli_real_escape_string($conn,$_POST["listname"]);
  $sql = "
  DROP TABLE `$listname` ;
  UPDATE users SET list =  list - 1  WHERE id = $_SESSION[uid] ;
  delete from lnk where tablename = '$listname'
  
  ";
  if(mysqli_multi_query($conn, $sql)) {
    unset($_SESSION['currentlist']);
    unset($_SESSION['result']);
     echo "list is deleted successfully";  
  } else {  
    echo "Error list not deleted: " . mysqli_error($conn);
  }
}
//////////////////////////////////////////////add now contact
if(isset($_POST['addnowcont'])){
 $tbl= $_SESSION['currentlist'];
 
$qury="select * from $tbl";
$result = mysqli_query($conn, $qury);
 $rowcount=mysqli_num_rows($result);
 
   if($_SESSION['type'] == 'Free Account'  && $rowcount==20){
    
       echo ('free account allowed only 20 contacts');
   }
   else{
     if($_POST['conname']=='' || !(isset($_SESSION['category']))){echo 'plese enter contact name and chouse any category';}
     else{ 
     $qury="INSERT INTO $tbl(img,name, phone, email,gender,dob,address,company,fb,insta,linkd,extra,category)
     VALUES (
      '../images/Person.jpg',
       '$_POST[conname]',
       '$_POST[phone]',
       '$_POST[email]',
       '$_POST[gender]',
       '$_POST[dob]',
       '$_POST[address]',
       '$_POST[company]',
       '$_POST[fb]',
       '$_POST[insta]',
       '$_POST[lnk]',
       '$_POST[extra]',
       '$_SESSION[category]'
        )";
    
       if(mysqli_query($conn, $qury)) {  
         echo "contact added successfully";  
       }
       else {  
        echo " contact not added: " . mysqli_error($conn);
       }
     }
           
   }
}
///////////////////////////////////////////update contact
if(isset($_POST['updatecont'])){
  $tbl= $_SESSION['currentlist'];

 $qury="UPDATE $tbl SET 

  name = '$_POST[conname]', 
  phone =  '$_POST[phone]',
  email =  '$_POST[email]',
  gender = '$_POST[gender]',
  dob = '$_POST[dob]',
  address = '$_POST[address]',
  company = '$_POST[company]',
  fb = '$_POST[fb]',
  insta = '$_POST[insta]',
  linkd = '$_POST[lnk]',
  extra = '$_POST[extra]',
  category = '$_SESSION[category]' WHERE id = '$_SESSION[conid]'";
 
  if(mysqli_query($conn, $qury)) {  
    echo "contact update successfully";  
  }
  else {  
   echo " ERROR: " . mysqli_error($conn);
  }

}
/////////////////////////////////////////////active list

if(isset($_POST['listselect'])){
 $_SESSION['currentlist']=$_POST['listname'];
 
 $listname=$_SESSION['currentlist'];
 $qury= "select id,name from `$listname` ";
 $result = mysqli_query($conn, $qury);
 $rows = array();
    while($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
 $_SESSION['result']=$rows;

 
}
////////////////////////////////////////////////active category
if(isset($_POST['cateselect'])){
  $_SESSION['category']=$_POST['catename'];

  $catename=$_POST['catename'];
  $listname=$_SESSION['currentlist'];
  $qury= "select id,name from `$listname` WHERE `category`='$catename'";
  $result = mysqli_query($conn, $qury);
  $rows = array();
     while($row = mysqli_fetch_array($result)) {
         $rows[] = $row;
     }
  $_SESSION['result']=$rows;
 
}
////////////////////////////////////////////////////////////find
if(isset($_POST['find'])){
  $str=$_POST['str'];
  
  $listname=$_SESSION['currentlist'];

  $qury= "select id,name from `$listname` WHERE `name` LIKE '%$str%'  ";
  $result = mysqli_query($conn, $qury);
  $rows = array();
     while($row = mysqli_fetch_array($result)) {
         $rows[] = $row;
     }
  $_SESSION['result']=$rows;
 
}
////////////////////////////////////////////////////////////con select
 if ( isset( $_POST['conselect'] ) ) {
  $listname=$_SESSION['currentlist']; 
  $_SESSION['conid']=$_POST['conid'];
  $qury= "select * from `$listname` WHERE `id`=' $_POST[conid]'";
  $result = mysqli_query($conn, $qury);
  
  $rows = array();
     while($row = mysqli_fetch_array($result)) {
         $rows[] = $row;
     }
    
     $result=(json_encode($rows));
    
     echo($result);
 }
///////////////////////////////////////////////////////////delet contact
 if ( isset( $_POST['delcon'] ) ) {
  $data = json_decode(stripslashes($_POST['dt']));
  $tbl= $_SESSION['currentlist'];
 foreach($data as $d){
  $qury = "DELETE FROM $tbl WHERE id=".(int)"$d";
  mysqli_query($conn, $qury);
  
 }
echo("Successfuly deleted");


} 
////////////////////////////////////////////////////move contacts
if ( isset( $_POST['movecon'] ) ) {
  $data = json_decode(stripslashes($_POST['dt']));
  $tbl= $_SESSION['currentlist'];
  $secondtable=$_POST['secondtable'];
  foreach($data as $d){
  $qury = "  INSERT INTO $secondtable SELECT * FROM $tbl WHERE id=".(int)"$d";
  mysqli_query($conn, $qury);
 }

 foreach($data as $d){
  $qury = "DELETE FROM $tbl WHERE id=".(int)"$d";
  mysqli_query($conn, $qury);
  
 }
echo("Successfuly moved");
} 
/////////////////////////////////////////////////change account type
if ( isset( $_POST['changaccount'] ) ) {
if( $_SESSION['type'] == 'Free Account'){
  $_SESSION['type'] = 'Premium Account';
  $qury="UPDATE users SET type = 'Premium Account' WHERE id = $_SESSION[uid]";
mysqli_query($conn, $qury);
}
else{
   $_SESSION['type']='Free Account';
  $qury="UPDATE users SET type = 'Free Account' WHERE id = $_SESSION[uid]";
mysqli_query($conn, $qury);
}
echo("account changed Successfuly");


}
/////////////////////////////////////////////new category


if ( isset( $_POST['newcate'] ) ) {

  if($_SESSION['type'] == 'Free Account' ){
    $query="SELECT category from users WHERE id = $_SESSION[uid]";
    $result=mysqli_query($conn, $query);
    $rowData = mysqli_fetch_assoc($result);
    $t= $rowData['category'];

    if($t == 3){
      echo('free acount allowed only 3 categories');
    }
    else{
      $qury="UPDATE users SET category =  category + 1  WHERE id = $_SESSION[uid];
    
      INSERT INTO `category` (`userid`, `category`) VALUES ('$_SESSION[uid]', '$_POST[catename]')";
     
      if(mysqli_multi_query($conn, $qury)){
        $_SESSION['category']=$_POST['catename'];
        echo('category successfuly created');
      }
      else{
        echo "):";
      }
    }
 }
  else{
    $qury="UPDATE users SET category =  category + 1  WHERE id = $_SESSION[uid];
    
    INSERT INTO `category` (`userid`, `category`) VALUES ('$_SESSION[uid]', '$_POST[catename]')";
   
    if(mysqli_multi_query($conn, $qury)){
    $_SESSION['category']=$_POST['catename'];
    echo('category successfuly created');
    }
    else{
      echo "):";
    }

  }
 


}
/////////////////////////////////////////del category
if ( isset( $_POST['delcate'] ) ) {

$qury="UPDATE users SET category =  category - 1  WHERE id = $_SESSION[uid]; 

DELETE FROM `category` WHERE `userid` = '$_SESSION[uid]' && `category` = '$_POST[catename]'";

  if(mysqli_multi_query($conn, $qury)){
    $_SESSION['category'] ="";
    echo('category deleted ');
  }
  else{
     echo "):";
  }
}
?>
