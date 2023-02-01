<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />
	<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
    <title>PCBLDR | CUSTOM BLD</title>
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
			<?php
				include("sql-conn.php");
				error_reporting(E_ALL);
				ini_set('display_errors', 1);
				if(isset($_POST['logout'])){
					session_unset();
					session_regenerate_id(true);
					session_unset();
					session_destroy();
					session_write_close();
					setcookie(session_name(),'',0,'/');
					header('LOCATION: ../index.html');
				}
				if(isset($_POST['save'])) {
					session_start();
					$username = $_SESSION['username'];
					$bldname = $_POST['bldname'];
					$cabinet = explode(",",$_POST['cabinets']);
					$cpu = explode(",",$_POST['cpu']);
					$mboard = explode(",",$_POST['mboard']);
					$gpu = explode(",",$_POST['gpu']);
					$psu = explode(",",$_POST['psu']);
					$storage = explode(",",$_POST['storage']);
					$ram = explode(",",$_POST['ram']);
					if($bldname == '' || $cabinet == '' || $cpu == '' || $mboard == '' || $gpu == '' || $psu == '' || $storage == '' || $ram == ''){
						$error_message = "Please fill all fields.";
						echo $error_message;
					}
					else{
						$insertSQL = "INSERT into saved_bld (username,bld_name,cabinet,cpu,mboard,gpu,psu,storage,ram) values('$username', '$bldname', '$cabinet[1]', '$cpu[1]', '$mboard[1]', '$gpu[1]', '$psu[1]', '$storage[1]', '$ram[1]')";
						if ($conn->query($insertSQL) === TRUE) {
							echo "Build saved successfully";
						} 
						else {
							echo "Error: " . $insertSQL . "<br>" . $conn->error;
						}
					}
				}
			?>
			
            <h4>CUSTOM BLD</h4>
            <form action="" method="post">
				<div class="custom-php">
				<input type="text" id="bldname" name="bldname" placeholder="Enter build name"><br><br>
				<table>
					
				<tr>
				<th>
				<label for="cabinets">Cabinets:</label>
				</th>
				<td>
				<select id="cabinets" name="cabinets">
					<option value="0" selected><--Choose Cabinet--></option>
					<?php 
						$sql = mysqli_query($conn, "SELECT prices,id FROM cabinets");
						while ($row = $sql->fetch_assoc()){
							echo "<option value='" . $row['prices'] . "," . $row['id'] ."'>" . $row['id'] . " (" . $row['prices'] . ")" . "</option>";
						}
					?>
				</select>
				</td>
				</tr>
				
				<tr>
				<th>
				<label for="cpu">Processor:</label>
				</th>
				<td>
				<select id="cpu" name="cpu">
				<option value="0" selected><--Choose Processor--></option>
					<?php 
						$sql = mysqli_query($conn, "SELECT prices,id FROM cpu");
						while ($row = $sql->fetch_assoc()){
							echo "<option value='" . $row['prices'] . "," . $row['id'] ."'>" . $row['id'] . " (" . $row['prices'] . ")" . "</option>";
						}
					?>
				</select>
				</td>
				</tr>
					
				<tr>
				<th>
				<label for="mboard">Motherboard:</label>
				</th>
				<td>
				<select id="mboard" name="mboard">
				<option value="0" selected><--Choose Motherboard--></option>
					<?php 
						$sql = mysqli_query($conn, "SELECT prices,id FROM mboard");
						while ($row = $sql->fetch_assoc()){
							echo "<option value='" . $row['prices'] . "," . $row['id'] ."'>" . $row['id'] . " (" . $row['prices'] . ")" . "</option>";
						}
					?>
				</select>
				</td>
				</tr>
					
				<tr>
				<th>
				<label for="gpu">Graphics card:</label>
				</th>
				<td>
				<select id="gpu" name="gpu">
				<option value="0" selected><--Choose Graphics Card--></option>
					<?php 
						$sql = mysqli_query($conn, "SELECT prices,id FROM gpu");
						while ($row = $sql->fetch_assoc()){
							echo "<option value='" . $row['prices'] . "," . $row['id'] ."'>" . $row['id'] . " (" . $row['prices'] . ")" . "</option>";
						}
					?>
				</select>
				</td>
				</tr>
					
				<tr>
				<th>
				<label for="psu">Power supply:</label>
				</th>
				<td>
				<select id="psu" name="psu">
				<option value="0" selected><--Choose Power Supply--></option>
					<?php 
						$sql = mysqli_query($conn, "SELECT prices,id FROM psu");
						while ($row = $sql->fetch_assoc()){
							echo "<option value='" . $row['prices'] . "," . $row['id'] ."'>" . $row['id'] . " (" . $row['prices'] . ")" . "</option>";	
						}
					?>
					
				</select>
				</td>
				</tr>
					
				<tr>
				<th>
				<label for="storage">Storage:</label>
				</th>
				<td>
				<select id="storage" name="storage">
				<option value="0" selected><--Choose Storage--></option>
					<?php 
						$sql = mysqli_query($conn, "SELECT prices,id FROM storage");
						while ($row = $sql->fetch_assoc()){
							echo "<option value='" . $row['prices'] . "," . $row['id'] ."'>" . $row['id'] . " (" . $row['prices'] . ")" . "</option>";
						}
					?>
				</select>
				</td>
				</tr>
					
				<tr>
				<th>
				<label for="ram">RAM:</label>
				</th>
				<td>
				<select id="ram" name="ram">
				<option value="0" selected><--Choose RAM--></option>
					<?php 
						$sql = mysqli_query($conn, "SELECT prices,id FROM ram");
						while ($row = $sql->fetch_assoc()){
							echo "<option value='" . $row['prices'] . "," . $row['id'] ."'>" . $row['id'] . " (" . $row['prices'] . ")" . "</option>";
						}
					?>
				</select>
				</td>
				</tr>
				
				<tr>
				<th>
				<label for="price">Price:</label>
				</th>
				<td>
				<input id="result" disabled/>
				</td>
				</tr>

				</table>
				</div>
				
				<br>
				<input type="submit" value="Save" name="save" onclick="test()">
				<input type="submit" value="Logout" name="logout">
            
			</form>
		</div>
	</section>
	<script src="js/gsap.min.js"></script>
	<script src="js/app.js"></script>
	<script>
	
	var cabval = document.getElementById( "cabinets" ).value;
	var cab_arr = cabval.split(",");
	var cab_price = parseInt(cab_arr[0]);
	
	var cpuval = document.getElementById( "cpu" ).value;
	var cpu_arr = cpuval.split(",");
	var cpu_price = parseInt(cpu_arr[0]);
	
	var mbval = document.getElementById( "mboard" ).value;
	var mb_arr = mbval.split(",");
	var mb_price = parseInt(mb_arr[0]);
	
	var gpuval = document.getElementById( "gpu" ).value;
	var gpu_arr = gpuval.split(",");
	var gpu_price = parseInt(gpu_arr[0]);
	
	var psuval = document.getElementById( "psu" ).value;
	var psu_arr = psuval.split(",");
	var psu_price = parseInt(psu_arr[0]);
	
	var strval = document.getElementById( "storage" ).value;
	var str_arr = strval.split(",");
	var str_price = parseInt(str_arr[0]);
	
	var ramval = document.getElementById( "ram" ).value;
	var ram_arr = ramval.split(",");
	var ram_price = parseInt(ram_arr[0]);
	
	
	cabinets.onchange=()=>calculate();
	cpu.onchange=()=>calculate();
	mboard.onchange=()=>calculate();
	gpu.onchange=()=>calculate();
	psu.onchange=()=>calculate();
	storage.onchange=()=>calculate();
	ram.onchange=()=>calculate();

	

	function calculate(){
		
		cabval = document.getElementById( "cabinets" ).value;
		cab_arr = cabval.split(",");
		cab_price = parseInt(cab_arr[0]);
		
		cpuval = document.getElementById( "cpu" ).value;
		cpu_arr = cpuval.split(",");
		cpu_price = parseInt(cpu_arr[0]);
	
		mbval = document.getElementById( "mboard" ).value;
		mb_arr = mbval.split(",");
		mb_price = parseInt(mb_arr[0]);
	
		gpuval = document.getElementById( "gpu" ).value;
		gpu_arr = gpuval.split(",");
		gpu_price = parseInt(gpu_arr[0]);
	
		psuval = document.getElementById( "psu" ).value;
		psu_arr = psuval.split(",");
		psu_price = parseInt(psu_arr[0]);
	
		strval = document.getElementById( "storage" ).value;
		str_arr = strval.split(",");
		str_price = parseInt(str_arr[0]);
	
		ramval = document.getElementById( "ram" ).value;
		ram_arr = ramval.split(",");
		ram_price = parseInt(ram_arr[0]);

		var sum = 0;
		var a = +cab_price;
		var b = +cpu_price;
		var c = +mb_price;
		var d = +gpu_price;
		var e = +psu_price;
		var f = +str_price;
		var g = +ram_price;

		sum = a + b + c + d + e + f + g;
		document.getElementById("result").value = sum;
	}
 
 
	calculate()

	
	</script>
</body>

</html>