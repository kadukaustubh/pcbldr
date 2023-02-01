<?php
include("sql-conn.php");
session_start();
if(isset($_POST) & !empty($_POST)){
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, md5($_POST['password']));

$sql = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if($count == 1){
	$_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
	header('Location: auth.php');
}else{
    $fmsg = "Invalid Username/Password";
}
}
if(isset($_SESSION['username'])){
$smsg = "User already logged in";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="../style.css" />
	<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
    <title>PCBLDR | Login</title>
</head>

<body>

    <header>
        <div class="logo">
            <a href="../index.html"><img src="../media/logo.png" alt="pcbldr-logo"></a>
        </div>
        <nav>
            <h4><a href="../index.html">BLDR</a></h4><br>
            <h4><a href="auth.php">CUSTOM BLD</a></h4><br>
            <h4><a href="../about.html">ABOUT</a></h4><br>
        </nav>
        <footer>
            &copy PCBLDR 2020.
        </footer>
    </header>
	
	<div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form action="" method="post">
			      <span id="fail-msg"></span>
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" name="username" class="form-control" placeholder="User Name" required>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" class="form-control" placeholder="Password" required>
                  </div>
                  <button type="submit" class="btn btn-black" name="login">Login</button>
               </form>
			   <span style="white-space: pre-line">@Model.CommentText</span>
			   <button type="submit" class="btn btn-secondary" onclick="register()" name="register">Register</button>
            </div>
         </div>
      </div>
		<script>
		function register() {
			window.open("register.php");
		}
		</script>
    <script src="js/gsap.min.js"></script>
    <script src="js/app.js"></script>
	<script>
		var duration="<?php echo $fmsg ?>";
		$('#fail-msg').html(duration);
	</script>
</body>

</html>