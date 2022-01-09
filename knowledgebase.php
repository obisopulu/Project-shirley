<?php include("services/xsis.php");

mysqli_query($cxn, "INSERT INTO anonymouser(anonymousID, anonymousIP, anonymousPage, anonymousPlatform, anonymousDevice, anonymousTime, dateUpdated) VALUES (NULL, '$userIP', 'Knowledgebase', '$anonymousPlatform', '$anonymousDevice', '$current_time_day','$today')") or die("Home");



$seo_title = "Learn about animals and animal breeding - breedersng";
$seo_description = "read articles on animals to help you understand them better and get the best out of them - breedersng";
$seo_keywords = "learn, buy, sell, pet, livestock, feed, accessory, nigeria, farm, dog, cat,  goat, sheep, poultry, puppies, horse, cow, chiken, mice, money";
$seo_img = "https://www.breeders.ng/img/banner-knowledgebase.png";
$seo_url = "https://www.breeders.ng";
$seo_author = "breeders";
$seo_date = "$today";

include("services/heads.php");
?>



<?php if($isMobile){////////////////////////////////////// HEADER MOBILE?>


<div id="page_div" align="center">
<a href="index.php"><h1>breeders</h1></a>
<div id="page_pic" class="page_pic_k"></div>
<a href="knowledgebase.php"><h4 id="page_title" class="breeders">
Knowledge Base
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

if ( is_int($p) || is_numeric($p) ){$current_page = $p;}else{$current_page = 1;}

$sql_poster = mysqli_query($cxn, "SELECT * FROM knowledgebaser");
$count_post = mysqli_num_rows($sql_poster);
$count_page = ceil($count_post/20) * 1;
if($current_page > $count_page){$current_page = $count_page;}


$counter = 1;
$pageno = ($current_page - 1) * 20;
$sql_poster = mysqli_query($cxn, "SELECT * FROM knowledgebaser ORDER BY knowledgebaseID DESC LIMIT $pageno, 10");

while($row_poster=mysqli_fetch_assoc($sql_poster)){
	extract($row_poster);
$linkTitle = $postTitle;
$linkTitle = clean_input2($linkTitle);
$link = strtolower("article/".$knowledgebaseID."/".$knowledgebaseTopic);
$link_temp = strtolower("article.php?id=".$knowledgebaseID);
?>

<a href="<?php echo $link_temp; ?>">
<div align="center" id="post_kbase" style="background-image:url(knowledgebaseimg/<?php echo $knowledgebasePicture?>)">
<table>
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

<?php if($counter == 5){?>

<div id="inpost_ad"></div>

<?php } $counter++;}?>



<?php 
if ( $count_post > 20 ){

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
<?php if(!$isMobile){?><script src="script/res_d.js"></script><?php }?>
</body>
</html>