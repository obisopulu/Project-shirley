<?php include("services/xsis.php");

if( $q || $search ){
	
$search = clean_input($search);
$q = clean_input($q);

if ($q){$search = $q;}
	
if ($category == "All"){
	$cat_query = "";
}else{
	$cat_query = "AND postCategory = '$category'";
}

if ($state == "ng"){
	$state_query = "";
}else{
	$state_query = "AND postState = '$state'";
}

if ($sub_category == "any" || $sub_category == ""){
	$sub_category_query = "";
}else{
	$sub_category_query = "AND postSubCategory = '$sub_category'";
}

if ($lga == "any" || $lga == ""){
	$lga_query = "";
}else{
	$lga_query = "AND postLGA = '$lga'";
}

$key=explode(' ',$search);

if (strlen($key[0]) > 2){$w1 = trim($key[0]);}else{$w1 = 'uselessrg';}
if (strlen($key[1]) > 2){$w2 = trim($key[1]);}else{$w2 = 'uselessrg';}
if (strlen($key[2]) > 2){$w3 = trim($key[2]);}else{$w3 = 'uselessrg';}
if (strlen($key[3]) > 2){$w4 = trim($key[3]);}else{$w4 = 'uselessrg';}
if (strlen($key[4]) > 2){$w5 = trim($key[4]);}else{$w5 = 'uselessrg';}
if (strlen($key[5]) > 2){$w6 = trim($key[5]);}else{$w6 = 'uselessrg';}
if (strlen($key[6]) > 2){$w7 = trim($key[6]);}else{$w7 = 'uselessrg';}
if (strlen($key[7]) > 2){$w8 = trim($key[7]);}else{$w8 = 'uselessrg';}

if($q){
$sql_poster = mysqli_query ($cxn, "SELECT * FROM poster WHERE
postTitle LIKE '%$w1%' OR postDescription LIKE '%$w1%' OR postCategory LIKE '%$w1%' OR postSubCategory LIKE '%$w1%' OR postState LIKE '%$w1%' OR postLGA LIKE '%$w1%' OR 
postTitle LIKE '%$w2%' OR postDescription LIKE '%$w2%' OR postCategory LIKE '%$w2%' OR postSubCategory LIKE '%$w2%' OR postState LIKE '%$w2%' OR postLGA LIKE '%$w2%' OR 
postTitle LIKE '%$w3%' OR postDescription LIKE '%$w3%' OR postCategory LIKE '%$w3%' OR postSubCategory LIKE '%$w3%' OR postState LIKE '%$w3%' OR postLGA LIKE '%$w3%' OR 
postTitle LIKE '%$w4%' OR postDescription LIKE '%$w4%' OR postCategory LIKE '%$w4%' OR postSubCategory LIKE '%$w4%' OR postState LIKE '%$w4%' OR postLGA LIKE '%$w4%' OR 
postTitle LIKE '%$w5%' OR postDescription LIKE '%$w5%' OR postCategory LIKE '%$w5%' OR postSubCategory LIKE '%$w5%' OR postState LIKE '%$w5%' OR postLGA LIKE '%$w5%' OR 
postTitle LIKE '%$w6%' OR postDescription LIKE '%$w6%' OR postCategory LIKE '%$w6%' OR postSubCategory LIKE '%$w6%' OR postState LIKE '%$w6%' OR postLGA LIKE '%$w6%' OR 
postTitle LIKE '%$w7%' OR postDescription LIKE '%$w7%' OR postCategory LIKE '%$w7%' OR postSubCategory LIKE '%$w7%' OR postState LIKE '%$w7%' OR postLGA LIKE '%$w7%' OR 
postTitle LIKE '%$w8%' OR postDescription LIKE '%$w8%' OR postCategory LIKE '%$w8%' OR postSubCategory LIKE '%$w8%' OR postState LIKE '%$w8%' OR postLGA LIKE '%$w8%' ");
}else{

$sql_poster = mysqli_query ($cxn, "SELECT * FROM poster WHERE (
postTitle LIKE '%$w1%' OR postDescription LIKE '%$w1%' OR 
postTitle LIKE '%$w2%' OR postDescription LIKE '%$w2%' OR 
postTitle LIKE '%$w3%' OR postDescription LIKE '%$w3%' OR 
postTitle LIKE '%$w4%' OR postDescription LIKE '%$w4%' OR 
postTitle LIKE '%$w5%' OR postDescription LIKE '%$w5%' OR 
postTitle LIKE '%$w6%' OR postDescription LIKE '%$w6%' OR 
postTitle LIKE '%$w7%' OR postDescription LIKE '%$w7%' OR 
postTitle LIKE '%$w8%' OR postDescription LIKE '%$w8%'
) $cat_query $state_query $sub_category_query $lga_query ") or die("sad");
	}
$search_result_amount =  mysqli_num_rows($sql_poster) * 1;
}

if($search){$tagger = "Search - $search"; }else{$tagger = "Search";}
mysqli_query($cxn, "INSERT INTO anonymouser(anonymousID, anonymousIP, anonymousPage, anonymousPlatform, anonymousDevice, anonymousTime, dateUpdated) VALUES (NULL, '$userIP', '$tagger', '$anonymousPlatform', '$anonymousDevice', '$current_time_day','$today')") or die("Home");

if($search){$seo_title = "$search on breedersng"; }else{$seo_title = "Search breedersng";}
$seo_description = "Buy and Sell $search on Nigeria's online breeders Marketplace - @breedersng";
$seo_keywords = "buy, sell, pet, livestock, feed, accessory, nigeria, farm, dog, cat,  goat, sheep, poultry, puppies, horse, cow, chiken, mice, money";
$seo_img = "img/banner.png";
$seo_url = "https://www.breeders.ng/search";
$seo_author = "breeders";
$seo_date = "$today";

include("services/heads.php");
?>



<?php if($isMobile){////////////////////////////////////// HEADER MOBILE?>

<div id="page_div" align="center">
<a href="index.php"><h1>breeders</h1></a>
<h4 id="page_title" class="breeders">
Search
</h4>   
</div>

<div id="page_nav_div">
<table id="page_nav_table"><tr>
<td id="page_nav_1"><a href="pets.php"><div>Pets</div></a></td>
<td id="page_nav_2"><a href="livestock.php"><div>Livestock</div></a></td>
<td id="page_nav_3"><a href="feedandstuff.php"><div>Feed and Stuff</div></a></td>
<td id="page_nav_4"><a href="knowledgebase.php"><div>Knowledge Base</div></a></td>
</tr></table>
</div>

<center>
<div id="search_segment">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="get" >
<input type="search" required id="search" name="search" value="<?php echo $search ?>" placeholder="search..." align="top" required/>

<select name="category" id="category">
<div><option selected value="All">All</option>
<option <?php if($category == "pet"){ echo"selected";}?> value="pet">Pets</option>
<option <?php if($category == "livestock"){ echo"selected";}?> value="livestock">Livestock</option>
<option <?php if($category == "feed"){ echo"selected";}?> value="feed">Feeds</option>
<option <?php if($category == "accessory"){ echo"selected";}?> value="accessory">Accessory</option></div>
</select>
<div id="sub_category_options">
</div>

<select name="state" id="state">
<option <?php if(!$state){ echo"selected";}?> value="ng">Nigeria</option>
<option <?php if($state == "Abuja"){ echo"selected";}?> value="Abuja">Abuja</option>
<option <?php if($state == "Abia"){ echo"selected";}?> value="Abia">Abia</option>
<option <?php if($state == "Adamawa"){ echo"selected";}?> value="Adamawa">Adamawa</option>
<option <?php if($state == "Akwa Ibom"){ echo"selected";}?> value="Akwa Ibom">Akwa Ibom</option>
<option <?php if($state == "Anambra"){ echo"selected";}?> value="Anambra">Anambra</option>
<option <?php if($state == "Bauchi"){ echo"selected";}?> value="Bauchi">Bauchi</option>
<option <?php if($state == "Bayelsa"){ echo"selected";}?> value="Bayelsa">Bayelsa</option>
<option <?php if($state == "Benue"){ echo"selected";}?> value="Benue">Benue</option>
<option <?php if($state == "Borno"){ echo"selected";}?> value="Borno">Borno</option>
<option <?php if($state == "Cross River"){ echo"selected";}?> value="Cross River">Cross River</option>
<option <?php if($state == "Delta"){ echo"selected";}?> value="Delta">Delta</option>
<option <?php if($state == "Ebonyi"){ echo"selected";}?> value="Ebonyi">Ebonyi</option>
<option <?php if($state == "Enugu"){ echo"selected";}?> value="Enugu">Enugu</option>
<option <?php if($state == "Edo"){ echo"selected";}?> value="Edo">Edo</option>
<option <?php if($state == "Ekiti"){ echo"selected";}?> value="Ekiti">Ekiti</option>
<option <?php if($state == "Gombe"){ echo"selected";}?> value="Gombe">Gombe</option>
<option <?php if($state == "Imo"){ echo"selected";}?> value="Imo">Imo</option>
<option <?php if($state == "Jigawa"){ echo"selected";}?> value="Jigawa">Jigawa</option>
<option <?php if($state == "Kaduna"){ echo"selected";}?> value="Kaduna">Kaduna</option>
<option <?php if($state == "Kano"){ echo"selected";}?> value="Kano">Kano</option>
<option <?php if($state == "Kastina"){ echo"selected";}?> value="Kastina">Kastina</option>
<option <?php if($state == "Kebbi"){ echo"selected";}?> value="Kebbi">Kebbi</option>
<option <?php if($state == "Kogi"){ echo"selected";}?> value="Kogi">Kogi</option>
<option <?php if($state == "Kwara"){ echo"selected";}?> value="Kwara">Kwara</option>
<option <?php if($state == "Lagos"){ echo"selected";}?> value="Lagos">Lagos</option>
<option <?php if($state == "Nasarawa"){ echo"selected";}?> value="Nasarawa">Nasarawa</option>
<option <?php if($state == "Niger"){ echo"selected";}?> value="Niger">Niger</option>
<option <?php if($state == "Ogun"){ echo"selected";}?> value="Ogun">Ogun</option>
<option <?php if($state == "Ondo"){ echo"selected";}?> value="Ondo">Ondo</option>
<option <?php if($state == "Osun"){ echo"selected";}?> value="Osun">Osun</option>
<option <?php if($state == "Oyo"){ echo"selected";}?> value="Oyo">Oyo</option>
<option <?php if($state == "Plateau"){ echo"selected";}?> value="Plateau">Plateau</option>
<option <?php if($state == "Rivers"){ echo"selected";}?> value="Rivers">Rivers</option>
<option <?php if($state == "Sokoto"){ echo"selected";}?> value="Sokoto">Sokoto</option>
<option <?php if($state == "Taraba"){ echo"selected";}?> value="Taraba">Taraba</option>
<option <?php if($state == "Yobe"){ echo"selected";}?> value="Yobe">Yobe</option>
<option <?php if($state == "Zamfara"){ echo"selected";}?> value="Zamfara">Zamfara</option>
</select>
<div id="lga_options">
</div>

<input type="submit" value="Search" id="submit">
</form>
</div>
</center>

<?php }else{////////////////////////////////////// HEADER DESKTOP?>

<table id="foundation"><tbody><tr valign="top"><td id="cell1">

<div id="res_head">
<table id="wall_table">
<tr valign="middle">
<td id="wall_parent">
<a href="index.php"><h1>breeders</h1></a>
<center>
<div id="page_pic" class="page_pic_s"></div>
<div id="search_segment">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="get" >
<input type="search" required id="search" name="search" value="<?php echo $search ?>" placeholder="search..." align="top" required/>

<select name="category" id="category">
<div><option selected value="All">All</option>
<option <?php if($category == "pet"){ echo"selected";}?> value="pet">Pets</option>
<option <?php if($category == "livestock"){ echo"selected";}?> value="livestock">Livestock</option>
<option <?php if($category == "feed"){ echo"selected";}?> value="feed">Feeds</option>
<option <?php if($category == "accessory"){ echo"selected";}?> value="accessory">Accessory</option></div>
</select>
<div id="sub_category_options">
</div>

<select name="state" id="state">
<option <?php if(!$state){ echo"selected";}?> value="ng">Nigeria</option>
<option <?php if($state == "Abuja"){ echo"selected";}?> value="Abuja">Abuja</option>
<option <?php if($state == "Abia"){ echo"selected";}?> value="Abia">Abia</option>
<option <?php if($state == "Adamawa"){ echo"selected";}?> value="Adamawa">Adamawa</option>
<option <?php if($state == "Akwa Ibom"){ echo"selected";}?> value="Akwa Ibom">Akwa Ibom</option>
<option <?php if($state == "Anambra"){ echo"selected";}?> value="Anambra">Anambra</option>
<option <?php if($state == "Bauchi"){ echo"selected";}?> value="Bauchi">Bauchi</option>
<option <?php if($state == "Bayelsa"){ echo"selected";}?> value="Bayelsa">Bayelsa</option>
<option <?php if($state == "Benue"){ echo"selected";}?> value="Benue">Benue</option>
<option <?php if($state == "Borno"){ echo"selected";}?> value="Borno">Borno</option>
<option <?php if($state == "Cross River"){ echo"selected";}?> value="Cross River">Cross River</option>
<option <?php if($state == "Delta"){ echo"selected";}?> value="Delta">Delta</option>
<option <?php if($state == "Ebonyi"){ echo"selected";}?> value="Ebonyi">Ebonyi</option>
<option <?php if($state == "Enugu"){ echo"selected";}?> value="Enugu">Enugu</option>
<option <?php if($state == "Edo"){ echo"selected";}?> value="Edo">Edo</option>
<option <?php if($state == "Ekiti"){ echo"selected";}?> value="Ekiti">Ekiti</option>
<option <?php if($state == "Gombe"){ echo"selected";}?> value="Gombe">Gombe</option>
<option <?php if($state == "Imo"){ echo"selected";}?> value="Imo">Imo</option>
<option <?php if($state == "Jigawa"){ echo"selected";}?> value="Jigawa">Jigawa</option>
<option <?php if($state == "Kaduna"){ echo"selected";}?> value="Kaduna">Kaduna</option>
<option <?php if($state == "Kano"){ echo"selected";}?> value="Kano">Kano</option>
<option <?php if($state == "Kastina"){ echo"selected";}?> value="Kastina">Kastina</option>
<option <?php if($state == "Kebbi"){ echo"selected";}?> value="Kebbi">Kebbi</option>
<option <?php if($state == "Kogi"){ echo"selected";}?> value="Kogi">Kogi</option>
<option <?php if($state == "Kwara"){ echo"selected";}?> value="Kwara">Kwara</option>
<option <?php if($state == "Lagos"){ echo"selected";}?> value="Lagos">Lagos</option>
<option <?php if($state == "Nasarawa"){ echo"selected";}?> value="Nasarawa">Nasarawa</option>
<option <?php if($state == "Niger"){ echo"selected";}?> value="Niger">Niger</option>
<option <?php if($state == "Ogun"){ echo"selected";}?> value="Ogun">Ogun</option>
<option <?php if($state == "Ondo"){ echo"selected";}?> value="Ondo">Ondo</option>
<option <?php if($state == "Osun"){ echo"selected";}?> value="Osun">Osun</option>
<option <?php if($state == "Oyo"){ echo"selected";}?> value="Oyo">Oyo</option>
<option <?php if($state == "Plateau"){ echo"selected";}?> value="Plateau">Plateau</option>
<option <?php if($state == "Rivers"){ echo"selected";}?> value="Rivers">Rivers</option>
<option <?php if($state == "Sokoto"){ echo"selected";}?> value="Sokoto">Sokoto</option>
<option <?php if($state == "Taraba"){ echo"selected";}?> value="Taraba">Taraba</option>
<option <?php if($state == "Yobe"){ echo"selected";}?> value="Yobe">Yobe</option>
<option <?php if($state == "Zamfara"){ echo"selected";}?> value="Zamfara">Zamfara</option>
</select>
<div id="lga_options">
</div>

<input type="submit" value="Search" id="submit">
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


<?php if ( $search){?>
<div id="search_results_label">
search results for : "<?php echo $search ?>" 
<?php if ($sub_category != "" && $sub_category != "any" ){echo " $sub_category [$category]";} elseif ($category != "All"){echo "in ".$category;}?>
<?php if ($lga != "" && $lga != "any"){echo " at $lga [$state]";} elseif ($state != "ng" && $state != "" ){echo " at ".$state;}?>
<?php echo " - yielded "; if ( $search_result_amount == 0 ){echo "no";}else{echo $search_result_amount;} echo " result"; if ( $search_result_amount > 1 ){echo "s";}?>
</div>




<?php
if ( is_int($p) || is_numeric($p) ){$current_page = $p;}else{$current_page = 1;}

$count_post = mysqli_num_rows($sql_poster);
$count_page = ceil($count_post/20) * 1;
if($current_page > $count_page){$current_page = $count_page * 1;}


$counter = 1;
if( $current_page != 0 ){$pageno = ($current_page - 1) * 20;}
$pageno *= 1;
if($q){
$sql_poster = mysqli_query ($cxn, "SELECT * FROM poster WHERE
postTitle LIKE '%$w1%' OR postDescription LIKE '%$w1%' OR postCategory LIKE '%$w1%' OR postSubCategory LIKE '%$w1%' OR postState LIKE '%$w1%' OR postLGA LIKE '%$w1%' OR 
postTitle LIKE '%$w2%' OR postDescription LIKE '%$w2%' OR postCategory LIKE '%$w2%' OR postSubCategory LIKE '%$w2%' OR postState LIKE '%$w2%' OR postLGA LIKE '%$w2%' OR 
postTitle LIKE '%$w3%' OR postDescription LIKE '%$w3%' OR postCategory LIKE '%$w3%' OR postSubCategory LIKE '%$w3%' OR postState LIKE '%$w3%' OR postLGA LIKE '%$w3%' OR 
postTitle LIKE '%$w4%' OR postDescription LIKE '%$w4%' OR postCategory LIKE '%$w4%' OR postSubCategory LIKE '%$w4%' OR postState LIKE '%$w4%' OR postLGA LIKE '%$w4%' OR 
postTitle LIKE '%$w5%' OR postDescription LIKE '%$w5%' OR postCategory LIKE '%$w5%' OR postSubCategory LIKE '%$w5%' OR postState LIKE '%$w5%' OR postLGA LIKE '%$w5%' OR 
postTitle LIKE '%$w6%' OR postDescription LIKE '%$w6%' OR postCategory LIKE '%$w6%' OR postSubCategory LIKE '%$w6%' OR postState LIKE '%$w6%' OR postLGA LIKE '%$w6%' OR 
postTitle LIKE '%$w7%' OR postDescription LIKE '%$w7%' OR postCategory LIKE '%$w7%' OR postSubCategory LIKE '%$w7%' OR postState LIKE '%$w7%' OR postLGA LIKE '%$w7%' OR 
postTitle LIKE '%$w8%' OR postDescription LIKE '%$w8%' OR postCategory LIKE '%$w8%' OR postSubCategory LIKE '%$w8%' OR postState LIKE '%$w8%' OR postLGA LIKE '%$w8%' ORDER BY RAND() LIMIT $pageno, 20");
}else{

$sql_poster = mysqli_query ($cxn, "SELECT * FROM poster WHERE (
postTitle LIKE '%$w1%' OR postDescription LIKE '%$w1%' OR postCategory LIKE '%$w1%' OR postSubCategory LIKE '%$w1%' OR 
postTitle LIKE '%$w2%' OR postDescription LIKE '%$w2%' OR postCategory LIKE '%$w2%' OR postSubCategory LIKE '%$w2%' OR 
postTitle LIKE '%$w3%' OR postDescription LIKE '%$w3%' OR 
postTitle LIKE '%$w4%' OR postDescription LIKE '%$w4%' OR 
postTitle LIKE '%$w5%' OR postDescription LIKE '%$w5%' OR 
postTitle LIKE '%$w6%' OR postDescription LIKE '%$w6%' OR 
postTitle LIKE '%$w7%' OR postDescription LIKE '%$w7%' OR 
postTitle LIKE '%$w8%' OR postDescription LIKE '%$w8%'
) $cat_query $state_query $sub_category_query $lga_query ORDER BY RAND() LIMIT $pageno, 20") or die("sads");
}


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

<?php if($counter == 10){?>

<?php 
$sql_poster1 = mysqli_query($cxn, "SELECT * FROM knowledgebaser ORDER BY RAND() LIMIT 1");

while($row_poster1 = mysqli_fetch_assoc($sql_poster1)){
	extract($row_poster1);
$linkTitle = $postTitle;
$linkTitle = clean_input2($linkTitle);
$link = strtolower("article/".$knowledgebaseID."/".$knowledgebaseTopic);
$link_temp = strtolower("article.php?id=".$knowledgebaseID);
?>

<a href="<?php echo $link_temp; ?>">
<div align="center">
<table id="post_kbase" style="background-image:url(knowledgebaseimg/<?php echo $knowledgebasePicture?>)">
    <tr valign="bottom">
        <td>
            <div id="post_kbase_div">
            <h3><?php echo $knowledgebaseTopic; ?></h3>
            <h5><?php echo $knowledgebaseSource; ?></h5>
            <h5><?php echo date("D M jS, Y", strtotime($dateUpdated));?></h5>
                <?php 
				$sql_average = mysqli_query($cxn, "SELECT AVG(ratingAmount) as averaged FROM rater WHERE ratingPost = 'k-$knowledgebaseID' ");
				$row_average = mysqli_fetch_assoc($sql_average);
				$average = round($row_average['averaged']);
				
				$sql_all = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM rater WHERE ratingPost = 'k-$knowledgebaseID' ")) * 1;
				 if ($average > 0) { ?>
				<div onClick="rate('1')" id="rate<?php if($average <1 )echo "_not"; ?>"></div>
                <div onClick="rate('2')" id="rate<?php if($average <2 )echo "_not"; ?>"></div>
                <div onClick="rate('3')" id="rate<?php if($average <3 )echo "_not"; ?>"></div>
                <div onClick="rate('4')" id="rate<?php if($average <4 )echo "_not"; ?>"></div>
                <div onClick="rate('5')" id="rate<?php if($average <5 )echo "_not"; ?>"></div>
                <span id="rate_count">(<?php echo $sql_all; ?>)</span>
				<?php }?>
        <br /><br /><?php echo clean_input3(substr($knowledgebaseBody, 0, 200)); ?> <b>... continue reading</b>
	    </td>
    </tr>
</table>
</div>
</a>
<?php }?>


<?php } if($counter == 5 || $counter == 15 ){?>

<div id="inpost_ad"></div> 

<?php } $counter++; }?>


<?php 
if ( $search_result_amount > 20 ){

?>
<div align="center">
<ul>
	<?php $x = $current_page - 1; if ($current_page > 1){ ?><li id="pagination" onClick="location = '<?php echo $_SERVER["PHP_SELF"]."?p='+$x"?>" 
	> |< </li><?php }else {echo "<li id='pagination' > .... </li>";}?>
	<select id="pagination" name="p" onchange="location = '<?php echo $_SERVER["PHP_SELF"]; ?>?p='+this.value;">
	<?php 
     for ($i = 1; $i <= $count_page; $i++){
		 echo "<option value='$i' "; if($i == $current_page)echo "selected"; echo ">$i</option>";
	 }
    ?>
    </select>
	<?php if ($current_page < $count_page ){?><li id="pagination" <?php $current_page++;?>
    onClick="location = '<?php echo $_SERVER["PHP_SELF"]."?p='+$current_page"?>" 
	> >| </li><?php }else {echo "<li id='pagination' > .... </li>";}?>
</ul>
</div>
<?php } ?>






<?php }else{ 




echo "<h4 id='search_suggestions'>Suggestions :</h4>";
$counter = 1;
$sql_poster = mysqli_query($cxn, "SELECT * FROM poster ORDER BY RAND() LIMIT 10");

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

<?php if($counter == 5){?>

<div id="inpost_ad"></div>

<?php }?>

<?php } $counter++; } ?>


<ul>
<?php $sql_search_tags = mysqli_query($cxn, "SELECT DISTINCT anonymousPage FROM anonymouser WHERE anonymousPage LIKE '%Search - %' ORDER BY RAND() LIMIT 20");

while($sql_search_tags1 = mysqli_fetch_assoc($sql_search_tags)){
	extract($sql_search_tags1);
	$anonymousPage = substr($anonymousPage, 9);
	echo "<a href='search.php?q=$anonymousPage'><li id='footactivities'>$anonymousPage</li></a>";
	
}?>
</ul>



<?php if(!$isMobile){?>
</div>
</td><td id="cell3">
<?php }?>


<?php include("services/footer.php");?>


<?php if(!$isMobile){?></td></tr></tbody></table><?php }?>


<script src="script/leFloat.js"></script>
<script src="script/sellLocationS.js"></script>
<script src="script/sellProductS.js"></script>
<?php if(!$isMobile){?><script src="script/res_d.js"></script><?php }?>
</body>
</html>