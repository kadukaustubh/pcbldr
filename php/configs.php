<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />
	<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
    <title>PCBLDR | Configurations</title>
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
				if ($conn->connect_error) {
				  die("Connection failed: " . $conn->connect_error);
				}
				if ($_GET['config']=='config1') {
					$sql = "SELECT parts_id, pc_name, price FROM configs limit 0,3";
					$result = $conn->query($sql);
				}elseif ($_GET['config']=='config2') {
					$sql = "SELECT parts_id, pc_name, price FROM configs limit 3,3";
					$result = $conn->query($sql);
				}elseif ($_GET['config']=='config3') {
					$sql = "SELECT parts_id, pc_name, price FROM configs limit 6,3";
					$result = $conn->query($sql);
				}elseif ($_GET['config']=='config4') {
					$sql = "SELECT parts_id, pc_name, price FROM configs limit 9,3";
					$result = $conn->query($sql);
				}elseif ($_GET['config']=='config5') {
					$sql = "SELECT parts_id, pc_name, price FROM configs limit 12,3";
					$result = $conn->query($sql);
				}elseif ($_GET['config']=='config6') {
					$sql = "SELECT parts_id, pc_name, price FROM configs limit 15,3";
					$result = $conn->query($sql);
				}elseif ($_GET['config']=='config7') {
					$sql = "SELECT parts_id, pc_name, price FROM configs limit 18,3";
					$result = $conn->query($sql);
				}elseif ($_GET['config']=='config8') {
					$sql = "SELECT parts_id, pc_name, price FROM configs limit 21,3";
					$result = $conn->query($sql);
				}elseif ($_GET['config']=='config9') {
					$sql = "SELECT parts_id, pc_name, price FROM configs limit 24,3";
					$result = $conn->query($sql);
				}
				if ($result->num_rows > 0) {
				  // output data of each row
					if ($_GET['config']=='config1'){
					  $a=101;
					  while($row = $result->fetch_assoc()) {
						  echo "<h4>"."<a href='yourBuild.php?build=". $a ."'>"."PC name: ".$row["pc_name"]."<br>"."Price: ".$row["price"]."</a>"."</h4>"."<br>";
						  $a++;
						}
					}elseif ($_GET['config']=='config2'){
					  $a=201;
					  while($row = $result->fetch_assoc()) {
						  echo "<h4>"."<a href='yourBuild.php?build=". $a ."'>"."PC name: ".$row["pc_name"]."<br>"."Price: ".$row["price"]."</a>"."</h4>"."<br>";
						  $a++;
						}
					}elseif ($_GET['config']=='config3'){
					  $a=301;
					  while($row = $result->fetch_assoc()) {
						  echo "<h4>"."<a href='yourBuild.php?build=". $a ."'>"."PC name: ".$row["pc_name"]."<br>"."Price: ".$row["price"]."</a>"."</h4>"."<br>";
						  $a++;
						}
					}elseif ($_GET['config']=='config4'){
					  $a=401;
					  while($row = $result->fetch_assoc()) {
						  echo "<h4>"."<a href='yourBuild.php?build=". $a ."'>"."PC name: ".$row["pc_name"]."<br>"."Price: ".$row["price"]."</a>"."</h4>"."<br>";
						  $a++;
						}
					}elseif ($_GET['config']=='config5'){
					  $a=501;
					  while($row = $result->fetch_assoc()) {
						  echo "<h4>"."<a href='yourBuild.php?build=". $a ."'>"."PC name: ".$row["pc_name"]."<br>"."Price: ".$row["price"]."</a>"."</h4>"."<br>";
						  $a++;
						}
					}elseif ($_GET['config']=='config6'){
					  $a=601;
					  while($row = $result->fetch_assoc()) {
						  echo "<h4>"."<a href='yourBuild.php?build=". $a ."'>"."PC name: ".$row["pc_name"]."<br>"."Price: ".$row["price"]."</a>"."</h4>"."<br>";
						  $a++;
						}
					}elseif ($_GET['config']=='config7'){
					  $a=701;
					  while($row = $result->fetch_assoc()) {
						  echo "<h4>"."<a href='yourBuild.php?build=". $a ."'>"."PC name: ".$row["pc_name"]."<br>"."Price: ".$row["price"]."</a>"."</h4>"."<br>";
						  $a++;
						}
					}elseif ($_GET['config']=='config8'){
					  $a=801;
					  while($row = $result->fetch_assoc()) {
						  echo "<h4>"."<a href='yourBuild.php?build=". $a ."'>"."PC name: ".$row["pc_name"]."<br>"."Price: ".$row["price"]."</a>"."</h4>"."<br>";
						  $a++;
						}
					}elseif ($_GET['config']=='config9'){
					  $a=901;
					  while($row = $result->fetch_assoc()) {
						  echo "<h4>"."<a href='yourBuild.php?build=". $a ."'>"."PC name: ".$row["pc_name"]."<br>"."Price: ".$row["price"]."</a>"."</h4>"."<br>";
						  $a++;  
						}
					}
				}else {
					echo "0 results";
				}
				$conn->close();
			?>
        </div>
    </section>
    <script src="../js/gsap.min.js"></script>
    <script src="../js/app.js"></script>
</body>

</html>