<?php
session_start();
if(!isset($_SESSION['uid'])){
    header("Location: ../index.php", true, 301);
    exit();
}
include'../php/conn.php';
?>

<html >

<head>

   
    <style>
      <?php include '../css/bootstrap.css'; ?>
      <?php include '../css/styles.css'; ?>
   </style>
    <?php include_once '../php/header.php'; ?>
    <script src="../js/jquery.js"></script> 
  
</head>

<body >


<div class="container-xl-12" >
<div class="row">
<div id="listbar"class="col-xl-3" >
    <div id="contbar">
        <center>
            <div class=" topnav" id="sr">
            <button id='selectall'>Select All</button>
                <input id="ser1" type="search" placeholder="Search.."></input>
                <button id='find' class="btn btn-primary">find</button>
            </div>
            
            <div id=contable>
          <?php
       
          if(isset($_SESSION['result'])){
          $result=$_SESSION['result'];
          echo "
          <table  border='1' id= 'contable'>
          <thead>
          <tr>
          <th>-</th>
          <th>id</th>
          <th>names</th>
          </tr> 
          </thead>
          ";
          foreach ($result as $row) {
          echo "<tbody>";   
          echo "<tr>";
          echo "<td><input type='checkbox'></td>";
          echo "<td>" .$row[0] . "</td>";
          echo "<td>" .$row[1] . "</td>";
          echo "</tr>";
          }
          echo "</tbody>";
          echo "</table>";
         }
         

          ?>
 
</center>
    </div><br>
    <button type="button" class="btn btn-success" id="addnowcont">New contact</button>
        <button type="button" class="btn btn-secndory" id="updatecont">Update contact</button>
        <button type="button" class="btn btn-dark"id="movecon">move contacts</button><br><br>
        <button type="button" class="btn btn-danger"id="delcon">Delete contacts</button>
        <button type="button" class="btn btn-primary" id="expo">Export List</button>
    </div>
   

    <!-- end list pan -->
    <div class="col-xl-6">
    <container class="centop">

        <div id="cen1" style="display: inline-block;">
            <center>
                <div id="img" style="height:100px;width:100px;
                background-image: url('../images/Person.jpg');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                border-radius: 30px;
                ">
                </div>
         
            </center>
            <label>Name</label><input type="text"id="name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required></input><br><br>
            <label>Phone</label><input type="number"id="phone"  maxlength="13"></input><br><br>
            <label>Email</label><input type="email"id="conemail"></input><br><br>
            <label>Gender</label><input type="text"id="gender"></input><br><br>
            <label>Date of Brith</label><input type="date"id="dob"></input><br><br>
            <label>Address</label><input type="text"id="address"></input><br><br>
        </div>

        <div id="cen2" style="display: inline-block;">
            <label>Company</label><input type="text"id="company"></input><br><br>
            <label>FaceBook</label><input type="url"id="fb"></input><br><br>
            <label>instagram</label><input type="url"id="insta"></input><br><br>
            <label>Linkedin</label><input type="url"id="lnk"></input><br><br>
            <label>Extra</label><input type="text"id="extra"></input><br><br>
            <div style="border:solid black 1px">
                <form method="POST" 
              action="../php/uploadimg.php" 
              enctype="multipart/form-data">
              <p>Upload image<p>
                <input type="file" 
                   name="uploadfile" 
                   accept=".gif,.jpeg,.jpg,.png"
                value="" />
  
                    <div>
                        <button type="submit"
                                name="upload">
                          UPLOAD
                        </button>
                    </div>
            </form>
                </div>
        </div>

    </container>
    <br>
    </div>
    
<div class="col-xl-2">
    <div style="color:black;font-size: 20px;">
        <h5><?php echo $_SESSION['log']; ?></h5>
        <?php
        $qury="SELECT type,list FROM users WHERE id=$_SESSION[uid]";
        $result = mysqli_query($conn, $qury);
        while($row = mysqli_fetch_array($result)) { 
         
         echo 'you are useing '.'"'.$row['type'].'"'.'<br>'; 
         echo 'you have lists '.'"'.$row['list'].'"'.'<br>'; 
         
        }
        if(isset($_SESSION['currentlist'])){
         echo 'active list    '.'"'.$_SESSION['currentlist'].'"'.'<br>';   
         }
        if(isset($_SESSION['category'])){
            echo 'active category    '.'"'.$_SESSION['category'].'"';   
            }
        ?>  <br>
         <br>

       
        <button type="button" class="btn btn-primary"id='changaccount'>change account type</button>
        <button type="button" class="btn btn-dark"id='logout'>logout</button><br>
        <hr>
      
    </div>
    <br>  

    </div>
    </div>
    </div>


<br>
<div >
 <center>
   
    <div style=background-color:rgba(0,0,0,0.5);padding:5px >
    
   
       
        
        <form action="./import.php" method="POST" enctype="multipart/form-data">
       
        Import List:<input type='file' accept=".xls,.xlsx,.csv"name='file'/>
        <input type='submit' name='submit'value='Import'/>
    
    
        </form>
   
    </div>
        
    <div class="col-xl-3" >

    <div style=" display: inline-block;overflow-y: scroll;height:200px; width:100%">
    <h3>My lists</h3>
        <?php
        $qury= "select tablename from lnk where userid= $_SESSION[uid] ";
        $result = mysqli_query($conn, $qury);   

        echo "
        <table  border='1' id='listtable'>
        <thead>
        <tr>
        <th></th>
        </tr> 
        </thead>
        ";
        while($row = mysqli_fetch_array($result)) {
            echo "<tbody>";   
        echo "<tr>";
  
        echo "<td>" .$row[0] . "</td>";
        echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        ?>  

     </div>
      <div style="display: inline-block;">
        <input id="listname" placeholder="Enter list name"></input><br><br>
        <button id="nl" class="btn btn-success">new list</button>
        <button id="dl" class="btn btn-danger">delete list</button>
    </div>
    </div>
    
    <div class="col-xl-3">
    <div style=' overflow-y: scroll;display: inline-block;height:200px;width:100%'>
     <h3>Categories<h3>
        <?php
        $qury= "select category from category where userid= $_SESSION[uid] ";
        $result = mysqli_query($conn, $qury);   

        echo "
        <table  border='1' id='catetable'>
        <thead>
        <tr>
        <th> </th>
        </tr> 
        </thead>
        ";
        while($row = mysqli_fetch_array($result)) {
            echo "<tbody>";   
        echo "<tr>";
  
        echo "<td>" .$row[0] . "</td>";
        echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        ?>  

    </div>
    <div style='display: inline-block;'>
        <input id="catname" placeholder="Enter category name"></input><br><br>
        <button id="newcate" class="btn btn-success">new category</button>
        <button id="delcate" class="btn btn-danger">delete category</button>
         </div>
         </div>
  
</div><br>
   
  
<?php include_once './footer.php'; ?>
<script src="../js/main.js"></script>

</body>
</html>
