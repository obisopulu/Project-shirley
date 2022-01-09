<?php include("services/xsis.php");

if ($sessionStatus != "on"){
		header("Location: dashboard.php");
}
	mysqli_query($cxn, "INSERT INTO anonymouser(anonymousID, anonymousIP, anonymousPage, anonymousPlatform, anonymousDevice, anonymousTime, dateUpdated) VALUES (NULL, '$userIP', 'sell - $sessionID', '$anonymousPlatform', '$anonymousDevice', '$current_time_day','$today')") or die("Home");

if( ($act == "Sell" && $lga != "" && $category != "" && $title != "" && $details != "" && $amount != "" && $negotiable != "" && $_FILES['picture_1']['name'] != "" && $_FILES['picture_2']['name'] != "") && (($category == "Pet" && $sub_category != "") || ($category == "Livestock" && $sub_category != "") || ($category == "Feed" && $sub_category == "") || ($category == "Accessory" && $sub_category == "")) && $_SERVER["REQUEST_METHOD"] == "POST"){


function thumb_that_shii($picture, $picIndex, $fileTmpLoc){
	move_uploaded_file($fileTmpLoc, "postimg/".$picture) or die('yyyy');
	
	unlink($fileTmpLoc);
	
	$target = "postimg/$picture";
	$newcopy = "postimg-thumbs/t-$picture";
	$w = 150;
	$h = 150;
	list($w_orig, $h_orig) = getimagesize($target);
	$scale_ratio = $w_orig/$h_orig;
	if (($w/$h)>$scale_ratio) {$w = $h*$scale_ratio;}else{$h = $w/$scale_ratio;}
	$img = "";
	$ext = strtolower($ext);
	if ($ext == "gif"){$img = imagecreatefromgif($target);}else if($ext =="png"){$img = imagecreatefrompng($target);}else{$img = imagecreatefromjpeg($target);}
	$tci = imagecreatetruecolor($w, $h);
	imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
	imagejpeg($tci, $newcopy, 80);
	
	$im = imagecreatefromjpeg($newcopy);
	$stamp = imagecreatefrompng('img/watermark.png');
	$sx = imagesx($stamp);
	$sy = imagesy($stamp);
	$marge_right = 20;
	$marge_bottom = 20;
	imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 100);
	imagepng($im, $newcopy);
	imagedestroy($im);	
	
	$target = "postimg/$picture";
	$newcopy = "postimg/$picture";
	$w = 350;
	$h = 350;
	list($w_orig, $h_orig) = getimagesize($target);
	$scale_ratio = $w_orig/$h_orig;
	if (($w/$h)>$scale_ratio) {$w = $h*$scale_ratio;} else {$h = $w/$scale_ratio;}
	$img = "";
	$ext = strtolower($ext);
	if ($ext == "gif"){$img = imagecreatefromgif($target);}else if($ext =="png"){$img = imagecreatefrompng($target);}else{$img = imagecreatefromjpeg($target);}
	$tci = imagecreatetruecolor($w, $h);
	imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
	imagejpeg($tci, $newcopy, 80);
	
	
	$im = imagecreatefromjpeg($target);
	$stamp = imagecreatefrompng('img/watermark.png');
	$sx = imagesx($stamp);
	$sy = imagesy($stamp);
	$marge_right = 20;
	$marge_bottom = 20;
	imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 100);
	imagepng($im, $target);
	imagedestroy($im);	
}

	$amount = clean_input($amount);
	$amount = addcslashes(mysqli_real_escape_string($cxn, $amount), '@%_&#*!()');
	$title = clean_input($title);
	$title = addcslashes(mysqli_real_escape_string($cxn, $title), '@%_&#*!()');
	$details = clean_input($details);
	$details = addcslashes(mysqli_real_escape_string($cxn, $details), '@%_&#*!()');
	
	$xxx_1 = clean_input_link($title).date("ims")."1-breeders";
	$xxx_2 = clean_input_link($title).date("ims")."2-breeders";
	$xxx_3 = clean_input_link($title).date("ims")."3-breeders";
	
	$kaboom = explode(".", $_FILES["picture_1"]["name"]);
	$ext = end($kaboom);
	$picture_1 = $xxx_1.".".$ext;
	$fileTmpLoc = $_FILES["picture_1"]["tmp_name"];
	thumb_that_shii($picture_1, 1, $fileTmpLoc);
	
	$kaboom = explode(".", $_FILES["picture_2"]["name"]);
	$ext = end($kaboom);
	$picture_2 = $xxx_2.".".$ext;
	$fileTmpLoc = $_FILES["picture_2"]["tmp_name"];
	thumb_that_shii($picture_2, 2, $fileTmpLoc);
	
	if($_FILES["picture_3"]["name"]){
		$kaboom = explode(".", $_FILES["picture_3"]["name"]);
		$ext = end($kaboom);
		$picture_3 = $xxx_3.".".$ext;
		$fileTmpLoc = $_FILES["picture_3"]["tmp_name"];
		thumb_that_shii($picture_3, 3, $fileTmpLoc);
	}	
	
	mysqli_query($cxn, "INSERT INTO poster(postID, postCategory, postSubCategory, postState, postLGA, postTitle, postDescription, postAmount, postNegotiable, postPic1, postPic2, postPic3, postImpression, postReaction, postRequestContactDetails, postUser, postStatus, dateUpdated) VALUES ( NULL, '$category', '$sub_category', '$state', '$lga', '$title', '$details', '$amount', '$negotiable', '$picture_1', '$picture_2', '$picture_3', '0', '0', '0', '$sessionID', 'Under Review', '$dateUpdated')") or die("blom");
	
	
			$to = "support@breeders.ng";
			$subject = "New post to review";

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
			<h4 style='display:inline-block; padding:5px 10px; background:#0C9BBB; margin:2px 0; border-radius:2px; font-weight:100'>Post to review
			</h4>
			</div>
			
			<div style='margin:10px; text-align:left'>
			Post by $sessionName,
			</div>
			
			<div style='margin:10px; padding:10px; background:rgba(0,0,0,.3);'>
				Review $sessionName's $postCategory from $postState<br><br>
			</div>
			
			<a href='https://www.breeders.ng/admin/posts.php?key=$postTitle' style='text-decoration:none;'>			
			<div style='height:20px;background:#0C9BBB;padding:10px;margin:20px;display:inline-block'>Review</div>
			</a>
			
			<div style='margin:10px; text-align:left; font-size:.8em'>
			x
			</div>
						
			<div style='font-size:.7em;background:rgba(0,0,0,.3);padding:20px'>2018 All Rights Reserved. breeders.ng</div>
			</body>
			</html>";
			
			mail($to, $subject, $message, $headers);
	
	
	$sell_error = "Post Added, will be live in a few minutes, undergoing technical review";
		$negotiable = '';
		$details = '';
		$amount = '';
		$amount = '';
		$title = '';
		

}else{
		$sell_error = "Fill form all fields, only a third picture is optional";
}


$seo_title = "breeders - Nigeria's online Pet and Livestock Marketplace";
$seo_description = "Buy and Sell Pet, Livestock, Feed and Accessories on Nigeria's online breeders Marketplace - breeders";
$seo_keywords = "buy, sell, pet, livestock, feed, accessory, nigeria, farm, dog, cat,  goat, sheep, poultry, puppies, horse, cow, chiken, mice, money";
$seo_img = "img/banner.png";
$seo_url = "https://www.breeders.ng";
$seo_author = "breeders";
$seo_date = "$today";

include("services/heads.php");
?>

<?php if($isMobile){////////////////////////////////////// HEADER MOBILE?>

<div style="padding:50px 10px;" align="center">
            <a href="index.php"><h1 style="margin:0">breeders</h1></a>
            <div style="background:url(img/seller-new.png) center right no-repeat; background-size:contain; width:100px; height:100px"></div>
            <h4 style="display:inline-block; padding:5px 10px; background:#0C9BBB; margin:2px 0; border-radius:2px">
            Sell
            </h4><br>
            <a href="dashboard.php"><h4 style="display:inline-block; padding:5px 10px; padding-left:30px; margin:10px; background:#0C9BBB url(img/arrow-previous.png) left center no-repeat; background-size:contain; border-radius:2px">
            Back to dashboard
			</h4></a>   
            </div>



<?php }else{////////////////////////////////////// HEADER DESKTOP?>

<table id="foundation"><tbody><tr valign="top"><td id="cell1">

<div id="res_head">
<table id="wall_table">
	<tr valign="middle">
		<td id="wall_parent" align="center" style="background:rgba(0,0,0,.1)">
	        <div style="padding:50px 10px;">
            <a href="index.php"><h1 style="margin:0">breeders</h1></a>
            <div style="background:url(img/seller-new.png) center right no-repeat; background-size:contain; width:100px; height:100px"></div>
            <a href="pets.php"><h4 style="display:inline-block; padding:5px 10px; background:#0C9BBB; margin:2px 0; border-radius:2px">
            Sell
            </h4></a><br /> 
            <a href="dashboard.php"><h4 style="display:inline-block; padding:5px 10px; padding-left:30px; margin:10px; background:#0C9BBB url(img/arrow-previous.png) left center no-repeat; background-size:contain; border-radius:2px">
            Back to dashboard
			</h4></a>   
            </div>
		</td></tr><tr>        
        <td id="nav_1"><a href="pets.php" title="View our pet collection"><div id="aaa">Pets</div></a></td></tr><tr>
        <td id="nav_2"><a href="livestock.php" title="View our Livestock collection"><div id="aaa">Livestock</div></a></td></tr><tr>
        <td id="nav_3"><a href="feedandstuff.php" title="View our animal Feed and Accessories collection"><div id="aaa">Feed and Stuff</div></a></td>
	</tr>
</table>
</div>


<?php include("services/footer_head.php");?>

<?php }////////////////////////////////////// footer 1 DESKTOP?>






<div style="margin:10px; margin-bottom:50px" align="center">
<div style="padding:20px; margin:20px; background:#F33">
NOTE :<br>
	<?php if ($sell_error) {echo "<br>$sell_error";}?>
</div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
<div style="width:100%; background:rgba(0,0,0,.3); padding:10px 0; margin:10px 0; border-radius:10px">
Your Location:<br>
<select name="state" id="state" style="background:rgba(0,0,0,.2); border:none; height:40px; padding:10px; margin:10px; width:90%">
<option disabled selected>Select State</option><option>Abuja</option><option>Abia</option><option>Adamawa</option><option>Akwa Ibom</option><option>Anambra</option><option>Bauchi</option><option>Bayelsa</option><option>Benue</option><option>Borno</option><option>Cross River</option><option>Delta</option><option>Ebonyi</option><option>Enugu</option><option>Edo</option><option>Ekiti</option><option>Gombe</option><option>Imo</option><option>Jigawa</option><option>Kaduna</option><option>Kano</option><option>Kastina</option><option>Kebbi</option><option>Kogi</option><option>Kwara</option><option>Lagos</option><option>Nasarawa</option><option>Niger</option><option>Ogun</option><option>Ondo</option><option>Osun</option><option>Oyo</option><option>Plateau</option><option>Rivers</option><option>Sokoto</option><option>Taraba</option><option>Yobe</option><option>Zamfara</option>
</select>
<div id="lga_options"></div>
</div>


<div style="width:100%; background:rgba(0,0,0,.3); padding:10px 0; margin:10px 0; border-radius:10px" id="whatToSell">
What do you want to sell:<br>
<select name="category" id="category" style="background:rgba(0,0,0,.2); border:none; height:40px; padding:10px; margin:10px; width:90%"/>
<option disabled selected>Select Category</option><option>Pet</option><option>Livestock</option><option>Feed</option><option>Accessory</option>
</select>
<div id="category_options"></div>
</div>

<div style="width:100%; background:rgba(0,0,0,.3); padding:10px 0; margin:10px 0; border-radius:10px" id="details">
Details<br>
<table style="width:150px;"><tbody><tr style="height:70px; text-align:right; font-size:1.4em" valign="top">
<td style="background:url(img/upload-pic.png) center no-repeat rgba(0,0,0,.3); background-size:contain; border-radius:50%; width:70px" id="picture_1_preview">
</td>
<td style="background:url(img/upload-pic.png) center no-repeat rgba(0,0,0,.3); background-size:contain; border-radius:50%; width:70px" id="picture_2_preview">
</td>
<td style="background:url(img/upload-pic.png) center no-repeat rgba(0,0,0,.3); background-size:contain; border-radius:50%; width:70px" id="picture_3_preview">*
</td>
</tr><tr>
<td style="border-radius:10px; padding:5px">
<input type="file" name="picture_1" id="picture_1" style="width:60px" accept="image/*">
</td>
<td style="border-radius:10px; padding:5px">
<input type="file" name="picture_2" id="picture_2" style="width:60px" accept="image/*">
</td>
<td style="border-radius:10px; padding:5px">
<input type="file" name="picture_3" id="picture_3" style="width:60px" accept="image/*">
</td>
</tr></tbody></table>
<input type="text" name="title" max="40" placeholder="Title" value="<?php echo $title ?>" id="title" style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px; margin:10px; width:85%"/>
<textarea name="details" placeholder="Details" id="details" style="background:rgba(0,0,0,.2); border:none; height:100px; padding:10px; margin:10px; width:85%;
font-family:Tahoma, Geneva, sans-serif;	font-family:myFirstFont;"><?php echo $details ?></textarea>
</div>

<div style="width:100%; background:rgba(0,0,0,.3); padding:10px 0; margin:10px 0; border-radius:10px" id="pricing" align="center">
Pricing<br>
<!--&#8358-->&#x20A6 <input type="number" max="999999999" name="amount" value="<?php echo $amount ?>" placeholder="Amount" id="amount" style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:55%"/>
<table style="width:250px"><tbody><tr valign="middle"><td style="width:50px; padding:5px">Negotiable?
</td><td style="width:50px" align="right">Yes
</td><td style="width:50px">	
<input type="radio" name="negotiable" value="1" <?php if ($negotiable == '1') {echo "checked";}?> id="negotiable" style="background:rgba(0,0,0,.2); border:none; height:20px; width:85%; display:inline-block;"/>
</td><td style="width:50px" align="right">
No
</td><td style="width:50px">
<input type="radio" name="negotiable" <?php if ($negotiable != '1') {echo "checked";}?> value="0" id="negotiable" style="background:rgba(0,0,0,.2); border:none; height:20px; width:20px; display:inline-block;"/>
</td></tr></tbody></table>
</div>
<input type="hidden" name="act" value="Sell">
<input type="submit" value="Sell" style="width:200px; height:50px; background:#0C9BBB; font-size:1em; border:none">
</form>

</div>

<div id="match_screen_width" align="center"></div>
<?php if(!$isMobile){?>
</div>
</td><td id="cell3">
<?php }?>


<?php include("services/footer.php");?>


<?php if(!$isMobile){?></td></tr></tbody></table><?php }?>


<script src="script/leFloat.js"></script>
<script src="script/sellLocation.js"></script>
<script src="script/sellProduct.js"></script>
<script src="script/sellPictures.js"></script>
<?php if(!$isMobile){?><script src="script/res_d.js"></script><?php }?>
</body>
</html>