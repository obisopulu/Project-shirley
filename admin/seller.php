<?php include("../services/xsis.php");

if ($sessionAdminer != "on"){
		header("Location: index.php");
}

if((is_int($update) || is_numeric($update)) && $update){ 
$sql_update = mysqli_query($cxn, "UPDATE seller SET sellerID = '$update', sellerName = '$sellerName', sellerEmail = '$sellerEmail', sellerPhone = '$sellerPhone', sellerPassword = '$sellerPassword', sellerCode = '$sellerCode', sellerMailingList = '$sellerMailingList', dateUpdated = '$dateUpdated' WHERE sellerID = '$update' ") or die("xxx");
header("Location: seller.php?edit=$update");
}

if((is_int($deleter) || is_numeric($deleter)) && $deleter){ 
$sql_update = mysqli_query($cxn, "DELETE FROM seller WHERE sellerID = '$deleter' LIMIT 1 ") or die("xxx");
header("Location: seller.php");
}

?>
<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta charset="utf-8">
<title>Seller</title>
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
        Seller
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
                Seller
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
    	Are you sre you want to delete this post?
	</div>
	<div align="center" style="padding:10px">
        <a href="seller.php?deleter=<?php echo $delete ?>"><div id="post_buttons" style="width:45%; background:#F33">Delete</div></a>
        <div id="post_buttons" style="width:45%; background:#393" onClick="history.back()">No</div>
	</div>
	
	</div>
<?php
	
	

}else if((is_int($edit) || is_numeric($edit)) && $edit){
	
	
$sql_poster = mysqli_query($cxn, "SELECT * FROM seller WHERE sellerID = '$edit'");
while($row_poster=mysqli_fetch_assoc($sql_poster)){extract($row_poster);}
	
?>

<div style="margin:10px; background:rgb(0,0,0,.3)" align="right">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
<span style="font-size:.8em; font-weight:700">ID</span>
<input type="number" disabled name="sellerID" value="<?php echo $sellerID ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">NAME</span>
<input type="text" name="sellerName" value="<?php echo $sellerName ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">EMAIL</span>
<input type="email" name="sellerEmail" value="<?php echo $sellerEmail ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">PHONE</span>
<input type="text" name="sellerPhone" value="<?php echo $sellerPhone ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">PASSWORD</span>
<input type="text" name="sellerPassword" value="<?php echo $sellerPassword ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">CODE</span>
<input type="number" name="sellerCode" value="<?php echo $sellerCode ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">MAILING LIST</span>
<input type="number" name="sellerMailingList" value="<?php echo $sellerMailingList ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">DATE UPDATED</span>
<input type="text" name="dateUpdated" value="<?php echo $dateUpdated ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%">
</div>
<center>
<input type="hidden" name="update" value="<?php echo $sellerID ?>"/>
<input type="submit" value="UPDATE" style="width:200px; height:50px; background:#0C9BBB; font-size:1em; border:none">
</center>
</form>
<br><br><br><br>


<?php }else{?>



<?php
if ( is_int($p) || is_numeric($p) ){$current_page = $p;}else{$current_page = 1;}

$sql_poster = mysqli_query($cxn, "SELECT * FROM seller");
$count_post = mysqli_num_rows($sql_poster);
$count_page = ceil($count_post/20);

?>
<div style="background:rgba(0,0,0,.2); margin:10px; padding:10px; text-align:left">
<h1><?php echo $count_post ?></h1>
Sellers
</div>
<?php

$counter = 1;
$pageno = ($current_page - 1) * 20;
$sql_poster = mysqli_query($cxn, "SELECT * FROM seller ORDER BY sellerID DESC LIMIT $pageno, 20");

while($row_poster=mysqli_fetch_assoc($sql_poster)){
	extract($row_poster);
?>


<div <?php if(!$isMobile){echo "style='width:48%; display:inline-block'";}?>>
<table style="height:120px; border-top:solid thin rgba(0,0,0,.3); margin-bottom:20px"><!--feed-->
  <tr valign="top">
    <td style="padding:10px">
    <h4 style="margin:5px"><?php echo $sellerName ?></h4>
    <h4 style="margin:5px"><?php echo $sellerEmail ?></h4>
    	<span id="negotiable<?php if ($postCategory == "Pet"){echo"_pets"; }elseif ($postCategory == "Livestock"){echo"_livestock"; }elseif ($postCategory == "Feed" || $postCategory == "Accessory"){ echo"_feedandstuff";}else{}?>"><?php echo "$dateUpdated";?></span>
    </td>
  </tr><tr><td>
	<div align="center" style="margin-top:10px">
        <a href="seller.php?edit=<?php echo $sellerID ?>"><div style="width:45%" id="post_buttons">Edit</div></a>
        <a href="seller.php?delete=<?php echo $sellerID ?>"><div id="post_buttons" style="width:45%; background:#F33">Delete</div></a>
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