<?php include("services/xsis.php");

if ( (is_int($id) || is_numeric($id)) )
{
	
	$sql_post = mysqli_query($cxn, "SELECT * FROM knowledgebaser WHERE knowledgebaseID = '$id' LIMIT 1 ");
	while($row_post=mysqli_fetch_assoc($sql_post)){extract($row_post);}
	
	mysqli_query($cxn, "INSERT INTO anonymouser(anonymousID, anonymousIP, anonymousPage, anonymousPlatform, anonymousDevice, anonymousTime, dateUpdated) VALUES (NULL, '$userIP', 'k-$knowledgebaseID', '$anonymousPlatform', '$anonymousDevice', '$current_time_day','$today')") or die("Home");

	
}
if(mysqli_num_rows($sql_post) < 1){
	
	$sql_post = mysqli_query($cxn, "SELECT * FROM knowledgebaser ORDER BY knowledgebaseID DESC LIMIT 1 ");
	while($row_post=mysqli_fetch_assoc($sql_post)){extract($row_post);}
	
	mysqli_query($cxn, "INSERT INTO anonymouser(anonymousID, anonymousIP, anonymousPage, anonymousPlatform, anonymousDevice, anonymousTime, dateUpdated) VALUES (NULL, '$userIP', 'k-$knowledgebaseID', '$anonymousPlatform', '$anonymousDevice', '$current_time_day','$today')") or die("Home");
	$error = "requested article not found, check this one out";
	
}


$seo_title = "$knowledgebaseTopic - Knowledge Base - @breedersng";

$seo_description = clean_input3(substr($knowledgebaseBody, 0, 150));
$seo_keywords = "learn, buy, sell, pet, livestock, feed, accessory, nigeria, farm, dog, cat,  goat, sheep, poultry, puppies, horse, cow, chiken, mice, money";
$seo_img = "img/banner.png";
$seo_url = "https://www.breeders.ng";
$seo_author = "breeders";
$seo_date = "$today";

 include("services/heads.php");
?>


<?php if($isMobile){////////////////////////////////////// HEADER MOBILE?>

<div id="preview_header">
<a href="index.php"><h1>breeders</h1></a>
</div>

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
<div id="page_pic" class="page_pic_k"></div>
<a href="knowledgebase.php"><h4 id="page_title" class="breeders">
Knowledge Base
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



<?php 

	if ($error){
		
		echo "<div id='kbase_error'>$error</div>";
				
	}
	
?>


<table><tbody><tr><td>
<img src="knowledgebaseimg/<?php echo $knowledgebasePicture; ?>">
</td></tr><tr>
    <td id="kbase_td">
    	<h3><?php echo $knowledgebaseTopic; ?></h3>
<?php
$sql_average = mysqli_query($cxn, "SELECT AVG(ratingAmount) as averaged FROM rater WHERE ratingPost = 'k-$knowledgebaseID' ");
$row_average = mysqli_fetch_assoc($sql_average);
$average = round($row_average['averaged']);

$sql_all = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM rater WHERE ratingPost = 'k-$knowledgebaseID' ")) * 1;

?>
<span id="rater">
<div onClick="rate('1')" id="rate<?php if($average <1 )echo "_not"; ?>1"></div>
<div onClick="rate('2')" id="rate<?php if($average <2 )echo "_not"; ?>1"></div>
<div onClick="rate('3')" id="rate<?php if($average <3 )echo "_not"; ?>1"></div>
<div onClick="rate('4')" id="rate<?php if($average <4 )echo "_not"; ?>1"></div>
<div onClick="rate('5')" id="rate<?php if($average <5 )echo "_not"; ?>1"></div>
<span id="rate_count">(<?php echo $sql_all; ?>)</span>
</span>
    </td>
  </tr>
</table>

<div class="sharethis-inline-share-buttons"></div>
<div id="kbase_body">
<?php echo $knowledgebaseBody; ?>
<br><br>

        <a href="<?php echo $knowledgebaseSourceLink; ?>" target="_blank"><h5><?php echo $knowledgebaseSource; ?> > </h5></a>
        <h5><?php echo date("D M jS, Y", strtotime($dateUpdated));?></h5>

<?php $views = mysqli_num_rows(mysqli_query($cxn, "SELECT anonymousPage FROM anonymouser WHERE anonymousPage = 'k-$knowledgebaseID'"));

if ($views) {echo "<h5>read by $views</h5>";}

$jsPostID = "k-".$knowledgebaseID;
echo "<span id='jsPostID'>$jsPostID</span>";


$theID = $knowledgebaseID;
?>
</div>

<?php
$sql_previous1 = mysqli_query($cxn, "SELECT knowledgebaseID, knowledgebaseTopic FROM knowledgebaser WHERE knowledgebaseID < $theID ORDER BY knowledgebaseID DESC LIMIT 1");
while($sql_previous=mysqli_fetch_assoc($sql_previous1)){
	extract($sql_previous);
$linkTitle = $postTitle;
$linkTitle = clean_input2($linkTitle);
$link = strtolower("article/".$knowledgebaseID."/".$knowledgebaseTopic);
$link_temp = strtolower("article.php?id=".$knowledgebaseID);
}
?>


<table><tbody><tr><td id="kbase_prev">
	<?php if (mysqli_num_rows($sql_previous1) > 0) {?><a href="<?php echo $link_temp; ?>"><li id="pagination"><?php echo $knowledgebaseTopic; ?><br />previous-</li></a><?php } ?>
</td><td id="kbase_next">

<?php
$sql_next1 = mysqli_query($cxn, "SELECT knowledgebaseID, knowledgebaseTopic FROM knowledgebaser WHERE knowledgebaseID > $theID ORDER BY knowledgebaseID ASC LIMIT 1");

while($sql_next=mysqli_fetch_assoc($sql_next1)){
	extract($sql_next);
$linkTitle = $postTitle;
$linkTitle = clean_input2($linkTitle);
$link = strtolower("article/".$knowledgebaseID."/".$knowledgebaseTopic);
$link_temp = strtolower("article.php?id=".$knowledgebaseID);
}
?>
	<?php if (mysqli_num_rows($sql_next1) > 0) {?><a href="<?php echo $link_temp; ?>"><li id="pagination"><?php echo $knowledgebaseTopic; ?><br />-next</li></a><?php } ?>
</td></tr></tbody>




<br><br>
<center>
<table id="kbase_rate_this_table"><tbody><tr valign="middle"><td id="kbase_rate_this_td" align="right">rate this post : </td><td align="left">	
	<div id="rate_not1" onClick="rate('1')"></div>
    <div id="rate_not1" onClick="rate('2')"></div>
    <div id="rate_not1" onClick="rate('3')"></div>
    <div id="rate_not1" onClick="rate('4')"></div>
    <div id="rate_not1" onClick="rate('5')"></div>
</td></tr><tr><td id="rated" colspan="2"></td></tbody></table>
</center>
<br>

<div id="match_screen_width" align="center" class="breeder1">
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
<script src="script/rate.js"></script>
<?php if(!$isMobile){?><script src="script/res_d.js"></script><?php }?>
</body>
</html>