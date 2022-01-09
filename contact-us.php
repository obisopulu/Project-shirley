<?php include("services/xsis.php");

mysqli_query($cxn, "INSERT INTO anonymouser(anonymousID, anonymousIP, anonymousPage, anonymousPlatform, anonymousDevice, anonymousTime, dateUpdated) VALUES (NULL, '$userIP', 'Contact', '$anonymousPlatform', '$anonymousDevice', '$current_time_day','$today')") or die("Home");

if($xxx && $_SERVER["REQUEST_METHOD"] == "POST" && $name && $email && $message){
	
	$name = clean_input($name);
	$name = addcslashes(mysqli_real_escape_string($cxn, $name), '@%_&#*!()');
	$email = clean_input($email);
	$email = addcslashes(mysqli_real_escape_string($cxn, $email), '@%_&#*!()');
	$messaged = clean_input($message);
	$messaged = addcslashes(mysqli_real_escape_string($cxn, $message), '@%_&#*!()');
	
	mysqli_query($cxn, "INSERT INTO feedbacker(feedbackID, feedbackName, feedbackEmail, feedbackTopic, feedbackMessage, dateUpdated) VALUES ( NULL, '$name', '$email', '$topic', '$messaged', '$dateUpdated')") or die("xxx");
	
	$to = "support@breeders.ng";
	$subject = "Customer Feedback";

	$headers = "Organisation: Breeders Nigeria\r\n";	
	$headers .= "From: support@breeders.ng\r\n";
	$headers .= "Reply-To: support@breeders.ng\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$headers .= "X-Priority: 3\r\n";
	$headers .= "X-Mailer: PHP ".phpversion()."\r\n";
	
	$message = "<html><body style='padding:0;margin:0;font-size:1em;background:#23356C;font-family:Tahoma, Geneva, sans-serif;color:#FFF;border-collapse:collapse;font-weight:100'>";
	$message .= "<div style='background:#23356C'><div style='background:rgba(0,0,0,.4); padding:50px 10px'><a href='breeders.ng' style='text-decoration:none;'><h1 style='margin:0; color:#FFF; font-weight:100'>breeders</h1></a><h4 style='display:inline-block; padding:5px 10px; background:#0C9BBB; margin:2px 0; border-radius:2px; font-weight:100'>Feedback Message from $name on $topic</h4></div><div style='margin:10px; padding:10px; background:rgba(0,0,0,.3); margin-bottom:50px'>";
	$message .= $messaged;
	$message .= "<br><br><br><a href='https://www.breeders.ng/admin/mailer.php' style='text-decoration:none; color:#FFF'><div style='height:20px;background:#0C9BBB;padding:10px;margin:5px 0;display:inline-block'>Go to breeders</div></a><div style='font-size:.7em;padding:10px 0;background:rgba(0,0,0,.3); text-align:center'>2018 All Rights Reserved. breeders.ng</div>";
	$message .= "</div></body></html>";
	
	mail($to, $subject, $message, $headers);
	
	$msg = "Feedback sent, we will reply you ASAP!!";
	
}


$seo_title = "Customer Care - breedersng";
$seo_description = "contact us about complaints, enquires, suggestions on Nigeria's online breeders Marketplace - breeders";
$seo_keywords = "buy, sell, pet, livestock, feed, accessory, nigeria, farm, dog, cat,  goat, sheep, poultry, puppies, horse, cow, chiken, mice, money";
$seo_img = "img/banner.png";
$seo_url = "https://www.breeders.ng/contact-us";
$seo_author = "breeders";
$seo_date = "$today";

 include("services/heads.php");
?>




<?php if($isMobile){////////////////////////////////////// HEADER MOBILE?>

<div id="page_div" align="center">
<a href="index.php"><h1>breeders</h1></a>
<div id="page_pic" class="page_pic_c"></div>
<a href="contatc-us.php"><h4 id="page_title" class="breeders">
Contact Us
</h4></a>
</div>

<center>
<form method="get" action="search.php" >
<table id="wall_search_table"><tr><td>
<input type="search" id="wall_search" placeholder="search..." name="q" align="top" required/></td><td>
<input type="submit" id="search_button" value=""></td></tr></table>
</form>
</center>

<div id="page_nav_div">
<table id="page_nav_table"><tr>
<td id="page_nav_1"><a href="pets.php"><div>Pets</div></a></td>
<td id="page_nav_2"><a href="livestock.php"><div>Livestock</div></a></td>
<td id="page_nav_3"><a href="feedandstuff.php"><div>Feed and Stuff</div></a></td>
<td id="page_nav_4"><a href="knowledgebase.php"><div>Knowledge Base</div></a></td>
</tr></table>
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
<div id="page_pic" class="page_pic_c"></div>
<a href="contact-us.php"><h4 id="page_title" class="breeders">
Contact Us
</h4></a>
<form method="get" action="search.php" >
<table id="wall_search_table"><tr><td>
<input type="search" id="wall_search" placeholder="search..." name="q" align="top" required/></td><td>
<input type="submit" id="search_button" value=""></td></tr></table>
</form>
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

<div id="match_screen_width" class="breeders1" align="center">
<table id="scroller_table"><tr>
<?php 
$sql_frame = mysqli_query($cxn, "SELECT DISTINCT postSubCategory FROM poster WHERE postSubCategory != '' ORDER BY RAND() LIMIT 10");
while($sql_frame1 = mysqli_fetch_assoc($sql_frame)){extract($sql_frame1);?>
	<td align="center" id="scroller_td"><a href="search.php?q=<?php echo "$postSubCategory";?>"><div id="category_mini" style="background-image:url(img/frame-<?php echo "$postSubCategory";?>.jpg)"></div></a>
                  <?php echo "$postSubCategory";?> </td>
<?php } ?>
</tr></table>
</div>

<div  id="contact_div" align="center">
<div  id="contact_msg"><?php if($msg){echo $msg;}else{?>*we reply in seconds or at most minutes <?php } ?></div>
<form method="post" <?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>>
<input type="name" required placeholder="name" name="name" id="contact_input" value="<?php echo $sessionName?>" align="top"/>
<input type="email" required placeholder="email"  name="email" id="contact_input" value="<?php echo $sessionEmail?>" align="top"/>
<input type="name" required placeholder="Topic" name="topic" value="" id="contact_input" align="top"/>
<textarea placeholder="message" required name="message" id="contact_message" align="top"></textarea>
<input type="submit" name="xxx" value="Send Feedback"  id="contact_submit">
</form>
</div>

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