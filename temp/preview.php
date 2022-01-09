<?php include("services/xsis.php");

if ( (is_int($id) || is_numeric($id)))
{
	
	$sql_post = mysqli_query($cxn, "SELECT * FROM poster WHERE postID = '$id' LIMIT 1 ");
	while($row_post=mysqli_fetch_assoc($sql_post)){extract($row_post);}
	
	$sql_reaction = mysqli_query($cxn, "UPDATE poster SET postReaction = postReaction + 1 WHERE postID = '$id' ");
	
	$cat = $postCategory;
	
	$author = mysqli_query($cxn, "SELECT sellerName FROM seller WHERE sellerID = '$postUser' LIMIT 1 ");
	while($author=mysqli_fetch_assoc($author)){extract($author);};
}
if(mysqli_num_rows($sql_post) < 1){
	$sql_post = mysqli_query($cxn, "SELECT * FROM poster ORDER BY postID DESC LIMIT 1 ");
	while($row_post=mysqli_fetch_assoc($sql_post)){extract($row_post);}
	
	$sql_reaction = mysqli_query($cxn, "UPDATE poster SET postReaction = postReaction + 1 WHERE postID = '$id' ");
	
	$cat = $postCategory;
	
	$author = mysqli_query($cxn, "SELECT sellerName FROM seller WHERE sellerID = '$postUser' LIMIT 1 ");
	while($author=mysqli_fetch_assoc($author)){extract($author);};
	$error = "requested post not found, check this one out";
}

mysqli_query($cxn, "INSERT INTO anonymouser(anonymousID, anonymousIP, anonymousPage, anonymousPlatform, anonymousDevice, anonymousTime, dateUpdated) VALUES (NULL, '$userIP', 'p-$postID', '$anonymousPlatform', '$anonymousDevice', '$current_time_day','$today')") or die("Home");

$seo_title = "$postTitle on breeders @breedersng";
$seo_description = clean_input3(substr($knowledgebaseBody, 0, 150));
$seo_description = ". Buy $postTitle on Nigeria's online breeders Marketplace - breeders";
$seo_keywords = "buy, sell, pet, livestock, feed, accessory, nigeria, farm, dog, cat,  goat, sheep, poultry, puppies, horse, cow, chiken, mice, money";
$seo_img = "postsimg/$postPic1";
$seo_url = "https://www.breeders.ng/$postID/$postitle";//*************************************************************************
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
<div id="page_pic" 
<?php if ($postCategory == "Pet"){?>
class="page_pic_p"></div>
<a href="pets.php"><h4 id="page_title" class="pets">
Pets
<?php }elseif ($postCategory == "Livestock"){?>
class="page_pic_l"></div>
<a href="livestock.php"><h4 id="page_title" class="livestock">
Livestock    
<?php }else{?>
class="page_pic_f"></div>
<a href="feedandstuff.php"><h4 id="page_title" class="feedandstuff">
Feed and Stuff
<?php }?>  
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


<div id="match_screen_width" align="center">

<table id="preview_pic_table"><tbody><tr><td>
<img src="postimg/<?php echo $postPic1 ?>" id="preview_pic"></td><td>
<img src="postimg/<?php echo $postPic2 ?>" id="preview_pic"></td><?php if($postPic3 ){?><td>
<img src="postimg/<?php echo $postPic3 ?>" id="preview_pic"></td><?php } ?></tr></tbody></table>

</div>

<div align="center">
<div id="preview_pic_marker"></div>
<div id="preview_pic_marker"></div>
<?php if($postPic3){ echo "<div id='preview_pic_marker'></div>";} ?>
</div>

<?php 
$jsPostID = $postID;
echo "<span id='jsPostID'>$jsPostID</span>";

$sql_average = mysqli_query($cxn, "SELECT AVG(ratingAmount) as averaged FROM rater WHERE ratingPost = '$postID' ");
$row_average = mysqli_fetch_assoc($sql_average);
$average = round($row_average['averaged']);

$sql_all = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM rater WHERE ratingPost = '$postID' ")) * 1;

?>
<h3 id="preview_title"><?php echo $postTitle ?><br><br>
<span id="rater">
<div onClick="rate('1')" id="rate<?php if($average <1 )echo "_not"; ?>1"></div>
<div onClick="rate('2')" id="rate<?php if($average <2 )echo "_not"; ?>1"></div>
<div onClick="rate('3')" id="rate<?php if($average <3 )echo "_not"; ?>1"></div>
<div onClick="rate('4')" id="rate<?php if($average <4 )echo "_not"; ?>1"></div>
<div onClick="rate('5')" id="rate<?php if($average <5 )echo "_not"; ?>1"></div>
<span id="rate_count">(<?php echo $sql_all; ?>)</span>
</span>
        <h3 id="preview_amount">&#x20A6 <?php echo $postAmount; if($postNegotiable == "1" ){ ?> <span id="negotiable<?php if ($postCategory == "Pet"){echo"_pets"; }elseif ($postCategory == "Livestock"){echo"_livestock"; }elseif ($postCategory == "Feed" || $postCategory == "Accessory"){ echo"_feedandstuff";}else{}?>">negotiable</span><?php } ?></h3>

    <div id="preview_location"> <?php echo $postLGA ?>, <?php echo $postState ?></div>
    
    <div class="sharethis-inline-share-buttons"></div>
        
	<div id="preview_body">
		<?php echo $postDescription ?>
	</div>

        <center>
        <div class="<?php if ($postCategory == "Pet"){?>pets<?php }elseif ($postCategory == "Livestock"){?>livestock<?php }elseif ($postCategory == "Feed" || $postCategory == "Accessory"){?>feedandstuff<?php }else{?>breeders<?php }?>"id="sellerContact">
			get seller's contact details
		</div>
        </center>
<?php            
$sql_contact = mysqli_query($cxn, "SELECT * FROM seller WHERE sellerID = '$postUser' LIMIT 1 ");
while($row_contact=mysqli_fetch_assoc($sql_contact)){extract($row_contact);}
?>
<center>
			<div id="sellerContactDetails">
                <table><tbody>
                <tr><td><?php echo $sellerName ?></td></tr>
                <tr><td><h2><?php echo $sellerPhone ?></h2></td></tr>
                </tbody></table>
                
                <?php if($isMobile){?><a href="tell:<?php echo $sellerPhone ?>">
                <div id="call_seller">Call</div></a><?php }?>
                
            </div>
</center>
</h3>

<br>
<div id="inpost_ad"></div>
<br>


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

<div id="note">
NOTE :<br>
	Ensure the Cargo is in good condition before you pay.
</div>

<br>
<h4 id="sub_heading">you may also like:</h4>
<?php
	$counter = 1;
$sql_poster = mysqli_query($cxn, "SELECT * FROM poster WHERE postStatus = 'Live' AND postCategory = '$postCategory' AND postID != '$jsPostID' ORDER BY RAND() LIMIT 5");

if(mysqli_num_rows($sql_poster) * 1 < 2) {$sql_poster = mysqli_query($cxn, "SELECT * FROM poster WHERE postStatus = 'Live' AND postID != '$jsPostID' ORDER BY RAND() LIMIT 5");}

while($row_poster=mysqli_fetch_assoc($sql_poster)){
	extract($row_poster);
$linkTitle = $postTitle;
$linkTitle = clean_input2($linkTitle);
$link = strtolower($postCategory."/".$postID."/".$linkTitle);
$link_temp = strtolower("preview.php?cat=".$postCategory."&id=".$postID);
?>

<a href="<?php echo $link_temp; ?>">
<table id="post_table">
  <tr valign="top">
    <td id="post_td_pic">
    	<div id="post_pic" style="background-image:url(postimg-thumbs/<?php echo "t-".$postPic1?>)" align="right">
        	<?php //<div id="verified"></div> ?>
        </div>
	</td>
    <td id="post_td_<?php if(!$isMobile){?>desk<?php }?>">
    	<h4 id="post_h4"><?php echo $postTitle ?></h4>
        <h5><!--&#8358-->&#x20A6 <?php echo "$postAmount";?><?php if ($postNegotiable == 1){?>&nbsp;<span id="negotiable<?php if ($postCategory == "Pet"){echo"_pets"; }elseif ($postCategory == "Livestock"){echo"_livestock"; }elseif ($postCategory == "Feed" || $postCategory == "Accessory"){ echo"_feedandstuff";}else{}?>">negotiable</span><?php }?></h5>
        <h5><?php echo "$postLGA, $postState"?></h5>
        <?php 
		$sql_average = mysqli_query($cxn, "SELECT AVG(ratingAmount) as averaged FROM rater WHERE ratingPost = '$postID' ");
		$row_average = mysqli_fetch_assoc($sql_average);
		$average = round($row_average['averaged']);
		
		$sql_all = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM rater WHERE ratingPost = '$postID' ")) * 1;
		 if ($average > 0) { ?>
        <div onClick="rate('1')" id="rate<?php if($average <1 )echo "_not"; ?>"></div>
        <div onClick="rate('2')" id="rate<?php if($average <2 )echo "_not"; ?>"></div>
        <div onClick="rate('3')" id="rate<?php if($average <3 )echo "_not"; ?>"></div>
        <div onClick="rate('4')" id="rate<?php if($average <4 )echo "_not"; ?>"></div>
        <div onClick="rate('5')" id="rate<?php if($average <5 )echo "_not"; ?>"></div>
        <span id="rate_count">(<?php echo $sql_all; ?>)</span>
        <?php }
		
$sql_impress = mysqli_query($cxn, "SELECT * FROM impressioner WHERE impressionUser = '$postUser' AND dateUpdated = '$today' ") or die();

if(mysqli_num_rows($sql_impress) < 1){
	$sql_impress = mysqli_query($cxn, "INSERT INTO impressioner(impressionID, impressionUser, impressionCount, dateUpdated) VALUES ( NULL, '$postUser', '1', '$today') ");
}else{
	mysqli_query($cxn, "UPDATE impressioner SET impressionCount = impressionCount + 1 WHERE impressionUser = '$postUser' AND dateUpdated = '$today' ") or die('xxx');
}
	$sql_impresser = mysqli_query($cxn, "UPDATE poster SET postImpression = postImpression + 1 WHERE postID = '$postID' ");	
		?>
    </td><?php if(!$isMobile){?><td id="post_td_desc">
    	<?php echo clean_input3(substr($postDescription, 0, 500)); ?>
    </td><?php }?>
  </tr>
</table>
</a>
<?php }?>


<?php if(!$isMobile){?>
</div>
</td><td id="cell3">
<?php }?>


<?php include("services/footer.php");?>


<?php if(!$isMobile){?></td></tr></tbody></table><?php }?>



<script src="script/leFloat.js"></script>
<script src="script/rate.js"></script>
<script src="script/contactDetails.js"></script>
<?php if(!$isMobile){?><script src="script/res_d.js"></script><?php }?>
</body>
</html>