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
	$query = "SELECT MAX(No) AS NewNum FROM allcampaigns";
	$result = mysqli_query($cxn, $query);

	$row = mysqli_fetch_array($result, MYSQL_ASSOC);
	$NewNo = $row['NewNum'] + 1;
	return $NewNo;
}
?>



	<section id="poi_default" class="poi_form">
	  <div class="container">
	    <header>
				<h1>Campaign Login Form</h1>
	    </header>


			<div class="row">
	      <div class="col-sm-12">
<form method="post" action="LogOn_Campaign.php">

<div><p><strong>Username:</strong><br/>
<input type="text" name="uname"/></p>

<p><strong>Password:</strong><br/>
<input type="password" id='password' name="password" value=""/></p>

<p><div2><input type="submit" name="submit" value="LOGIN"/></p>
<p><div2><input type="submit" name="submit" value="Register"/></div2></p></div>
<img src="db.jpg" id="pic" alt="No Pix">
</form>
</div>
</div>
</div>
</section>


<?php
$host="localhost";
$email="";
$rtpwd="TurkeyTrot";
$rtuser="marketpo_rootguy";
$dbu="marketpo_usx";
$dbc="marketpo_campaigns";
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
	$cxn = @mysqli_connect($host,$rtuser,$rtpwd,$dbu);
	if (mysqli_connect_errno()) {
   		$msg1 = "could not login <br>" . mysqli_connect_error();
   		$msg2 = "You entered: " . $host . " " . $rtuser  . " " . $pwd . " " . $db;
   		?><script>alert ("<?php echo $msg1.$msg2; ?>"); </script><?php
   		die();
	}
	$query="SELECT No, PWD, Email FROM allusers WHERE Name='$enam'";			//find the users name in usx

	$result=@mysqli_query($cxn,$query);
	if (!$result) {
		$msg1 = "Bad query at 110";
		?><script>alert ("<?php echo $msg1; ?>"); </script><?php
		exit;
	}

	?><script>alert ("<?php echo "pwd: " . $row['PWD']; ?>"); </script><?php

																		// <---------------- add a pwd check also
	$row = mysqli_fetch_array($result, MYSQL_ASSOC);

	if ($epwd != $row['PWD']) {
		$msg1 = "no such user/password combination, new users should click on Register<br>" . mysqli_connect_error();
   		$msg2 = "You entered: " . $host . " " . $enam  . " password not shown " . $db;
   		?><script>alert ("<?php echo $msg1.$msg2; ?>"); </script><?php
   		$AllGo = false;
   		die();
	}

	if ($row['No'] < 0) {
   		$msg1 = "no such user/password combination, new users should click on Register<br>" . mysqli_connect_error();
   		$msg2 = "You entered: " . $host . " " . $enam  . " " . $epwd . " " . $db;
   		?><script>alert("<?php echo $msg1.$msg2; ?>"); </script><?php
   		$AllGo = false;
   		die();
	}

	//$emal = $row['Email'];

	if ($AllGo) {
		$query = "UPDATE `allusers` SET Name='$enam',PWD='$epwd',DBase='marketpo_campaigns',Email='$emal' WHERE No=0";	//set value of current user No=0
		$result=@mysqli_query($cxn,$query);
		if (!$result) {
			$msg1 = "Cant upodate record 0 in usx";
			?><script>alert ("<?php echo $msg1; ?>"); </script><?php
			exit;
		}

		echo "Login Successful";
		$AllGo = true;
		mysqli_close($cxn);
		$_SESSION['enam'] = $enam;
		$_SESSION['epwd'] = $epwd;
		$_SESSION['emal'] = $emal;

		$pass = "http://marketpoi.com/myadcampaign.php"; //?us=" . $enam . "&Gy187vx=" . $AllGo;
		header("Location:" . $pass);
	}
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'Register') {
	header("Location: http://marketpoi.com/Users_Campaign.php");
}
?>
<?php include('../articles/core/footer.php') ?>
