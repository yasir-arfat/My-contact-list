<?php
session_start();
include'./conn.php';
//////////////////////////////////////////
if(isset($_POST['expo'])){
    $tbl= $_SESSION['currentlist'];
    $qury="SELECT * FROM $tbl";
    $result =mysqli_query($conn, $qury);

$list = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $list[] = $row;
    }
}


$output = fopen('../'. $tbl . '.csv', 'w');
fputcsv($output, array('id','img','name', 'phone', 'email','gender','dob','address','company','fb','insta','linkd','extra','category'));

if (count($list) > 0) {
    foreach ($list as $row) {
        fputcsv($output, $row);
    }
}
fclose($output);
echo 'one list exported' ;
}
?>