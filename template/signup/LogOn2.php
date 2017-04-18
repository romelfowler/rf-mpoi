<?php include ('../articles/core/header.php'); ?>

<?php
function encrypt_pwd ($cepwd) {
	$odd = Array(1,3,5,7,9,11,13);
	$even = Array(0,2,4,6,8,10,12,14);
	$len = strlen($cepwd);
	$xtmp = str_split ($cepwd);
	$mod = fmod($len,2);

	if ($mod > 0) {
		for ($i=0; $i<floor($len/2); $i++) {
			$xenc[$i] = $xtmp[$odd[$i]];
		}
	}
	else {
		for ($i=0; $i<floor($len/2); $i++) {
			$xenc[$i] = $xtmp[$odd[$i]];
		}
	}
	for ($i=0; $i<ceil($len/2); $i++) {
		$xenc[$i+ceil($len/2)] = $xtmp[$even[$i]];
	}
	$cxpwd=implode("",$xenc);
	return $cxpwd;
}
function GetMax_No ($cxn) {
	$query = "SELECT MAX(No) AS NewNum FROM allusers";
	$result = mysqli_query($cxn, $query);

	$row = mysqli_fetch_array($result, MYSQL_ASSOC);
	$NewNo = $row['NewNum'] + 1;
	return $NewNo;
}
?>



</head>

<body>


<section id="poi_default" class="poi_form">
  <div class="container">
    <header>
			<h1>Budget Login Form</h1>

    </header>

    <div class="row">
      <div class="col-sm-12">

				<form method="post" action="LogOn2.php">

				<div><p><strong>Username:</strong><br/>
				<input type="text" name="uname"/></p>

				<p><strong>Password:</strong><br/>
				<input type="password" id='password' name="password" value=""/></p>

				<p><div2><input type="submit" name="submit" value="LOGIN"/></p>
				<p><div2><input type="submit" name="submit" value="Register"/></div2></p></div>
				<!-- <img src="db.jpg" id="pic" alt="No Pix"> -->
				</form>
				<?php
				$host="localhost";
				$email="";
				$rtpwd="TurkeyTrot";
				$rtuser="marketpo_rootguy";
				$db="marketpo_usx";
				$AllGo=false;

				if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'LOGIN') {
					if ($_POST['uname'] == null || $_POST['password'] == null) {	//ck if all fields have values
						echo "Fill out all fields";
						$AllGo=false;
						exit;
					}
					else {
						$AllGo = true;
					}
					/*get user inputs*/
					$enam  = $_POST['uname'];
					$epwd  = $_POST['password'];
					//$xpwd = encrypt_pwd($epwd);					//encryption disabled

					/*login to database usx see if user exists*/
					$cxn = @mysqli_connect($host,$rtuser,$rtpwd,$db);
					if (mysqli_connect_errno()) {
				   		echo "andrew could not login <br>" . mysqli_connect_error();
				   		echo "You entered: " . $host . " " . $rtuser  . " " . $pwd . " " . $db;
				   		die();
					}
					$query="SELECT No FROM allusers WHERE Name='$enam'";			//find the users name in usx

					$result=@mysqli_query($cxn,$query);
					if (!$result) {
						echo "Bad query at 110";
						exit;
					}
																					// <---------------- add a pwd check also
					$row = mysqli_fetch_array($result, MYSQL_ASSOC);

					echo "No was: " . $row['No'] . "<br>";			//temp statement

					if ($row['No'] < 1) {
				   		echo "no such user/password combination, new users should click on Register<br>" . mysqli_connect_error();
				   		echo "You entered: " . $host . " " . $enam  . " " . $epwd . " " . $db;
				   		$AllGo = false;
				   		die();
					}

					if ($AllGo) {
						echo "Login Successful";
						$AllGo = true;
						$pass = "Budgets_Main3.php?us=" . $enam . "&Gy187vx=" . $AllGo;
						header("Location:" . $pass);
					}
				}

				if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'Register') {
					header("Location: Users_db2.php");
				}
				?>









      </div>
    </div>
  </div>
</section>
<?php include('../articles/core/footer.php') ?>
