<!DOCTYPE html>
<html lang="en">

<head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-94036915-1', 'auto');
  ga('send', 'pageview');

</script>
<meta charset="utf-8">
<title>Registration</title>
<style>
div {
	font-family: Helvetica;
	position:absolute;
	left: 510px;
	top: 120px;
	color: black;
	margin-top:4cm
}
/*Logon Title*/
h2 {
	font-family: Helvetica;
	position: absolute;
	left: 180px;
	top: 80px;
	Color: #458B00;
	margin-top:4cm;
	margin-left:-1cm
}

/*Login button*/
div2 [type=submit] {
	font-family: Helvetica;
	position: absolute;
	top: 350px;
	left:510px;
	background-color: #458B00;
	color:black;
	height:30px;
	width:144px;
	font-weight: bold;
	margin-top:4cm
}
/*Register button*/
div3 [type=submit] {
	font-family: Helvetica;
	position: absolute;
	top: 390px;
	left:510px;
	background-color: #458B00;
	color:white;
	height:30px;
	width:144px;
	font-weight: bold;
	margin-top:5cm
}

/*rectangle*/
svg {
	font-family: Helvetica;
	position: absolute;
	left:470px;
	top: 80px;
	z-index: -1;
	background-color: white;
	margin-top:4cm
}
/*New User...*/
h5 {
	font-family: Helvetica;
	position: absolute;
	left: 480px;
	font-size:23px;
	top: 70px;
	color: black;
	margin-top:4.2cm;
	margin-left:-.3cm
}
body  {
	font-family: Helvetica;
	background-color: white;
	color: white;
	margin-top:5.5cm
}

</style>


</head>

<body>
<p style="margin-left:-.2cm;margin-top:-5.5cm;background-color:#458B00;text-indent:2cm;height:150px;width:1308px;font-size:50px;color:white;font-family: Helvetica">marketPOI: Creating an Ad Campaign</p>
<p style= "margin-top:-3.5cm;color:white;text-indent:2cm;font-size:35px;font-family: Helvetica">marketing and advertising's Points Of Interest</p>
<form method="post" action="Users_db2.php">
<h2>Welcome Aboard</h2>

<h5>New User Registraton</h5>
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

<script>
  encrypt_pwd();
</script>
</body>
<body style="margin-left:0cm">
<p style="text-indent:1cm;text-align:center;margin-top:22.3cm;color:white;font-size:18px;font-family: Helvetica">This website is not mobile friendly. Desktop required.</p>
<style>
ul#menu li {
    color: #458B00;
    display:inline-block;
    padding:.3cm;
    margin-top: -5cm
}
</style>
<ul id="menu">
  <li style="text-indent: 9cm;">
  <a href="http://marketpoi.com/index.php" target=_"blank" style= "text-decoration: none;color:#458B00"/>Home</li>
  <li><a href="http://marketpoi.com/LogOn2.php" target=_"blank" style="text-decoration: none;color:#458B00"/>Business Budget</li>
  <li><a href="http://marketpoi.com/myadcampaign.php" target=_"blank" style="text-decoration: none;color:#458B00"/>My Ad Campaign</li>
  <li><a href="http://marketpoi.com/security.php" target=_"blank" style="text-decoration: none;color:#458B00"/>Security</li>
  <li><a href="https://intuit.com" target=_"blank" style="text-decoration: none;color:#458B00"/>intuit</li>
  <li><a href="http://marketpoi.com/faq.php" target=_"blank" style="text-decoration: none;color:#458B00"/>FAQ</li></a>
</ul>

<script>
  signPassword();
</script>
<style>
ul#menu li {
  color: #458B00;
    display:inline-block;
    padding:.3cm;
    margin-top: -5cm;
    font-family: Helvetica
}
</style>
<ul id="menu">
  <li style="text-indent: 12cm;"><a href="http://marketpoi.com/support.php" target=_"blank" style="text-decoration: none;color:#458B00"/>Support</li>
  <li><a href="http://marketpoi.com/sitemap.php" target=_"blank" style="text-decoration: none;color:#458B00"/>SiteMap</li>
  <li><a href="http://marketpoi.com/contactus.php" target=_"blank" style="text-decoration: none;color:#458B00"/>Contact</li>
  <li><a href="http://marketpoi.com/termsofuse.php" target=_"blank" style="text-decoration: none;color:#458B00"/>Terms of use</li>
  </a>
</ul>
<footer>
<p style="text-align:center;margin-top:-5cm;background-color:black;text-indent:2cm;height:350px;width:1300px;font-size:50px;color:#458B00;font-family: Helvetica">marketPOI Inc.</p>
<p style="text-align:center;margin-top:-2cm;text-indent:2cm;font-size:12px;color:white;font-family: Helvetica">Terms, conditions, features, availability, pricing, fees, services, and support options subject to change without notice.</p>
<p style="text-align:center;margin-top:-1.2cm;text-indent:2cm;font-size:12px;color:white;font-family: Helvetica">2017 marketPOI.com. All rights reserved.</p>
<p style="text-align:center;margin-top:-3cm;text-indent:2cm;font-size:18px;color:white;font-family: Helvetica">marketPOI is an free online application, with all programs approved and under applicable licenses.</p>
</footer>

<script src="js/signup.js"></script>
</html>
