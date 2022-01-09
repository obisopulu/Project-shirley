<?php 

include("services/xsis.php");

if ($sessionStatus != "on"){
		header("Location: dashboard.php");
}
	mysqli_query($cxn, "INSERT INTO anonymouser(anonymousID, anonymousIP, anonymousPage, anonymousPlatform, anonymousDevice, anonymousTime, dateUpdated) VALUES (NULL, '$userIP', 'posts - $sessionID', '$anonymousPlatform', '$anonymousDevice', '$current_time_day','$today')") or die("Home");

if($_SERVER["REQUEST_METHOD"] == "GET" && $del){
	
	mysqli_query($cxn, "DELETE FROM poster WHERE postID = '$del' LIMIT 1");
	header("Location: posts.php");
	
}
if($_SERVER["REQUEST_METHOD"] == "GET" && $sold){
	
	mysqli_query($cxn, "UPDATE poster SET postStatus = 'Sold' WHERE postID = '$sold' LIMIT 1");
	header("Location: posts.php");
	
}

$seo_title = "breeders - Nigeria's online Pet and Livestock Marketplace - @breedersng";
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
            <div style="background:url(img/seller-posts.png) center right no-repeat; background-size:contain; width:100px; height:100px"></div>
            <h4 style="display:inline-block; padding:5px 10px; background:#0C9BBB; margin:2px 0; border-radius:2px">
            Your Posts
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
            <div style="background:url(img/seller-posts.png) center right no-repeat; background-size:contain; width:100px; height:100px"></div>
            <h4 style="display:inline-block; padding:5px 10px; background:#0C9BBB; margin:2px 0; border-radius:2px">
            Your Posts
            </h4><br />
            <a href="dashboard.php"><h4 style="display:inline-block; padding:5px 10px; padding-left:30px; margin:10px; background:#0C9BBB url(img/arrow-previous.png) left center no-repeat; background-size:contain; border-radius:2px">
            Back to dashboard
			</h4></a>   
            </div>
		</td></tr><tr>
        <td id="nav_1"><a href="pets.php" title="View our pet collection"><div id="aaa">Pets</div></a></td></tr><tr>
        <td id="nav_2"><a href="livestock.php" title="View our Livestock collection"><div id="aaa">Livestock</div></a></td></tr><tr>
        <td id="nav_3"><a href="feedandstuff.php" title="View our animal Feed and Accessories collection"><div id="aaa">Feed and Stuff</div></a></td>	</tr>
</table>
</div>


<?php include("services/footer_head.php");?>

<?php }////////////////////////////////////// footer 1 DESKTOP?>





<div style="padding:10px; margin:10px; border-radius:10px">

<?php
$sql_poster = mysqli_query($cxn, "SELECT * FROM poster WHERE postUser = '$sessionID' ORDER BY postID DESC LIMIT 20");
$counter = 0;
while($row_poster=mysqli_fetch_assoc($sql_poster)){
	extract($row_poster);
?>


<div style="background:rgba(0,0,0,.3); padding:10px; margin-bottom:10px" align="left">
<h4 style="margin:0"><?php echo $postTitle; ?></h4>
<h5><span id="negotiable<?php if ($postCategory == "Pet"){?>_pets<?php }elseif ($postCategory == "Livestock"){?>_livestock<?php }elseif ($postCategory == "Feed" || $postCategory == "Accessory"){?>_feedandstuff<?php }else{}?>"><?php echo $postCategory; ?></span> 
<span id="negotiable">- <?php echo $postStatus; ?> -</span> 
Added: <?php echo date("D M jS, Y", strtotime($dateUpdated));?></h5></a>

<div align="center" style="margin-top:10px">
<div style="width:19.5%" id="post_buttons" onClick="boostPost('<?php echo $counter."', '".$postID; ?>')" class="boostPost">Boost</div>
<div style="width:19.5%" id="post_buttons" onClick="sharePost('<?php echo $counter."', '".$postID; ?>')" class="sharePost">Share</div>
<div style="width:19.5%" id="post_buttons" onClick="soldPost('<?php echo $counter."', '".$postID; ?>')" class="soldPost">Sold</div>
<div style="width:19.5%" id="post_buttons" onClick="removePost('<?php echo $counter."', '".$postID; ?>')" class="removePost">Remove</div>

<div class="boostPostOptions" style="display:none;" align="left">
Boost this post to reach more prospective buyers <br>
<div id="negotiable_pets" onClick="boostPostYes('<?php echo $postID; ?>')" style="margin-top:5px">1 Week<br />&#x20A6 1000</div>
<div id="negotiable_livestock" onClick="boostPostYes('<?php echo $postID; ?>')" style="margin-top:5px">2 Weeks<br />&#x20A6 1500</div>
<div id="negotiable_feedandstuff" onClick="boostPostYes('<?php echo $postID; ?>' style="margin-top:5px" style="margin-top:5px")">&nbsp;1 Month<br />&#x20A6 3000&nbsp;</div>
</div>

<div class="sharePostOptions" style="display:none" align="center">
share post on social media : <br>
    <a href="https://www.facebook.com/breedersng">
    <div style="background:url(img/sn-fb.png) center right no-repeat; background-size:contain; width:40px; height:40px; display:inline-block; margin-top:5px"></div>
    </a><a href="https://www.twitter.com/breedersng">
    <div style="background:url(img/sn-tw.png) center right no-repeat; background-size:contain; width:40px; height:40px; display:inline-block; margin-top:5px"></div>
    </a><a href="https://www.instagram.com/breedersng">
    <div style="background:url(img/sn-ig.png) center right no-repeat; background-size:contain; width:40px; height:40px; display:inline-block; margin-top:5px"></div>
    </a><a href="https://www.instagram.com/breedersng">
    <div style="background:url(img/sn-ig.png) center right no-repeat; background-size:contain; width:40px; height:40px; display:inline-block; margin-top:5px"></div>
    </a><a href="https://www.instagram.com/breedersng">
    <div style="background:url(img/sn-ig.png) center right no-repeat; background-size:contain; width:40px; height:40px; display:inline-block; margin-top:5px"></div>
    </a><a href="https://www.instagram.com/breedersng">
    <div style="background:url(img/sn-ig.png) center right no-repeat; background-size:contain; width:40px; height:40px; display:inline-block; margin-top:5px"></div>
    </a><br>
	<span id="post_buttons" onClick="optionCancel()">Back</span>
</div>
<div class="soldPostOptions" style="display:none" align="center">
have you sold this <?php echo $postCategory; ?>?<br>
<span id="post_buttons" onClick="soldPostYes('<?php echo $postID; ?>')">Yes</span>&nbsp;&nbsp;
<span id="post_buttons" onClick="optionCancel()">No</span>
</div>
<div class="removePostOptions" style="display:none" align="right">
Remove Post?<br>
<span id="post_buttons" onClick="removePostYes('<?php echo $postID; ?>')">Yes</span>&nbsp;&nbsp;
<span id="post_buttons" onClick="optionCancel()">Cancel</span>
</div>
</div>
</div>

<?php $counter++; } ?>



</div>


<div id="match_screen_width" align="center"></div>
<?php if(!$isMobile){?>
</div>
</td><td id="cell3">
<?php }?>


<?php include("services/footer.php");?>


<?php if(!$isMobile){?></td></tr></tbody></table><?php }?>


<script src="script/leFloat.js"></script>
<script src="script/posts.js"></script>
<?php if(!$isMobile){?><script src="script/res_d.js"></script><?php }?>
</body>
</html>