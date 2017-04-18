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
	$query = "SELECT MAX(No) AS NewNum FROM allusers";		//could be a function
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
      <h2>Welcome Aboard</h2>
<p>
  marketPOI: My Bill Reminders
</p><p>
  marketing and advertising's Points Of Interest
</p>
    </header>

    <div class="row">
      <div class="col-sm-12">

<form method="post" action="Users_Bills.php">

<h5>Bill Reminder Registration</h5>
<div><p><strong>username:</strong><br/>
<input type="text" id='user' name="name"/></p>
<p><strong>email:</strong><br/>
<input type="text" id='eml' name="email"/></p>
<p><strong>password:</strong><br/>
<input type="password" id='pw' name="password"/></p>
<p><strong>re-enter password:</strong><br/>
<input type="password" id='pw2' name="password2"/></p></div>
<div3><input type="submit" id='submit' name="submit" value="Register"/></div3>
</form>

<?php
global $host;
global $db;
global $dbu;
global $rtpwd;
global $rtuser;

$host="localhost";
$db = "marketpo_Budgets9";
$dbu = "marketpo_usx";
$rtpwd = "TurkeyTrot";
$rtuser = "marketpo_rootguy";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'Register') {
	/*Get the user values from form*/
	$epwd = "x";
	$emal = $_POST['email'];
	$epwd = $_POST['password'];
	$epwd2 = $_POST['password2'];
	$enam = $_POST['name'];
	//$xpwd = encrypt_pwd($epwd);		//use non encrypted pwds temp temporalily

	if (strlen($epwd) < 6 || strlen($epwd2) < 6) {
		$msg = "Sorry, Passwords must contain at least 6 characters";
		?><script>alert ("<?php echo $msg ?>"); </script><?php
		exit;
	}

	if ($epwd != $epwd2) {
		$msg = "Passwords are not the same, please re-enter them";
		?><script>alert ("<?php echo $msg ?>"); </script><?php
		exit;
	}

	//look for duplicate user name
	$cxn = @mysqli_connect($host,$rtuser,$rtpwd,$dbu);
	if (mysqli_connect_errno()) {
		$msg = "can't connect to database usx  <br>" . mysqli_connect_error();
		$msg2 = " You entered: " . $host . " " . $rtuser ." " . $rtpwd . " " . $dbu;
		?><script>alert ("<?php echo $msg.$msg2 ?>"); </script><?php
   		exit;
	}

	$query="SELECT No FROM allusers WHERE Name='$enam'";
	$result=@mysqli_query($cxn,$query);
	$row = mysqli_fetch_array($result, MYSQL_ASSOC);

	if ($row['No'] > 0) {
		$msg = "The username you entered is already in use";
		?><script>alert ("<?php echo $msg ?>"); </script><?php
		exit;
	}
	//look for duplicate email
	$query="SELECT No FROM allusers WHERE email='$emal'";
	$result=@mysqli_query($cxn,$query);
	$row = mysqli_fetch_array($result, MYSQL_ASSOC);

	if ($row['No'] > 0) {
		$msg = "The email you entered is already in use";
		?><script>alert ("<?php echo $msg ?>"); </script><?php
		exit;
	}
	$NewNo = GetMax_No ($cxn);

	$query = "INSERT INTO allusers (No,Name,PWD,DBase,email) VALUES ($NewNo,'$enam','$epwd','$db','$emal')";
	$result = mysqli_query($cxn, $query);
	mysqli_close ($cxn);

	/*connecto to budgets9.allitems - enter default record*/
	$cxn = mysqli_connect($host,$rtuser,$rtpwd,$db);
	$query = "SELECT MAX(No) AS NewNum FROM allitems";
	$result = mysqli_query($cxn, $query);
	$row = mysqli_fetch_array($result, MYSQL_ASSOC);
	$NewNo = $row['NewNum'] + 1;
	$query = "INSERT INTO allitems (No,Item,Budget,Actuals,Difference,Category,Usr,Pwd,Email) VALUES ($NewNo,'default_rec','1000.00','998.00','2.00','Home','$enam','$epwd','$emal')";
	if (mysqli_query($cxn,$query)) {
		$msg = "<p>The user was added successfully - please remember your logon values</p>";
		?><script>alert ("<?php echo $msg ?>"); </script><?php
		mysqli_close($cxn);
		header("location: LogOnBills.php");
	}
	else {
		echo "Could not add user";
		mysqli_close($cxn);
	}
}

?>

      </div>
    </div>
  </div>
</section>
<?php include('../articles/core/footer.php') ?>
