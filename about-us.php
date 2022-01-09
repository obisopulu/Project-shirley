<?php include("services/xsis.php");

mysqli_query($cxn, "INSERT INTO anonymouser(anonymousID, anonymousIP, anonymousPage, anonymousPlatform, anonymousDevice, anonymousTime, dateUpdated) VALUES (NULL, '$userIP', 'Terms', '$anonymousPlatform', '$anonymousDevice', '$current_time_day','$today')") or die("Home");

if($l=="terms-of-service"){
	$seo_title = "Terms Of Service - breeders Nigeria";
	$seo_description = "Read our terms and conditions of service, Tips and frequently asked questions - breeders";
	$title = "Terms Of Service";
}elseif($l=="privacy-policy"){
	$seo_title = "Privacy Policy - breeders Nigeria";
	$seo_description = "Read our Privacy policy - breeders";
	$title = "Privacy Policy";
}else{
	$seo_title = "About Us - breeders Nigeria";
	$seo_description = "About breeders Nigeria";
	$title = "About Us";
}
$seo_keywords = "buy, sell, pet, livestock, feed, accessory, nigeria, farm, dog, cat,  goat, sheep, poultry, puppies, horse, cow, chiken, mice, money";
$seo_img = "img/banner.png";
$seo_url = "https://www.breeders.ng/terms";
$seo_author = "breeders";
$seo_date = "$today";

include("services/heads.php");
?>


<?php if($isMobile){////////////////////////////////////// HEADER MOBILE?>

<div id="page_div" align="center">
<a href="index.php"><h1>breeders</h1></a>
<div id="page_pic" class="page_pic_t"></div>
<h4 id="page_title" class="breeders"><?php  echo $title ?></h4>
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
<div id="page_pic" class="page_pic_t"></div>
<a href="about-us.php"><h4 id="page_title" class="breeders">
Terms of Service
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

<div id="kbase_body">
<?php 
if($l=="terms-of-service"){
	include("services/terms-of-service.php");
}elseif($l=="privacy-policy"){
	include("services/privacy-policy.php");
}else{?>

<h2>Breeders Nigeria</h2> is an online marketplace for pet and livestock farmers and also for animal feed and accesories sellers
to post their stocks for prospective buyers to browse, contact them and buy.
<p>Our mission is to connect sellers to buyers. sellers connect and sell directly to buyers.</p>
<h4>OUR RULES</h4>
We would want sellers and buyers to understand that;<br />
1. we do not own any of the ads posted.<br />
2. we are not responsible for the quality of buyer's purchase.<br />
3. it is best to transact in a public location.<br />
4. we do not accept payment from  buyers.<br />
5. buyers should confirm the quality of the product/produce before purchase<br />
6. we wish both sellers and buyers all the best.<br />

<center>
<a href="about-us.php?l=privacy-policy" id="page_title" <?php if($l!="privacy-policy") echo "class='breeders'"?>><div>Privacy Policy</div></a>
<a href="about-us.php?l=terms-of-service" id="page_title" <?php if($l!="terms-of-service") echo "class='breeders'"?>><div>Terms Of Service</div></a>
</center>

<?php }?>
</div>

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