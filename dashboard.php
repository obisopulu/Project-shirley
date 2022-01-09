<?php include("services/xsis.php");

if($act == "sell.php" || $act == "posts.php" || $act == "analytics.php"){
	header("Location: $act");
}

if($act=='Logout'){
	unset($_SESSION );
	session_destroy();
	}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
	
	if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["phone"]) || empty($_POST["password"])){
		$signup_error = "Evrery field is required, fill form correctly.";
	}else{
		
	extract($_POST);
	$name = clean_input($name);
	$name = addcslashes(mysqli_real_escape_string($cxn, $name), '@%_&#*!()');
	$password = clean_input($password);
	$password = addcslashes(mysqli_real_escape_string($cxn, $password), '@%_&#*!()');
	
		if(mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM seller WHERE sellerEmail = '$email' LIMIT 1 ")) < 1){
			
			if(!preg_match("/^[a-zA-z ]*$/", $name)){
				$signup_error = "Enter a valid name, fill form correctly.";
			}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$signup_error .= "Enter a valid email, fill form correctly.";
			}else{
				
				mysqli_query($cxn, "INSERT INTO seller(sellerID, sellerName, sellerEmail, sellerPhone, sellerPassword, sellerCode, sellerMailingList, dateUpdated) VALUES ( Null, '$name', '$email', '$phone', '$password', '', '1', '$dateUpdated')") or die("xxx");

				$to = $email;
				$subject = "breeders Membership email confirmation";
			
				$headers = "Organisation: Breeders Nigeria\r\n";	
				$headers .= "From: support@breeders.ng\r\n";
				$headers .= "Reply-To: support@breeders.ng\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$headers .= "X-Priority: 3\r\n";
				$headers .= "X-Mailer: PHP ".phpversion()."\r\n";
			
				$message = "
				<html>
				<body style='padding:0;	margin:0;font-size:1em;background:#23356C;font-family:Tahoma, Geneva, sans-serif;color:#FFF;border-collapse:collapse;font-weight:100'>
				
				<div style='background:rgba(0,0,0,.4); padding:50px 10px'>
				<a href='index.php' style='text-decoration:none;'>
				<h1 style='margin:0; color:#FFF; font-weight:100'>
					breeders.ng
				</h1>
				</a>
				<h4 style='display:inline-block; padding:5px 10px; background:#0C9BBB; margin:2px 0; border-radius:2px; font-weight:100'>
					Welcome
				</h4>
				</div>
				
				<div style='margin:10px; padding:10px; background:rgba(0,0,0,.3); margin-bottom:50px'>
				
				</div>
				
				<a href='index.php' style='text-decoration:none; color:#FFF'><div style='height:20px;background:#0C9BBB;font-weight:700;padding:10px;margin:5px 0;display:inline-block'>back to Homepage</div></a><div style='font-size:.7em;height:30px;background:rgba(0,0,0,.3); text-align:center'>2018 All Rights Reserved. breeders.ng</div>
				
				</body>
				</html>";
				
				mail($to, $subject, $message, $headers);
				
				$sqlSellerID = mysqli_query($cxn, "SELECT sellerID FROM seller WHERE sellerEmail = '$email' LIMIT 1 ");
					while($rowSellerID = mysqli_fetch_assoc($sqlSellerID)){
						extract($rowSellerID);
					}
				
				session_start();
				$_SESSION['sessionStatus'] = "on";
				$_SESSION['sessionID'] = $sellerID;
				$_SESSION['sessionName'] = $name;
				$_SESSION['sessionEmail'] = $email;
				$_SESSION['sessionPhone'] = $phone;
				$_SESSION['sessionPassword'] = $password;
				extract($_SESSION);	
			}
		}else{
				$signup_error = "email already registered";
			}
	}
}

if($act == 'Update'){

	
	if($password == $sessionPassword && $name == $sessionName && $phone == $sessionPhone && $email == $sessionEmail){
		
		$edit_error = "Nothing new to update";
		
		}else{
		
		if($password == $sessionPassword){
	
			if($email == $sessionEmail){
						
				$name = clean_input($name);
				$phone = clean_input($phone);
				$sqlUpdate = mysqli_query($cxn, "UPDATE seller SET sellerName = '$name', sellerPhone = '$phone' WHERE sellerID = '$sessionID' ");
				
				$_SESSION["sessionName"] = $sessionName = $name;
				$_SESSION["sessionPhone"] = $sessionPhone = $phone;
				
			}else{
				
				if(mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM seller WHERE sellerEmail = '$email' LIMIT 1 ")) < 1){
					
					$sqlUpdate = mysqli_query($cxn, "UPDATE seller SET sellerName = '$name', sellerPhone = '$phone', sellerEmail = '$email' WHERE sellerID = '$sessionID' ");
								
				$name = clean_input($name);
				$email = clean_input($email);
				$phone = clean_input($phone);
				$_SESSION["sessionName"] = $sessionName = $name;
				$_SESSION["sessionPhone"] = $sessionPhone = $phone;
				$_SESSION["sessionEmail"] = $sessionEmail = $email;
				
				}else{
				
					$edit_error = "email already registered";
					
				}		
			}
		}else{
			$edit_error = "password incorrect";
		}
		
		$act = "edit_profile";
		
	}$act = "edit_profile";
}

if($act=='Login'){
	
	$login_email =  clean_input($login_email);
	$login_password = clean_input($login_password);
	
	$sqlLogin = mysqli_query($cxn, "SELECT * FROM seller WHERE sellerEmail = '$login_email' AND sellerPassword = '$login_password' LIMIT 1 ");
	if(mysqli_num_rows($sqlLogin) > 0){
		while($rowLogin = mysqli_fetch_assoc($sqlLogin)){
			extract($rowLogin);
			
			session_start();
			$_SESSION['sessionStatus'] = "on";
			$_SESSION['sessionID'] = $sellerID;
			$_SESSION['sessionName'] = $sellerName;
			$_SESSION['sessionEmail'] = $sellerEmail;
			$_SESSION['sessionPhone'] = $sellerPhone;
			$_SESSION['sessionPassword'] = $sellerPassword;
			extract($_SESSION);	
		}
	}else{
		$login_error = "User not found";
	}
}

if($act=='Recover Password'){
	
	$recover_email =  clean_input($recover_email);
	$code = time();
	$sqlRecover = mysqli_query($cxn, "SELECT * FROM seller WHERE sellerEmail = '$recover_email' LIMIT 1 ");
	if(mysqli_num_rows($sqlRecover) > 0){
		while($rowRecover = mysqli_fetch_assoc($sqlRecover)){
			extract($rowRecover);
			
			$to = $email;
			$subject = "breeders Membership email confirmation";
			
				$headers = "Organisation: Breeders Nigeria\r\n";	
				$headers .= "From: support@breeders.ng\r\n";
				$headers .= "Reply-To: support@breeders.ng\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$headers .= "X-Priority: 3\r\n";
				$headers .= "X-Mailer: PHP ".phpversion()."\r\n";
		
			$message = "
			<html>
			<body style='padding:0;margin:0;font-size:.8em;background:#23356C;font-family:Tahoma, Geneva, sans-serif;color:#FFF;border-collapse:collapse;font-weight:100;text-align:center'>
			
			<div style='background:rgba(0,0,0,.4); padding:50px 10px'><a href='index.php' style='text-decoration:none;'>
			<h1 style='margin:0; color:#FFF; font-weight:100'>
				breeders.ng
			</h1>
			</a>
			<h4 style='display:inline-block; padding:5px 10px; background:#0C9BBB; margin:2px 0; border-radius:2px; font-weight:100'>Password Recovery
			</h4>
			</div>
			
			<div style='margin:10px; text-align:left'>
			Hello $sellerName,
			</div>
			
			<div style='margin:10px; padding:10px; background:rgba(0,0,0,.3);'>
				Your password has been reset ( removed ), you would have to create a new one.<br><br>use the button bellow to change your password and access your dashboard<br><br>
			</div>
			
			<a href='https://www.breeders.ng/dashboard.php?rcvr=$code' style='text-decoration:none;'>			
			<div style='height:20px;background:#0C9BBB;padding:10px;margin:20px;display:inline-block'>Recover Password</div>
			</a>
			
			<div style='margin:10px; text-align:left; font-size:.8em'>
			if you did not request for this, ignore it.
			</div>
						
			<div style='font-size:.7em;background:rgba(0,0,0,.3);padding:20px'>2018 All Rights Reserved. breeders.ng</div>
			</body>
			</html>";
			
			mail($to, $subject, $message, $headers);
			
			$sqlUpdate = mysqli_query($cxn, "UPDATE seller SET sellerCode = '$code' WHERE sellerID = '$sellerID' ");
			
		}
	}else{
		$login_error = "Email not registered, try signing up";
	}
}


if((is_int($rcvr) || is_numeric($rcvr)) && $rcvr > 999999999){
	$xxx = "larva";
}

if(($act == "Reset" && $recoverd > 999999999) && (is_int($recoverd) || is_numeric($recoverd))){
	
	if($rcvr_password1 == $rcvr_password2){
		$sqlRecoverd = mysqli_query($cxn, "SELECT * FROM seller WHERE sellerCode = '$recoverd' LIMIT 1 ");
		while($rowRecoverd = mysqli_fetch_assoc($sqlRecoverd)){extract($rowRecoverd);
		
		$sqlUpdate = mysqli_query($cxn, "UPDATE seller SET sellerPassword = '$rcvr_password2', sellerCode = '' WHERE sellerID = '$sellerID' ");
		
			session_start();
			$_SESSION['sessionStatus'] = "on";
			$_SESSION['sessionID'] = $sellerID;
			$_SESSION['sessionName'] = $sellerName;
			$_SESSION['sessionEmail'] = $sellerEmail;
			$_SESSION['sessionPhone'] = $sellerPhone;
			$_SESSION['sessionPassword'] = $sellerPassword;
			extract($_SESSION);	
		}
	}else{
		$login_error = "Passwords do not match";
	}
}

if($sessionID){$traget = "dashboard - $sessionID";}else{$traget = "dashboard";}
	mysqli_query($cxn, "INSERT INTO anonymouser(anonymousID, anonymousIP, anonymousPage, anonymousPlatform, anonymousDevice, anonymousTime, dateUpdated) VALUES (NULL, '$userIP', '$traget', '$anonymousPlatform', '$anonymousDevice', '$current_time_day','$today')") or die("Home");

$seo_title = "Sell and manage your posts - Nigeria's online Pet and Livestock Marketplace";
$seo_description = "Buy and Sell Pet, Livestock, Feed and Accessories on Nigeria's online breeders Marketplace - breeders";
$seo_keywords = "buy, sell, pet, livestock, feed, accessory, nigeria, farm, dog, cat,  goat, sheep, poultry, puppies, horse, cow, chiken, mice, money";
$seo_img = "img/banner.png";
$seo_url = "https://www.breeders.ng";
$seo_author = "breeders";
$seo_date = "$today";

 include("services/heads.php");
?>


<?php if($isMobile){////////////////////////////////////// HEADER MOBILE?>

<div id="page_div" align="center">
<a href="index.php"><h1>breeders</h1></a>
<h4 id="page_title" class="breeders">
Dashboard
</h4>   
</div>



<?php }else{////////////////////////////////////// HEADER DESKTOP?>

<table id="foundation"><tbody><tr valign="top"><td id="cell1">

<div id="res_head">
<table id="wall_table">
<tr valign="middle">
<td id="wall_parent">
<div id="page_div" align="center">
<a href="index.php"><h1>breeders</h1></a>
<center>
<h4 id="page_title" class="breeders">
Dashboard
</h4>
</center>
</td></tr><tr>
<td id="nav_1"><a href="pets.php" title="View our pet collection"><div id="aaa">Pets</div></a></td></tr><tr>
<td id="nav_2"><a href="livestock.php" title="View our Livestock collection"><div id="aaa">Livestock</div></a></td></tr><tr>
<td id="nav_3"><a href="feedandstuff.php" title="View our animal Feed and Accessories collection"><div id="aaa">Feed and Stuff</div></a></td>
</tr>
</table>
</div>

<?php include("services/footer_head.php");?>

<?php }////////////////////////////////////// footer 1 DESKTOP?>



<?php if ($xxx == "larva"){ ?>


<div style="margin:10px; padding:0 10px; margin-bottom:50px; display:noe" align="center">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
<div style="width:100%; background:rgba(0,0,0,.3); padding:10px 0; margin:10px 0">
Reset Password
<div style="font-size:.8em">
<?php if ($login_error) {echo "<br><br>$login_error";}?>
</div>
<input type="password" name="rcvr_password1" placeholder="Password" id="rcvr_password1" class="dash_input"/>
<input type="password" name="rcvr_password2" placeholder="Confirm Password" id="rcvr_password2" class="dash_input"/>
<input type="hidden" name="recoverd" value="<?php echo $rcvr ?>"/>
<input type="submit" name="act" value="Reset" class="dash_submit"></form>
</div>
</div>


<?php }else if ($sessionStatus != "on"){ ?>


<div style="margin:10px; padding:0 10px; margin-bottom:50px; display:noe" align="center">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
<div style="width:100%; background:rgba(0,0,0,.3); padding:10px 0; margin:10px 0">
Login
<div style="font-size:.8em">
<?php if ($login_error) {echo "<br><br>$login_error";}?>
</div>
<input type="email" autocomplete="on" name="login_email" value="<?php echo $login_email ?>" placeholder="email" id="email_login" class="dash_input"/>
<input type="password" autocomplete="on" name="login_password" value="<?php echo $login_password ?>" placeholder="password" id="password_login" class="dash_input"/>
<input type="submit" name="act" value="Login" class="dash_submit"></form>
<div id="dash_pword_recover" onClick="if(_('recover').style.display=='block'){_('recover').style.display='none'}else{_('recover').style.display='block'} _('recover_email').focus()">forgotten you password?</div>
<div id="recover" style="display:none">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
<input type="email" name="recover_email" value="<?php echo $login_email ?>" placeholder="email" id="recover_email" class="dash_input"/>
<input type="submit" name="act" value="Recover Password" class="dash_submit"></form>
</form>
</div>
</div>

<br>OR<br><br>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
<div style="width:100%; background:rgba(0,0,0,.3); padding:10px 0; margin:10px 0;" id="whatToSell">
Signup
<div style="font-size:.8em">
<?php if ($signup_error) {echo "<br><br>$signup_error";}?>
</div>
<input type="name" name="name" value="<?php echo $name ?>" placeholder="Name" id="name_signup" class="dash_input"/>
<input type="email" name="email" value="<?php echo $email ?>" placeholder="email" id="email_signup" class="dash_input"/>
<input type="tel" name="phone" value="<?php echo $phone ?>" placeholder="Phone" id="phone_signup" class="dash_input"/>
<input type="password" name="password" placeholder="password" id="password_signup" class="dash_input"/>
<br>by signing up, you agree with our <strong>terms of service</strong><br><br>
<input type="submit" value="Sign Up" class="dash_submit">
</div>
</form>
</div>



<?php }else{ ?>




<?php if ($act != "edit_profile"){ ?>



<div style="background:rgba(0,0,0,.3); margin:10px; margin-bottom:50px; padding:10px; text-align:center; font-weight:700; border-radius:10px">
<div style="padding:10px 0; font-size:2em;"><?php echo $sessionName ?></div>
<div style="padding:px 0; font-size:1em;"><?php echo $sessionEmail ?><br><?php echo $sessionPhone ?></div><br><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
<table style="font-weight:700px; font-size:.8em"><tbody><tr><td style="width:50%" align="center">
<input type="submit" name="act" value="sell.php" style="background:rgba(0,0,0,.3) url(img/seller-new.png) left no-repeat; background-size:contain; border:none; height:100px; width:100px; font-size:0; border-radius:50%"><br>Sell
</td><td style="width:50%" align="center">
<input type="submit" name="act" value="analytics.php" style="background:rgba(0,0,0,.3) url(img/seller-analytics.png) left center no-repeat; background-size:contain; border:none; height:100px; width:100px; font-size:0; border-radius:50%"><br>Analytics
</td></tr><tr><td style="width:50%" align="center">
<a href="posts.php">
<input type="submit" name="act" value="posts.php" style="background:rgba(0,0,0,.3) url(img/seller-posts.png) left center no-repeat; background-size:contain; border:none; height:100px; width:100px; margin-top:10px; font-size:0; border-radius:50%"><br>Your Posts
</a>
</td><td style="width:50%" align="center">
<input type="submit" name="act" value="edit_profile" style="background:rgba(0,0,0,.3) url(img/seller-edit.png) left center no-repeat; background-size:contain; border:none; height:100px; width:100px; margin-top:10px; font-size:0; border-radius:50%"><br>Edit Profile
</td></tr><tr><td colspan="2" align="center"><br><br>
<input type="submit" name="act" value="Logout" style="height:40px; background:#0C9BBB; font-size:1em; border:none; font-weight:600;
 margin:20px 0">
</td></tr></tbody></table>
</form>
</div>

</div>



<?php }else{ ?>




<div style="background:rgba(0,0,0,.3); margin:10px; margin-bottom:50px; padding:10px; text-align:center; font-weight:700; display:non">
<form action="dashboard.php" method="post">
Edit Your Profile
<div style="font-size:.8em">
<?php if ($edit_error) {echo "<br><br>$edit_error";}?>
</div>
<input type="name" name="name" placeholder="Name" value="<?php echo $sessionName ?>" id="name" style="background:rgba(0,0,0,.2); border:none; padding:10px; margin:10px; width:85%"/>
<input type="email" name="email" placeholder="email" value="<?php echo $sessionEmail ?>" id="email" style="background:rgba(0,0,0,.2); border:none; padding:10px; margin:10px; width:85%"/>
<input type="tel" name="phone" placeholder="Phone" value="<?php echo $sessionPhone ?>" id="phone" style="background:rgba(0,0,0,.2); border:none; padding:10px; margin:10px; width:85%"/>
<br><br><br>
<input type="password" name="password" placeholder="password" id="password" style="background:rgba(0,0,0,.2); border:none; padding:10px; margin:10px; width:85%"/><br>
<a href="dashboard.php"><input type="button" value="Back" style="width:100px; height:40px; background:#0C9BBB; font-size:1em; border:none"></a>
<input type="submit" name="act" value="Update" style="width:100px; height:40px; background:#0C9BBB; font-size:1em; border:none">
</form>
</div>



<?php }



 }?>


<div id="match_screen_width" align="center"></div>
<?php if(!$isMobile){?>
</div>
</td><td id="cell3">
<?php }?>


<?php include("services/footer.php");?>


<?php if(!$isMobile){?></td></tr></tbody></table><?php }?>



<script src="script/leFloat.js"></script>
<?php if(!$isMobile){?><script src="script/res_d.js"></script><?php }?>
</body>
</html>