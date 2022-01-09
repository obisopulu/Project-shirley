<?php include("../services/xsis.php");

if ($sessionAdminer != "on"){
		header("Location: index.php");
}

if((is_int($update) || is_numeric($update)) && $update){ 
$sql_update = mysqli_query($cxn, "UPDATE poster SET postCategory = '$postCategory', postSubCategory = '$postSubCategory', postState = '$postState', postLGA = '$postLGA', postTitle = '$postTitle', postDescription = '$postDescription', postAmount = '$postAmount', postNegotiable = '$postNegotiable', postImpression = '$postImpression', postReaction = '$postReaction', postRequestContactDetails = '$postRequestContactDetails', postUser = '$postUser', postStatus = '$postStatus', dateUpdated = '$dateUpdated' WHERE postID = '$update' ") or die("xxx");
header("Location: posts.php?edit=$update");
}
if((is_int($deactivater) || is_numeric($deactivater)) && $deactivater){ 
$sql_update = mysqli_query($cxn, "UPDATE poster SET postStatus = 'Inactive' WHERE postID = '$deactivater' ") or die("xxx");
header("Location: posts.php?status=Inactive");
}
if((is_int($deleter) || is_numeric($deleter)) && $deleter){ 
$sql_update = mysqli_query($cxn, "DELETE FROM poster WHERE postID = '$deleter' LIMIT 1 ") or die("xxx");
header("Location: posts.php");
}

?>
<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta charset="utf-8">
<title>Posts</title>
<meta name="description" content="">
<meta name="robots" content="no-index/no-follow" />
<link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/vnd.microsoft.icon" />
<meta name="viewport" content="user-scalable=no,maximum-scale=1,width=device-width" />
<meta name="MobileOptimized" content="width" />
<meta name="HandheldFriendly" content="true" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<link rel="stylesheet" type="text/css" href="../style/cascade.css" />
<link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16.png">
<link rel="apple-touch-icon" sizes="57x57" href="../img/favicon-57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../img/favicon-60.png">
<link rel="icon" type="image/png" sizes="64x64" href="../img/favicon-64.png">
<link rel="apple-touch-icon" sizes="72x72" href="../img/favicon-72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../img/favicon-76.png">
<link rel="icon" type="image/png" sizes="96x96" href="../img/favicon-96.png">
<link rel="apple-touch-icon" sizes="114x114" href="../img/favicon-114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../img/favicon-120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../img/favicon-144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../img/favicon-152.png">
<link rel="icon" type="image/png" sizes="160x160" href="../img/favicon-160.png">
<link rel="apple-touch-icon" sizes="180x180" href="../img/favicon-180.png">
<link rel="icon" type="image/png" sizes="196x196" href="../img/favicon-192.png">
<meta name="msapplication-TileColor" content="#F5185E">
<meta name="msapplication-TileImage" content="../img/favicon-144.png">
<meta name="msapplication-config" content="../services/browserconfig.xml">
<script>
function _(el){return document.getElementById(el);}
function __(el){return document.getElementsByClassName(el);}
function ___(el){return document.getElementsByTagName(el);}
</script>
</head>
<body>




<?php if($isMobile){////////////////////////////////////// HEADER MOBILE?>
<div id="wall_parent" style="height:auto">
<table style="background:; text-align:center; font-weight:bolder; transition:1s ease-in-out">
  <tr valign="middle">
    <td style="height:100px; " colspan="6">
		<a href="../index.php"> <h1 style="font-size:4em;">breeders</h1></a>
        Posts
        <center>
        <table style="background:rgba(0,0,0,.3); width:250px; height:40px;"><tr><td>
        <form method="get" action="posts.php" ><input name="key" type="search" id="search" placeholder="search..." value="<?php echo $key?>" style="background:rgba(0,0,0,.2); border:none; height:40px; padding:10px; margin:0; width:100%" align="top" required/></td><td>
        <input type="submit" style="width:40px; height:40px; background:url(../img/p-search.png) center no-repeat; background-size:cover; border:none;" value=""></form>
        </td></tr></table>
        </center><br>
                        
        
        <a href="index.php?e_act=Logout"><div id="footerbutton">
        Logout
        </div></a>
        

</td></tr><tr>
<td style="background:rgba(0,0,0,.4); height:50px; width:16.5%"><a href="index.php"><div>Today</div></a></td>
<td style="background:rgba(0,0,0,.2); height:50px; width:16.5%"><a href="posts.php"><div>Posts</div></a></td>
<td style="background:rgba(0,0,0,.4); height:50px; width:16.5%"><a href="seller.php"><div>Seller</div></a></td>
<td style="background:rgba(0,0,0,.2); height:50px; width:16.5%"><a href="knowledgebase.php"><div>K-Base</div></a></td>
<td style="background:rgba(0,0,0,.4); height:50px; width:16.5%"><a href="mailer.php"><div>Mailer</div></a></td>
<td style="background:rgba(0,0,0,.2); height:50px; width:16.5%"><a href="analytics.php"><div>Analytics</div></a></td>
</tr></table>
</div>



<?php }else{////////////////////////////////////// HEADER DESKTOP?>

<table id="foundation"><tbody><tr valign="top"><td id="cell1">

<div id="res_head">
<table style="text-align:center; font-weight:700; transition:1s ease-in-out">
	<tr valign="middle">
		<td id="wall_parent" style="background:top center no-repeat #23356C; background-size:cover;">
	        <div style="background:rgba(0,0,0,.3); height:100%">
                <a href="../index.php"> <h1 style="font-size:4em;">breeders</h1></a>
                <br>
                Posts
                <br>
                <br>
                <br>
                <center>
                <table style="background:rgba(0,0,0,.3); width:250px; height:40px;"><tr><td>
                <form method="get" action="posts.php" ><input name="key" type="search" id="search" placeholder="search..." value="<?php echo $key?>" style="background:rgba(0,0,0,.2); border:none; height:40px; padding:10px; margin:0; width:100%" align="top" required/></td><td>       
                <input type="submit" style="width:40px; height:40px; background:url(../img/p-search.png) center no-repeat; background-size:cover; border:none;" value=""></form>
        </td></tr></table>
        <br>
        
        <a href="index.php?e_act=Logout"><div id="footerbutton">
        Logout
        </div></a>
                </center>
            </div>
		</td></tr><tr>
        <td id="nav_1" style="background:rgba(0,0,0,.4);"><a href="index.php"><div>Today</div></a></td></tr><tr>
        
        <td id="nav_2" style="background:rgba(0,0,0,.2);"><a href="posts.php"><div>Posts</div></a>
        <table style="height:20px; text-align:center; background:rgba(0,0,0,.1)"><tr>
<td style="width:50%;"><a href="posts.php?status=Under+Review">Under Review</a></td>
<td style="width:50%;"><a href="posts.php?status=Live">Live</a></td>
</tr></table>
        </td></tr><tr>
        
        <td id="nav_4" style="background:rgba(0,0,0,.4);"><a href="seller.php"><div>Seller</div></a></td></tr><tr>
        
        <td id="nav_3" style="background:rgba(0,0,0,.2);"><a href="knowledgebase.php"><div>Knowledge Base</div></a></td></tr><tr>
        
        <td id="nav_5" style="background:rgba(0,0,0,.4);"><a href="mailer.php"><div>Mailer</div></a></td></tr><tr>
        
        <td id="nav_6" style="background:rgba(0,0,0,.2);"><a href="analytics.php"><div>Analytics</div></a></td>
	</tr>
</table>
</div>


</td><td style="width:auto" align="center" id="cell2">
<div class="match_screen_height" style="overflow-x:scroll; overflow-y:scroll;">

<?php }////////////////////////////////////// HEADER 1 DESKTOP?>


<?php 
if((is_int($deactivate) || is_numeric($deactivate)) && $deactivate){
?>	
	<div style="margin:10px; background:rgb(0,0,0,.3)">
	<div align="center" style="padding:40px">
    	Are you sre you want to deactivate this post?
	</div>
	<div align="center" style="padding:10px">
        <a href="posts.php?deactivater=<?php echo $deactivate ?>"><div id="post_buttons" style="width:45%; background:#F33">Deactivate</div></a>
        <div id="post_buttons" style="width:45%; background:#393" onClick="history.back()">No</div>
	</div>
	
	</div>
<?php 
}else if((is_int($delete) || is_numeric($delete)) && $delete){
?>	
	<div style="margin:10px; background:rgb(0,0,0,.3)">
	<div align="center" style="padding:40px">
    	Are you sre you want to delete this post?
	</div>
	<div align="center" style="padding:10px">
        <a href="posts.php?deleter=<?php echo $delete ?>"><div id="post_buttons" style="width:45%; background:#F33">Delete</div></a>
        <div id="post_buttons" style="width:45%; background:#393" onClick="history.back()">No</div>
	</div>
	
	</div>
<?php
	
	

}else if((is_int($edit) || is_numeric($edit)) && $edit){
	
	
$sql_poster = mysqli_query($cxn, "SELECT * FROM poster WHERE postID = '$edit'");
while($row_poster=mysqli_fetch_assoc($sql_poster)){extract($row_poster);}
	
?>

<div style="margin:10px; background:rgb(0,0,0,.3)" align="right">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
<span style="font-size:.8em; font-weight:700">ID</span>
<input type="number" disabled name="postID" value="<?php echo $postID ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">CATEGORY</span>
<input type="text" name="postCategory" value="<?php echo $postCategory ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">SUB CATEGORY</span>
<input type="text" name="postSubCategory" value="<?php echo $postSubCategory ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">STATE</span>
<input type="text" name="postState" value="<?php echo $postState ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">AREA</span>
<input type="text" name="postLGA" value="<?php echo $postLGA ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">TITLE</span>
<input type="text" name="postTitle" value="<?php echo $postTitle ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">DESCRIPTION</span>
<input type="text" name="postDescription" value="<?php echo $postDescription ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">Amount</span>
<input type="number" name="postAmount" value="<?php echo $postAmount ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">NEGOTIABLE</span>
<input type="number" name="postNegotiable" value="<?php echo $postNegotiable ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">IMPRESSION</span>
<input type="number" name="postImpression" value="<?php echo $postImpression ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">REACTION</span>
<input type="number" name="postReaction" value="<?php echo $postReaction ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">CONTACTED</span>
<input type="number" name="postRequestContactDetails" value="<?php echo $postRequestContactDetails ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">USER</span>
<input type="number" name="postUser" value="<?php echo $postUser ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">STATUS</span>
<input type="text" name="postStatus" value="<?php echo $postStatus ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">DATE UPDATED</span>
<input type="text" name="dateUpdated" value="<?php echo $dateUpdated ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%">
</div>
<center>
<input type="hidden" name="update" value="<?php echo $postID ?>"/>
<input type="submit" value="UPDATE" style="width:200px; height:50px; background:#0C9BBB; font-size:1em; border:none">
</center>
</form>
<br><br><br><br>


<?php }else{
if ( is_int($p) || is_numeric($p) ){$current_page = $p;}else{$current_page = 1;}
if(!$status){$status = "Under Review";}?>

<?php if(!$key){?>
<table style="height:50px; background:rgba(0,0,0,.3); text-align:center"><tr>
<td style="width:33.33%; <?php if($status == "Under Review" ){echo "background:#0C9BBB";}?>"><a href="posts.php?status=Under+Review">Under Review</a></td>
<td style="width:33.33%; <?php if($status == "Live" ){echo "background:#0C9BBB";}?>"><a href="posts.php?status=Live">Live</a></td>
<td style="width:33.33%; <?php if($status == "Inactive_Sold" ){echo "background:#0C9BBB";}?>"><a href="posts.php?status=Inactive_Sold">Inactive or Sold</a></td>
</tr></table>
<?php }else{ echo "<div style='padding:10px'>Search result(s) for : $key</div>";} ?>

<?php
if($status == "Inactive_Sold" ){$status = "Inactive' OR postStatus = 'Sold";}

if(!$key){
$sql_poster = mysqli_query($cxn, "SELECT * FROM poster WHERE postStatus = '$status'");
$count_post = mysqli_num_rows($sql_poster);
$count_page = ceil($count_post/20);

?>
<div style="background:rgba(0,0,0,.2); margin:10px; padding:10px; text-align:left">
<h1><?php echo $count_post ?></h1>
<?php if($status == "Inactive' OR postStatus = 'Sold" ){echo "Inactive and Sold Posts";}else{ echo $status." Posts" ;}?> 
</div>
<?php

$counter = 1;
$pageno = ($current_page - 1) * 20;
$sql_poster = mysqli_query($cxn, "SELECT * FROM poster WHERE postStatus = '$status' ORDER BY postID DESC LIMIT $pageno, 20");

}else{

$key=explode(' ',$key);

if (strlen($key[0]) > 2){$w1 = trim($key[0]);}else{$w1 = 'uselessrg';}
if (strlen($key[1]) > 2){$w2 = trim($key[1]);}else{$w2 = 'uselessrg';}
if (strlen($key[2]) > 2){$w3 = trim($key[2]);}else{$w3 = 'uselessrg';}
if (strlen($key[3]) > 2){$w4 = trim($key[3]);}else{$w4 = 'uselessrg';}
if (strlen($key[4]) > 2){$w5 = trim($key[4]);}else{$w5 = 'uselessrg';}
if (strlen($key[5]) > 2){$w6 = trim($key[5]);}else{$w6 = 'uselessrg';}
if (strlen($key[6]) > 2){$w7 = trim($key[6]);}else{$w7 = 'uselessrg';}
if (strlen($key[7]) > 2){$w8 = trim($key[7]);}else{$w8 = 'uselessrg';}

$sql_poster = mysqli_query($cxn, "SELECT * FROM poster WHERE postTitle LIKE '%$w1%' OR postDescription LIKE '%$w1%' OR postTitle LIKE '%$w2%' OR postDescription LIKE '%$w2%' OR postTitle LIKE '%$w3%' OR postDescription LIKE '%$w3%' OR postTitle LIKE '%$w4%' OR postDescription LIKE '%$w4%' OR postTitle LIKE '%$w5%' OR postDescription LIKE '%$w5%' OR postTitle LIKE '%$w6%' OR postDescription LIKE '%$w6%' OR postTitle LIKE '%$w7%' OR postDescription LIKE '%$w7%' OR postTitle LIKE '%$w8%' OR postDescription  LIKE '%$w8%' ");
$count_post = mysqli_num_rows($sql_poster);
$count_page = ceil($count_post/20);


$counter = 1;
$pageno = ($current_page - 1) * 20;
$sql_poster = mysqli_query($cxn, "SELECT * FROM poster WHERE postTitle LIKE '%$w1%' OR postDescription LIKE '%$w1%' OR postTitle LIKE '%$w2%' OR postDescription LIKE '%$w2%' OR postTitle LIKE '%$w3%' OR postDescription LIKE '%$w3%' OR postTitle LIKE '%$w4%' OR postDescription LIKE '%$w4%' OR postTitle LIKE '%$w5%' OR postDescription LIKE '%$w5%' OR postTitle LIKE '%$w6%' OR postDescription LIKE '%$w6%' OR postTitle LIKE '%$w7%' OR postDescription LIKE '%$w7%' OR postTitle LIKE '%$w8%' OR postDescription  LIKE '%$w8%' ORDER BY postID DESC LIMIT $pageno, 20");	
}
while($row_poster=mysqli_fetch_assoc($sql_poster)){
	extract($row_poster);
?>


<div <?php if(!$isMobile){echo "style='width:48%; display:inline-block'";}?>>
<table style="height:120px; border-top:solid thin rgba(0,0,0,.3); margin-bottom:20px"><!--feed-->
  <tr valign="top">
    <td style="width:110px">
    	<div style="background:url(../postimg-thumbs/<?php echo "t-".$postPic1?>) center rgba(0,0,0,.3) no-repeat; background-size:cover; height:100px; width:100px; margin:10px; border-radius:10px" align="right">
        	<!--<div id="verified"></div>-->
        </div>
	</td>
    <td style="padding:10px 0">
    	<span id="negotiable<?php if ($postCategory == "Pet"){echo"_pets"; }elseif ($postCategory == "Livestock"){echo"_livestock"; }elseif ($postCategory == "Feed" || $postCategory == "Accessory"){ echo"_feedandstuff";}else{}?>"><?php echo "$postStatus";?></span>
    	<h4 style="margin:0"><?php echo $postTitle ?></h4>
        <h5><!--&#8358-->&#x20A6 <?php echo "$postAmount";?>&nbsp;</h5>
        <h5><?php echo "$postLGA, $postState"?></h5>
        <?php if($postPic1)echo "&bull; "; if($postPic2)echo "&bull; "; if($postPic3)echo "&bull; ";?><br>
        <?php 		
		$sql_average = mysqli_query($cxn, "SELECT AVG(ratingAmount) as averaged FROM rater WHERE ratingPost = '$postID' ");
		$row_average = mysqli_fetch_assoc($sql_average);
		$average = round($row_average['averaged']);
		
		$sql_all = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM rater WHERE ratingPost = '$postID' ")) * 1;
		 if ($average > 0) { ?>
        <div onClick="rate('1')" style="background:url(../img/rating<?php if($average <1 )echo "-not"; ?>.png) center no-repeat; background-size:cover; width:10px; height:10px; display:inline-block"></div>
        <div onClick="rate('2')" style="background:url(../img/rating<?php if($average <2 )echo "-not"; ?>.png) center no-repeat; background-size:cover; width:10px; height:10px; display:inline-block"></div>
        <div onClick="rate('3')" style="background:url(../img/rating<?php if($average <3 )echo "-not"; ?>.png) center no-repeat; background-size:cover; width:10px; height:10px; display:inline-block"></div>
        <div onClick="rate('4')" style="background:url(../img/rating<?php if($average <4 )echo "-not"; ?>.png) center no-repeat; background-size:cover; width:10px; height:10px; display:inline-block"></div>
        <div onClick="rate('5')" style="background:url(../img/rating<?php if($average <5 )echo "-not"; ?>.png) center no-repeat; background-size:cover; width:10px; height:10px; display:inline-block"></div>
        <span style="font-size:.7em">(<?php echo $sql_all; ?>)</span>
        <?php }
		
$sql_impress = mysqli_query($cxn, "SELECT * FROM impressioner WHERE impressionUser = '$postUser' AND dateUpdated = '$today' ") or die();

if(mysqli_num_rows($sql_impress) < 1){
	$sql_impress = mysqli_query($cxn, "INSERT INTO impressioner(impressionID, impressionUser, impressionCount, dateUpdated) VALUES ( NULL, '$postUser', '1', '$today') ");
}else{
	mysqli_query($cxn, "UPDATE impressioner SET impressionCount = impressionCount + 1 WHERE impressionUser = '$postUser' AND dateUpdated = '$today' ") or die('xxx');
}
	$sql_impresser = mysqli_query($cxn, "UPDATE poster SET postImpression = postImpression + 1 WHERE postID = '$postID' ");	
		?>
    </td>
  </tr><tr><td colspan="2">
	<div align="center" style="margin-top:10px">
        <a href="posts.php?edit=<?php echo $postID ?>"><div style="width:28%" id="post_buttons">Edit</div></a>
        <a href="posts.php?deactivate=<?php echo $postID ?>"><div id="post_buttons" style="width:28%; background:#F33">Deactivate</div></a>
        <a href="posts.php?delete=<?php echo $postID ?>"><div id="post_buttons" style="width:28%; background:#F33">Delete</div></a>
	</div>
  </td></tr>
</table>
</div>



<?php $counter++; }?>



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




<?php } ?>




<?php if(!$isMobile){?>

</div>
</td></tr></tbody></table>

<?php } ?>





<?php if(!$isMobile){?><script src="../script/res_d_admin.js"></script><?php }?>
</body>
</html>