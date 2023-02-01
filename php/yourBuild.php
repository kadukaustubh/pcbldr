<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />
	<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
    <title>PCBLDR | Final build</title>
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

    <section>
        <div class="php">
				<?php
				include("sql-conn.php");
				
					switch ($_GET['build']) {
						case "101":
							$sql = "SELECT * FROM configs where parts_id='H0101'";
							break;
						case "102":
							$sql = "SELECT * FROM configs where parts_id='H0102'";
							break;
						case "103":
							$sql = "SELECT * FROM configs where parts_id='H0103'";
							break;
						case "201":
							$sql = "SELECT * FROM configs where parts_id='H0201'";
							break;
						case "202":
							$sql = "SELECT * FROM configs where parts_id='H0202'";
							break;
						case "203":
							$sql = "SELECT * FROM configs where parts_id='H0203'";
							break;
						case "301":
							$sql = "SELECT * FROM configs where parts_id='H0301'";
							break;
						case "302":
							$sql = "SELECT * FROM configs where parts_id='H0302'";
							break;
						case "303":
							$sql = "SELECT * FROM configs where parts_id='H0303'";
							break;
						case "401":
							$sql = "SELECT * FROM configs where parts_id='G0101'";
							break;
						case "402":
							$sql = "SELECT * FROM configs where parts_id='G0102'";
							break;
						case "403":
							$sql = "SELECT * FROM configs where parts_id='G0103'";
							break;
						case "501":
							$sql = "SELECT * FROM configs where parts_id='G0201'";
							break;
						case "502":
							$sql = "SELECT * FROM configs where parts_id='G0202'";
							break;
						case "503":
							$sql = "SELECT * FROM configs where parts_id='G0203'";
							break;
						case "601";
							$sql = "SELECT * FROM configs where parts_id='G0301'";
							break;
						case "602":
							$sql = "SELECT * FROM configs where parts_id='G0302'";
							break;
						case "603":
							$sql = "SELECT * FROM configs where parts_id='G0303'";
							break;
						case "701":
							$sql = "SELECT * FROM configs where parts_id='W0101'";
							break;
						case "702":
							$sql = "SELECT * FROM configs where parts_id='W0102'";
							break;
						case "703":
							$sql = "SELECT * FROM configs where parts_id='W0103'";
							break;
						case "801":
							$sql = "SELECT * FROM configs where parts_id='W0201'";
							break;
						case "802":
							$sql = "SELECT * FROM configs where parts_id='W0202'";
							break;
						case "803":
							$sql = "SELECT * FROM configs where parts_id='W0203'";
							break;
						case "901":
							$sql = "SELECT * FROM configs where parts_id='W0301'";
							break;
						case "902":
							$sql = "SELECT * FROM configs where parts_id='W0302'";
							break;
						case "903":
							$sql = "SELECT * FROM configs where parts_id='W0303'";
							break;
						default:
							echo " ";
					}
					
					$result = $conn->query($sql);
					
        
				echo "<table>";
	
				while ($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<th>PC Name</th><td>" . $row['pc_name'] . "</td>";
					echo "</tr>";
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
					echo "<tr>";
					echo "<th>Display</th><td>" . $row['display'] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Peripherals</th><td>" . $row['peripherals'] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Price</th><td>" . $row['price'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
			?>
		</div>
    </section>
    <script src="../js/gsap.min.js"></script>
    <script src="../js/app.js"></script>
</body>

</html>