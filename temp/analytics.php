<?php include("services/xsis.php");

if ($sessionStatus != "on"){
		header("Location: dashboard.php");
}

$seo_title = "Get analytics from your posts - @breedersng";
$seo_description = "Indept  analytics on your posts including impressions, reactions and more";
$seo_keywords = "buy, sell, pet, livestock, feed, accessory, analytics, , reactions, farm, dog, cat,  goat, sheep, poultry, puppies, horse, cow, chiken, mice, money";
$seo_img = "img/banner.png";
$seo_url = "https://www.breeders.ng";
$seo_author = "breeders";
$seo_date = "$today";

include("services/heads.php");
?>



<?php if($isMobile){////////////////////////////////////// HEADER MOBILE?>

<div style="padding:50px 10px;" align="center">
            <a href="index.php"><h1 style="margin:0">breeders</h1></a>
            <div style="background:url(img/seller-analytics.png) center right no-repeat; background-size:contain; width:100px; height:100px"></div>
            <h4 style="display:inline-block; padding:5px 10px; background:#0C9BBB; margin:2px 0; border-radius:2px">
            Analytics
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
	        <div style="">
            <a href="index.php"><h1 style="margin:0">breeders</h1></a>
            <div style="background:url(img/seller-analytics.png) center right no-repeat; background-size:contain; width:100px; height:100px"></div>
            <h4 style="display:inline-block; padding:5px 10px; background:#0C9BBB; margin:2px 0; border-radius:2px">
            Analytics
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




<?php

$date_1 = date("Y-m-d", strtotime("-1 days"));
$date_2 = date("Y-m-d", strtotime("-2 days"));
$date_3 = date("Y-m-d", strtotime("-3 days"));
$date_4 = date("Y-m-d", strtotime("-4 days"));
$date_5 = date("Y-m-d", strtotime("-5 days"));
$date_6 = date("Y-m-d", strtotime("-6 days"));
$date_7 = date("Y-m-d", strtotime("-7 days"));
$date_8 = date("Y-m-d", strtotime("-8 days"));
$date_9 = date("Y-m-d", strtotime("-9 days"));
$date_10 = date("Y-m-d", strtotime("-10 days"));
$date_11 = date("Y-m-d", strtotime("-11 days"));
$date_12 = date("Y-m-d", strtotime("-12 days"));
$date_13 = date("Y-m-d", strtotime("-13 days"));
$date_14 = date("Y-m-d", strtotime("-14 days"));



$sql_max = mysqli_query($cxn, "SELECT MAX(impressionCount) as max FROM impressioner WHERE (dateUpdated = '$dateUpdated' OR dateUpdated = '$date_1' OR dateUpdated = '$date_2' OR dateUpdated = '$date_3' OR dateUpdated = '$date_4' OR dateUpdated = '$date_5' OR dateUpdated = '$date_6' OR dateUpdated = '$date_7' OR dateUpdated = '$date_8' OR dateUpdated = '$date_9' OR dateUpdated = '$date_10' OR dateUpdated = '$date_11' OR dateUpdated = '$date_12' OR dateUpdated = '$date_13' OR dateUpdated = '$date_14') AND impressionUser = '$sessionID' ");
$row_max = mysqli_fetch_assoc($sql_max);
$max = ceil($row_max['max']/10) * 10;
?>

<br>
<div style="background:rgba(0,0,0,.3); margin:10px; padding:10px; font-size:.7em; text-align:right; border-radius:10px">
<table style="text-align:center"><tbody><tr valign="bottom"><td style="height:20px; width:50px;">
<?php echo $max; ?>
<div style="width:7px; background:#FFF; border-radius:1px; height:3px; display:inline-block"></div>
</td><td style="height:20px;">

</td></tr>

<tr valign="bottom"><td style="height:50px; width:20px;">
<?php echo $max/2; ?>
<div style="width:5px; background:#FFF; border-radius:1px; height:3px; display:inline-block"></div>
</td><td style="height:150px; width:250px;" rowspan="2" align="center">
<div style="width:3px; background:#FFF; border-radius:1px; height:<?php 

$sql_date_14 = mysqli_query($cxn, "SELECT impressionCount FROM impressioner WHERE dateUpdated = '$date_14' ");
$row_date_14 = mysqli_fetch_assoc($sql_date_14);
$pull = ($row_date_14['impressionCount']/$max) * 150;
if ($pull == 0){echo 1;} else { echo $pull;}

?>px; margin:0 6px; display:inline-block"></div>
<div style="width:3px; background:#FFF; border-radius:1px; height:<?php 

$sql_date_13 = mysqli_query($cxn, "SELECT impressionCount FROM impressioner WHERE dateUpdated = '$date_13' ");
$row_date_13 = mysqli_fetch_assoc($sql_date_13);
$pull = ($row_date_13['impressionCount']/$max) * 150;
if ($pull == 0){echo 1;} else { echo $pull;}

?>px; margin:0 6px; display:inline-block"></div>
<div style="width:3px; background:#FFF; border-radius:1px; height:<?php 

$sql_date_12 = mysqli_query($cxn, "SELECT impressionCount FROM impressioner WHERE dateUpdated = '$date_12' ");
$row_date_12 = mysqli_fetch_assoc($sql_date_12);
$pull = ($row_date_12['impressionCount']/$max) * 150;
if ($pull == 0){echo 1;} else { echo $pull;}

?>px; margin:0 6px; display:inline-block"></div>
<div style="width:3px; background:#FFF; border-radius:1px; height:<?php 

$sql_date_11 = mysqli_query($cxn, "SELECT impressionCount FROM impressioner WHERE dateUpdated = '$date_11' ");
$row_date_11 = mysqli_fetch_assoc($sql_date_11);
$pull = ($row_date_11['impressionCount']/$max) * 150;
if ($pull == 0){echo 1;} else { echo $pull;}

?>px; margin:0 6px; display:inline-block"></div>
<div style="width:3px; background:#FFF; border-radius:1px; height:<?php 

$sql_date_10 = mysqli_query($cxn, "SELECT impressionCount FROM impressioner WHERE dateUpdated = '$date_10' ");
$row_date_10 = mysqli_fetch_assoc($sql_date_10);
$pull = ($row_date_10['impressionCount']/$max) * 150;
if ($pull == 0){echo 1;} else { echo $pull;}

?>px; margin:0 6px; display:inline-block"></div>
<div style="width:3px; background:#FFF; border-radius:1px; height:<?php 

$sql_date_9 = mysqli_query($cxn, "SELECT impressionCount FROM impressioner WHERE dateUpdated = '$date_9' ");
$row_date_9 = mysqli_fetch_assoc($sql_date_9);
$pull = ($row_date_9['impressionCount']/$max) * 150;
if ($pull == 0){echo 1;} else { echo $pull;}

?>px; margin:0 6px; display:inline-block"></div>
<div style="width:3px; background:#FFF; border-radius:1px; height:<?php 

$sql_date_8 = mysqli_query($cxn, "SELECT impressionCount FROM impressioner WHERE dateUpdated = '$date_8' ");
$row_date_8 = mysqli_fetch_assoc($sql_date_8);
$pull = ($row_date_8['impressionCount']/$max) * 150;
if ($pull == 0){echo 1;} else { echo $pull;}

?>px; margin:0 6px; display:inline-block"></div>
<div style="width:3px; background:#FFF; border-radius:1px; height:<?php 

$sql_date_7 = mysqli_query($cxn, "SELECT impressionCount FROM impressioner WHERE dateUpdated = '$date_7' ");
$row_date_7 = mysqli_fetch_assoc($sql_date_7);
$pull = ($row_date_7['impressionCount']/$max) * 150;
if ($pull == 0){echo 1;} else { echo $pull;}

?>px; margin:0 6px; display:inline-block"></div>
<div style="width:3px; background:#FFF; border-radius:1px; height:<?php 

$sql_date_6 = mysqli_query($cxn, "SELECT impressionCount FROM impressioner WHERE dateUpdated = '$date_6' ");
$row_date_6 = mysqli_fetch_assoc($sql_date_6);
$pull = ($row_date_6['impressionCount']/$max) * 150;
if ($pull == 0){echo 1;} else { echo $pull;}

?>px; margin:0 6px; display:inline-block"></div>
<div style="width:3px; background:#FFF; border-radius:1px; height:<?php 

$sql_date_5 = mysqli_query($cxn, "SELECT impressionCount FROM impressioner WHERE dateUpdated = '$date_5' ");
$row_date_5 = mysqli_fetch_assoc($sql_date_5);
$pull = ($row_date_5['impressionCount']/$max) * 150;
if ($pull == 0){echo 1;} else { echo $pull;}

?>px; margin:0 6px; display:inline-block"></div>
<div style="width:3px; background:#FFF; border-radius:1px; height:<?php 

$sql_date_4 = mysqli_query($cxn, "SELECT impressionCount FROM impressioner WHERE dateUpdated = '$date_4' ");
$row_date_4 = mysqli_fetch_assoc($sql_date_4);
$pull = ($row_date_4['impressionCount']/$max) * 150;
if ($pull == 0){echo 1;} else { echo $pull;}

?>px; margin:0 6px; display:inline-block"></div>
<div style="width:3px; background:#FFF; border-radius:1px; height:<?php 

$sql_date_3 = mysqli_query($cxn, "SELECT impressionCount FROM impressioner WHERE dateUpdated = '$date_3' ");
$row_date_3 = mysqli_fetch_assoc($sql_date_3);
$pull = ($row_date_3['impressionCount']/$max) * 150;
if ($pull == 0){echo 1;} else { echo $pull;}

?>px; margin:0 6px; display:inline-block"></div>
<div style="width:3px; background:#FFF; border-radius:1px; height:<?php 

$sql_date_2 = mysqli_query($cxn, "SELECT impressionCount FROM impressioner WHERE dateUpdated = '$date_2' ");
$row_date_2 = mysqli_fetch_assoc($sql_date_2);
$pull = ($row_date_2['impressionCount']/$max) * 150;
if ($pull == 0){echo 1;} else { echo $pull;}

?>px; margin:0 6px; display:inline-block"></div>
<div style="width:3px; background:#FFF; border-radius:1px; height:<?php 

$sql_date_1 = mysqli_query($cxn, "SELECT impressionCount FROM impressioner WHERE dateUpdated = '$date_1' ");
$row_date_1 = mysqli_fetch_assoc($sql_date_1);
$pull = ($row_date_1['impressionCount']/$max) * 150;
if ($pull == 0){echo 1;} else { echo $pull;}

?>px; margin:0 6px; display:inline-block"></div>
<div style="width:3px; background:#FFF; border-radius:1px; height:<?php 

$sql_date_0 = mysqli_query($cxn, "SELECT impressionCount FROM impressioner WHERE dateUpdated = '$dateUpdated' ");
$row_date_0 = mysqli_fetch_assoc($sql_date_0);
$pull = ($row_date_0['impressionCount']/$max) * 150;
if ($pull == 0){echo 1;} else { echo $pull;}

?>px; margin:0 6px; display:inline-block"></div>
</td></tr>

<tr valign="bottom"><td style="height:50px; width:20px">
<div style="width:3px; background:#FFF; border-radius:1px; height:3px; display:inline-block"></div>
</td></tr>

<tr valign="top"><td style="height:20px; width:20px">
</td><td style="height:20px;" align="center">
<div style="width:3px; background:#F22; border-radius:1px; height:3px; margin:0 6px; margin-bottom:5px; display:inline-block"></div>
<div style="width:3px; background:#F22; border-radius:1px; height:3px; margin:0 6px; margin-bottom:5px; display:inline-block"></div>
<div style="width:3px; background:#F22; border-radius:1px; height:3px; margin:0 6px; margin-bottom:5px; display:inline-block"></div>
<div style="width:3px; background:#F22; border-radius:1px; height:3px; margin:0 6px; margin-bottom:5px; display:inline-block"></div>
<div style="width:3px; background:#F22; border-radius:1px; height:3px; margin:0 6px; margin-bottom:5px; display:inline-block"></div>
<div style="width:3px; background:#F22; border-radius:1px; height:3px; margin:0 6px; margin-bottom:5px; display:inline-block"></div>
<div style="width:3px; background:#F22; border-radius:1px; height:3px; margin:0 6px; margin-bottom:5px; display:inline-block"></div>
<div style="width:3px; background:#F22; border-radius:1px; height:3px; margin:0 6px; margin-bottom:5px; display:inline-block"></div>
<div style="width:3px; background:#F22; border-radius:1px; height:3px; margin:0 6px; margin-bottom:5px; display:inline-block"></div>
<div style="width:3px; background:#F22; border-radius:1px; height:3px; margin:0 6px; margin-bottom:5px; display:inline-block"></div>
<div style="width:3px; background:#F22; border-radius:1px; height:3px; margin:0 6px; margin-bottom:5px; display:inline-block"></div>
<div style="width:3px; background:#F22; border-radius:1px; height:3px; margin:0 6px; margin-bottom:5px; display:inline-block"></div>
<div style="width:3px; background:#F22; border-radius:1px; height:3px; margin:0 6px; margin-bottom:5px; display:inline-block"></div>
<div style="width:3px; background:#F22; border-radius:1px; height:3px; margin:0 6px; margin-bottom:5px; display:inline-block"></div>
<div style="width:3px; background:#F22; border-radius:1px; height:3px; margin:0 6px; margin-bottom:5px; display:inline-block"></div>
</td></tr></tbody></table>
&bull; a 15-day traffic graph for your posts impressions
</div>


<div style="padding:10px">
<div><span style="color:#F22">&bull;</span>
Impression
<div style="font-size:.8em; text-indent:20px">how many times people saw your post</div>
</div>
<div>
<span style="color:#F77">&bull;</span>
Reaction
<div style="font-size:.8em; text-indent:20px">how many times people opened your post</div>
</div>
<div>
<span style="color:#FDD">&bull;</span>
Contact Request
<div style="font-size:.8em; text-indent:20px">how many times people requested your contact details</div>
</div>
</div>

<div style="background:rgba(0,0,0,.3); margin:10px; margin-bottom:50px; padding:10px; text-align:center; font-weight:700; border-radius:10px">

<?php

$sql_poster = mysqli_query($cxn, "SELECT * FROM poster WHERE postUser = '$sessionID' ORDER BY postID ASC LIMIT 20");

while($row_poster=mysqli_fetch_assoc($sql_poster)){
	extract($row_poster);

?>

<table><tbody><tr valign="top">
<td style="width:55%; text-align:left; border-bottom:thin solid #23356C"><?php echo $postTitle ?></td>
<td style="width:15%; border-bottom:2px solid #F22"><?php echo $postImpression ?></td>
<td style="width:15%; border-bottom:2px solid #F77"><?php echo $postReaction ?></td>
<td style="width:15%; border-bottom:2px solid #FDD"><?php echo $postRequestContactDetails ?></td></tr></tbody></table>
<br>

<?php } 

if(mysqli_num_rows($sql_poster) < 1) echo "you have no post";

?>
</div>


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