<?php 
include "sql-conn.php";
?>
<?php 
$error_message = "";$success_message = "";

// Register user
if(isset($_POST['btnsignup'])){
   $username = trim($_POST['username']);
   $name = trim($_POST['name']);
   $password = trim(md5($_POST['password']));
   $confirmpassword = trim(md5($_POST['confirmpassword']));

   $isValid = true;

   // Check fields are empty or not
   if($username == '' || $name == '' || $password == '' || $confirmpassword == ''){
     $isValid = false;
     $error_message = "Please fill all fields.";
   }

   // Check if confirm password matching or not
   if($isValid && ($password != $confirmpassword) ){
     $isValid = false;
     $error_message = "Passwords do not match!";
   }

   if($isValid){

     // Check if user already exists
     $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
     $stmt->bind_param("s", $username);
     $stmt->execute();
     $result = $stmt->get_result();
     $stmt->close();
     if($result->num_rows > 0){
       $isValid = false;
       $error_message = "username already exists.";
     }

   }

   // Insert records
   if($isValid){
     $insertSQL = "INSERT INTO users(username, name, password ) values(?,?,?)";
     $stmt = $conn->prepare($insertSQL);
     $stmt->bind_param("sss",$username,$name,$password);
     $stmt->execute();
     $stmt->close();

     $success_message = "Account created successfully.";
   }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>PCBLDR | Register</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  </head>
  <body>
    <div class='container'>
      <div class='row'>

        <div class='col-md-6' >

          <form method='post' action=''>

            <h1>SignUp</h1>
            <?php 
            // Display Error message
            if(!empty($error_message)){
            ?>
            <div class="alert alert-danger">
              <strong>Error!</strong> <?= $error_message ?>
            </div>

            <?php
            }
            ?>

            <?php 
            // Display Success message
            if(!empty($success_message)){
            ?>
            <div class="alert alert-success">
              <strong>Success!</strong> <?= $success_message ?>
            </div>

            <?php
            }
            ?>

            <div class="form-group">
              <label for="uname">UserName:</label>
              <input type="text" class="form-control" name="username" id="username" required maxlength="15">
            </div>
			<div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" id="name" required maxlength="80">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password" id="password" required maxlength="8">
            </div>
            <div class="form-group">
              <label for="pwd">Confirm Password:</label>
              <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" onkeyup='' required maxlength="80">
            </div>

            <button type="submit" name="btnsignup" class="btn btn-default">Submit</button>
          </form>
        </div>

     </div>
    </div>
  </body>
</html>