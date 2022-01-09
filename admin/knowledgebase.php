<?php include("../services/xsis.php");

if ($sessionAdminer != "on"){
		header("Location: index.php");
}

if( $act == "Post" ){


function thumb_that_shii($picture, $fileTmpLoc){
	
	move_uploaded_file($fileTmpLoc, "../knowledgebaseimg/".$picture) or die('yyyy');
	
	unlink($fileTmpLoc);
	
	$target = "../knowledgebaseimg/$picture";
	$newcopy = "../knowledgebaseimg-thumbs/t-$picture";
	$w = 150;
	$h = 150;
	list($w_orig, $h_orig) = getimagesize($target);
	$scale_ratio = $w_orig/$h_orig;
	if (($w/$h)>$scale_ratio) {$w = $h*$scale_ratio;}else{$h = $w/$scale_ratio;}
	$img = "";
	$ext = strtolower($ext);
	if ($ext == "gif"){$img = imagecreatefromgif($target);}else if($ext =="png"){$img = imagecreatefrompng($target);}else{$img = imagecreatefromjpeg($target);}
	$tci = imagecreatetruecolor($w, $h);
	imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
	imagejpeg($tci, $newcopy, 80);
	
	$target = "../knowledgebaseimg/$picture";
	$newcopy = "../knowledgebaseimg/$picture";
	$w = 500;
	$h = 500;
	list($w_orig, $h_orig) = getimagesize($target);
	$scale_ratio = $w_orig/$h_orig;
	if (($w/$h)>$scale_ratio) {$w = $h*$scale_ratio;} else {$h = $w/$scale_ratio;}
	$img = "";
	$ext = strtolower($ext);
	if ($ext == "gif"){$img = imagecreatefromgif($target);}else if($ext =="png"){$img = imagecreatefrompng($target);}else{$img = imagecreatefromjpeg($target);}
	$tci = imagecreatetruecolor($w, $h);
	imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
	imagejpeg($tci, $newcopy, 80);
	
	
	$im = imagecreatefromjpeg($target);
	$stamp = imagecreatefrompng('../img/watermark.png');
	$sx = imagesx($stamp);
	$sy = imagesy($stamp);
	$marge_right = 20;
	$marge_bottom = 20;
	imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 100);
	imagepng($im, $target);
	imagedestroy($im);	
}

	$knowledgebaseTopic = addcslashes(mysqli_real_escape_string($cxn, $knowledgebaseTopic), '@%_&#*!()');
	$knowledgebaseBody = addcslashes(mysqli_real_escape_string($cxn, $knowledgebaseBody), '@%_&#*!()');
	
	$xxx_1 = clean_input_link($title).date("ims")."1-breeders";
	
	$kaboom = explode(".", $_FILES["knowledgebasePicture"]["name"]);
	$ext = end($kaboom);
	$picture = $xxx_1.".".$ext;
	$fileTmpLoc = $_FILES["knowledgebasePicture"]["tmp_name"];
	thumb_that_shii($picture, $fileTmpLoc);
	
	mysqli_query($cxn, "INSERT INTO knowledgebaser(knowledgebaseID, knowledgebaseTopic, knowledgebaseBody, knowledgebaseSource, knowledgebaseSourceLink, knowledgebasePicture, dateUpdated) VALUES ( NULL, '$knowledgebaseTopic', '$knowledgebaseBody', '$knowledgebaseSource', '$knowledgebaseSourceLink', '$picture','$dateUpdated')") or die("blom");
	
	header("Location: knowledgebase.php?status=View");
}


if((is_int($update) || is_numeric($update)) && $update){ 
$knowledgebaseTopic = addcslashes(mysqli_real_escape_string($cxn, $knowledgebaseTopic), '@%_&#*!()');
$knowledgebaseBody = addcslashes(mysqli_real_escape_string($cxn, $knowledgebaseBody), '@%_&#*!()');

$sql_update = mysqli_query($cxn, "UPDATE knowledgebaser SET knowledgebaseID = '$update', knowledgebaseTopic = '$knowledgebaseTopic',  knowledgebaseBody = '$knowledgebaseBody', knowledgebaseSource = '$knowledgebaseSource', knowledgebaseSourceLink = '$knowledgebaseSourceLink', dateUpdated = '$dateUpdated' WHERE knowledgebaseID = '$update' ") or die("xxxx");
header("Location: knowledgebase.php?edit=$update");
}


if((is_int($deleter) || is_numeric($deleter)) && $deleter){ 
$sql_update = mysqli_query($cxn, "DELETE FROM knowledgebaser WHERE knowledgebaseID = '$deleter' LIMIT 1 ") or die("xxx");
header("Location: knowledgebase.php");
}

?>
<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta charset="utf-8">
<title>KnowledgeBase</title>
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
<link rel="stylesheet" type="text/css" href="../style/widgEditor.css" />
<script src="../script/widgEditor.js"></script>
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
        Knowledge Base
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
                Knowledge Base
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
if((is_int($delete) || is_numeric($delete)) && $delete){
?>	
	<div style="margin:10px; background:rgb(0,0,0,.3)">
	<div align="center" style="padding:40px">
    	Are you sre you want to delete this article?
	</div>
	<div align="center" style="padding:10px">
        <a href="knowledgebase.php?deleter=<?php echo $delete ?>"><div id="post_buttons" style="width:45%; background:#F33">Delete</div></a>
        <div id="post_buttons" style="width:45%; background:#393" onClick="history.back()">No</div>
	</div>
	
	</div>
<?php
	
	

}else if((is_int($edit) || is_numeric($edit)) && $edit){
	
	
$sql_poster = mysqli_query($cxn, "SELECT * FROM knowledgebaser WHERE knowledgebaseID = '$edit'");
while($row_poster=mysqli_fetch_assoc($sql_poster)){extract($row_poster);
	
?>

<div style="margin:10px; background:rgb(0,0,0,.3)" align="right">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
<span style="font-size:.8em; font-weight:700">ID</span>
<input type="number" disabled name="knowledgebaseID" value="<?php echo $knowledgebaseID ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">TOPIC</span>
<input type="text" name="knowledgebaseTopic" value="<?php echo $knowledgebaseTopic ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>

<?php if(!$isMobile){echo '<span';}else{echo '<div';}?> style="font-size:.8em; font-weight:700; text-align:center">BODY</<?php if(!$isMobile){echo 'span';}else{echo 'div';}?>>
<div style="background:rgba(0,0,0,.2); border:none; padding:10px 10px 10px 5px; margin:10px;<?php if(!$isMobile){?> width:65%; display:inline-block<?php }?>">
<textarea name='knowledgebaseBody' class='widgEditor nothing'  required style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><?php echo $knowledgebaseBody ;?></textarea>
</div><br>

<span style="font-size:.8em; font-weight:700">SOURCE</span>
<input type="text" name="knowledgebaseSource" value="<?php echo $knowledgebaseSource ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">SOURCE LINK</span>
<input type="text" name="knowledgebaseSourceLink" value="<?php echo $knowledgebaseSourceLink ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">DATE UPDATED</span>
<input type="text" name="dateUpdated" value="<?php echo $dateUpdated ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%">
</div><br>
<center>
<input type="hidden" name="update" value="<?php echo $knowledgebaseID ?>"/>
<input type="submit" value="UPDATE" style="width:200px; height:50px; background:#0C9BBB; font-size:1em; border:none">
</center>
</form>
<br><br>
<?php }?>


<?php }else{ ?>


<?php if(!$status){$status = "Compose";} ?>
<table style="height:50px; background:rgba(0,0,0,.3); text-align:center"><tr>
<td style="width:33.33%; <?php if($status == "Compose" ){echo "background:#0C9BBB";}?>"><a href="knowledgebase.php?status=Compose">Compose</a></td>
<td style="width:33.33%; <?php if($status == "View" ){echo "background:#0C9BBB";}?>"><a href="knowledgebase.php?status=View">View</a></td>
</tr></table>



<?php if($status == "Compose"){ ?>


<div style="margin:10px; background:rgb(0,0,0,.3)" align="right">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" enctype="multipart/form-data">
<span style="font-size:.8em; font-weight:700">TOPIC</span>
<input type="text" name="knowledgebaseTopic" value="<?php echo $knowledgebaseTopic ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>

<?php if(!$isMobile){echo '<span';}else{echo '<div';}?> style="font-size:.8em; font-weight:700; text-align:center">BODY</<?php if(!$isMobile){echo 'span';}else{echo 'div';}?>>
<div style="background:rgba(0,0,0,.2); border:none; padding:10px 10px 10px 5px; margin:10px;<?php if(!$isMobile){?> width:65%; display:inline-block<?php }?>">
<textarea name='knowledgebaseBody' class='widgEditor nothing'  required style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><?php echo $knowledgebaseBody ;?></textarea>
</div><br>

<span style="font-size:.8em; font-weight:700">PICTURE</span>
<input type="file" name="knowledgebasePicture" style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%" accept="image/*"><br>
<span style="font-size:.8em; font-weight:700">SOURCE</span>
<input type="text" name="knowledgebaseSource" value="<?php echo $knowledgebaseSource ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">SOURCE LINK</span>
<input type="text" name="knowledgebaseSourceLink" value="<?php echo $knowledgebaseSourceLink ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<center>
<input type="submit" name="act" value="Post" style="width:200px; height:50px; background:#0C9BBB; font-size:1em; border:none">
</center>
</form>
<br><br>



<?php }else{
if ( is_int($p) || is_numeric($p) ){$current_page = $p;}else{$current_page = 1;}

$sql_poster = mysqli_query($cxn, "SELECT * FROM knowledgebaser");
$count_post = mysqli_num_rows($sql_poster);
$count_page = ceil($count_post/20) * 1;

?>
<div style="background:rgba(0,0,0,.2); margin:10px; padding:10px; text-align:left">
<h1><?php echo $count_post ?></h1>
Articles
</div>
<?php

$counter = 1;
$pageno = ($current_page - 1) * 20;
$sql_poster = mysqli_query($cxn, "SELECT * FROM knowledgebaser ORDER BY knowledgebaseID ASC LIMIT $pageno, 20");

while($row_poster=mysqli_fetch_assoc($sql_poster)){
	extract($row_poster);
?>

<div <?php if(!$isMobile){echo "style='width:48%; display:inline-block'";}?>>
<table style="height:120px; border-bottom:solid thin rgba(0,0,0,.1)"><!--feed-->
  <tr valign="top">
    <td style="width:110px">
    	<div style="background:url(../knowledgebaseimg-thumbs/<?php echo "t-".$knowledgebasePicture?>) center rgba(0,0,0,.3) no-repeat; background-size:cover; height:100px; width:100px; margin:10px; border-radius:10px" align="right">       	
        </div>
	</td>
    <td style="padding:10px 0">
    	<h3><?php echo $knowledgebaseTopic; ?></h3>
        <h5><?php echo $knowledgebaseSource; ?></h5>
        <h5><?php //echo date("D M jS, Y", strtotime($dateUpdated));?></h5>
        <?php 
		$sql_average = mysqli_query($cxn, "SELECT AVG(ratingAmount) as averaged FROM rater WHERE ratingPost = 'k-$knowledgebaseID' ");
		$row_average = mysqli_fetch_assoc($sql_average);
		$average = round($row_average['averaged']);
		
		$sql_all = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM rater WHERE ratingPost = 'k-$knowledgebaseID' ")) * 1;
		 if ($average > 0) { ?>
        <div style="background:url(../img/rating<?php if($average <1 )echo "-not"; ?>.png) center no-repeat; background-size:cover; width:10px; height:10px; display:inline-block"></div>
        <div style="background:url(../img/rating<?php if($average <2 )echo "-not"; ?>.png) center no-repeat; background-size:cover; width:10px; height:10px; display:inline-block"></div>
        <div style="background:url(../img/rating<?php if($average <3 )echo "-not"; ?>.png) center no-repeat; background-size:cover; width:10px; height:10px; display:inline-block"></div>
        <div style="background:url(../img/rating<?php if($average <4 )echo "-not"; ?>.png) center no-repeat; background-size:cover; width:10px; height:10px; display:inline-block"></div>
        <div style="background:url(../img/rating<?php if($average <5 )echo "-not"; ?>.png) center no-repeat; background-size:cover; width:10px; height:10px; display:inline-block"></div>
        <span style="font-size:.7em">(<?php echo $sql_all; ?>)</span>
        <?php }?>
    </td>
  </tr><tr><td colspan="2">
	<div align="center" style="margin-top:10px">
        <a href="knowledgebase.php?edit=<?php echo $knowledgebaseID ?>"><div style="width:45%" id="post_buttons">Edit</div></a>
        <a href="knowledgebase.php?delete=<?php echo $knowledgebaseID ?>"><div id="post_buttons" style="width:45%; background:#F33">Delete</div></a>
	</div>
  </td></tr>
</table>
</div>
<?php if($counter == 7 || $counter == 15 ){?>

<center>
<a href="">
<?php if(!$isMobile){echo "<div style='background:rgba(0,0,0,.3); width:48%; height:120px; display:inline-block'> </div>";}else{ echo "<center><div style='background:rgba(0,0,0,.3); height:240px; width:240px;'> </div></center>"; }?> 

</div></a>
</center>

<?php }

}
?>

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