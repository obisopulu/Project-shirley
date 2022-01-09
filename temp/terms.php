<?php include("services/xsis.php");

mysqli_query($cxn, "INSERT INTO anonymouser(anonymousID, anonymousIP, anonymousPage, anonymousPlatform, anonymousDevice, anonymousTime, dateUpdated) VALUES (NULL, '$userIP', 'Terms', '$anonymousPlatform', '$anonymousDevice', '$current_time_day','$today')") or die("Home");

$seo_title = "Terms Of Service - breedersng";
$seo_description = "Read our terms and conditions of service, Tips and frequently asked questions - breeders";
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
<a href="terms.php"><h4 id="page_title" class="breeders">
Terms of Service
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
<div id="page_pic" class="page_pic_t"></div>
<a href="terms.php"><h4 id="page_title" class="breeders">
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

<div style="margin:10px; padding:10px; background:rgba(0,0,0,.3);">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
updated Mar 16, 2018.
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