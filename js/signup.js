$(document).ready(function(){

  function encrypt_pwd($cepwd) {
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

function signPassword() {
  $host="localhost";
  $db = "marketpo_Budgets9";
  $dbu = "marketpo_usx";

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'Register') {
  	/*Get the user values from form*/
  	$epwd = "x";
  	$emal = $_POST['email'];
  	$epwd = $_POST['password'];
  	$epwd2 = $_POST['password2'];
  	$enam = $_POST['name'];
  	$rtuser = 'marketpo_rootguy';
  	$rtpwd = 'TurkeyTrot';

  	//$xpwd = encrypt_pwd($epwd);

  	if (strlen($epwd) < 6 || strlen($epwd2) < 6)  {
  		$msg = "Passwords must contain at least 6 characters";
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
  		$msg = "can't find database usx  <br>" . mysqli_connect_error();
  		$msg2 = " You entered: " . $host . " root  null  usx "
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

  	$cxn = mysqli_connect($host,$rtuser,$rtpwd,$db);

  	$query = "SELECT MAX(No) AS NewNum FROM allitems";
  	$result = mysqli_query($cxn, $query);
  	$row = mysqli_fetch_array($result, MYSQL_ASSOC);
  	$NewNo = $row['NewNum'] + 1;
  	$query = "INSERT INTO allitems (No,Item,Budget,Actuals,Difference,Category,Usr,PWD,Email) VALUES ($NewNo,'default_rec','1000.00','998.00','2.00','Home','$enam','$epwd','$emal')";
  	if (mysqli_query($cxn,$query)) {
  		$msg = "<p>The user was added successfully - please remember your logon values</p>";
  		?><script>alert ("<?php echo $msg ?>"); </script><?php
  		mysqli_close($cxn);
  		header("location: LogOn2.php");
  	}
  	else {
  		echo "Could not add user";
  		mysqli_close($cxn);
  	}
  }

}
});
