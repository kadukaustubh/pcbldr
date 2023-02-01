<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />
	<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
    <title>PCBLDR | Saved builds</title>
</head>

<body>

    <header>
        <div class="logo">
            <a href="../index.html"><img src="../media/logo.png" alt="pcbldr-logo"></a>
        </div>
        <nav>
			<h4><a href="../index.html">BLDR</a></h4><br>
			<h4><a href="auth.php">CUSTOM BLD</a></h4><br>
			<h4><a href="saved-bld.php">SAVED BLDS</a></h4><br>
            <h4><a href="../about.html">ABOUT</a></h4><br>
        </nav>
        <footer>
            &copy PCBLDR 2020.
        </footer>
    </header>

    <section>
        <div class="php">
			<?php
				include("sql-conn.php");
				if(isset($_POST['logout'])){
					session_unset();
					session_regenerate_id(true);
					session_unset();
					session_destroy();
					session_write_close();
					setcookie(session_name(),'',0,'/');
					header('LOCATION: ../index.html');
				}
				session_start();
				$username = $_SESSION['username'];
				$sql = "SELECT * FROM saved_bld where username='$username'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					  
					while($row = $result->fetch_assoc()) {
						echo "<h4>"."<a href='custom-bld.php?bldname=". $row["bld_name"] ."'>"."PC name: ".$row["bld_name"]."<br>";
					}
				}
			?>
        </div>
		<form action="" method="post">
			<input type="submit" value="Logout" name="logout">
		</form>
    </section>
    <script src="../js/gsap.min.js"></script>
    <script src="../js/app.js"></script>
</body>

</html>