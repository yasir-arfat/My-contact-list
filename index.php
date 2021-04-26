<?php
session_start();
?>
<head>
   
    <?php include_once './php/header.php'; ?>
    <style>
       <?php include './css/bootstrap.css'; ?>
      <?php include './css/styles.css'; ?>
   </style>
</head>

<body >
  <center>
    <div id="login">
        <form action="./php/action.php" method="post">
            <br>
            <h2>Login</h2>
            <br>
            <label>Email :</label>
            <input type="email"name="email"  value=""placeholder="Enter email"required ><br><br>
            <label>Password:</label>
            <input type="password" name="pass"value="" placeholder="Enter password" minlength="3" required style="width:180px;"><br><br>
            <input type="hidden"name="log">
            <input type="submit" value="login"class="btn btn-primary ">
            </form>
            <br>
            <br>
            <div style="color:gray;border:solid gray 1px">
            a@gmail.com<br>
            password = 123
            </div>
            <br>
        </form>
        <?php 
    
    if(isset($_SESSION['message'])){
    echo $_SESSION['message']; 
    unset($_SESSION['message']); 
    }
    ?><br>
<a href="./php/reg.php"style="color:black">Not Regsetered ?</a>
    </div>
    
    <br>
    <br>
    <br>
    <br>
    
<?php include_once './php/footer.php'; ?>

</body>
</html>
