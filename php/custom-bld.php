<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />
	<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
    <title>PCBLDR | Custom build</title>
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
				if(isset($_POST['delete'])){
					$bld = $_GET['bldname'];
					$sql = "DELETE FROM saved_bld where bld_name = '$bld'";
					$result = $conn->query($sql);
					header('LOCATION: saved-bld.php');
				}
				session_start();
				$bld = $_GET['bldname'];
				$sql = "SELECT * FROM saved_bld where bld_name = '$bld'";
				$result = $conn->query($sql);
        
				echo "<table>";
	
				while ($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<th>Cabinet</th><td>" . $row['cabinet'] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Processor</th><td>" . $row['cpu'] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Motherboard</th><td>" . $row['mboard'] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Graphics Card</th><td>" . $row['gpu'] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Power Supply</th><td>" . $row['psu'] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Storage</th><td>" . $row['storage'] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>RAM</th><td>" . $row['ram'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
			?>
		</div>
		<form action="" method="post">
			<input type="submit" value="Delete build" name="delete">
			<input type="submit" value="Logout" name="logout">
		</form>
    </section>
    <script src="../js/gsap.min.js"></script>
    <script src="../js/app.js"></script>
</body>

</html>