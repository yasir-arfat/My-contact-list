
<?php 
session_start();
?>
<head>
<?php include_once './header.php'; ?>
<style>
      <?php include '../css/bootstrap.css'; ?>
      <?php include '../css/styles.css'; ?>
   </style>   
</head>

<body>
  <center>
    <div id="reg">
        <br>
        <h3>New User Regester</h3><br>
        <br>
        <br>
        <form name="reg" action="./action.php" method="post">
            <label for="fname">User Name :</label>
            <input type="text"  name="user" value="" placeholder="Enter user name"  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)"required><br><br>
            <label for="fname">Email :</label>
            <input type="email"  name="email" value=""placeholder="Enter email"required><br><br>
            <label for="lname">Password:</label>
            <input type="password"  name="pass" value=""placeholder="Enter password" minlength="3" required style="width:180px;"><br><br>
           <input type="hidden"name="reg">
            <input type="submit" value="Submit" class="btn btn-primary " >
        </form>
        <br>
        <br>
    <div>
    <?php 
    if(isset($_SESSION['message'])){
    echo $_SESSION['message']; 
    unset($_SESSION['message']); 
    }
    ?><br>
<a href="../index.php"style="color:black">login page</a>
    </div>
    </div>
       <br>
        <br>
    <?php include_once './footer.php'; ?>

</body>

</html>
