<?php include("../services/xsis.php");

if ($sessionAdminer != "on"){
		header("Location: index.php");
}

?>
<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta charset="utf-8">
<title>Analytics</title>
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
<table style="text-align:center; font-weight:bolder; transition:1s ease-in-out">
  <tr valign="middle">
    <td style="height:100px; " colspan="6">
        <a href="../index.php"> <h1 style="font-size:4em;">breeders</h1></a>
        Analytics
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
                Analytics
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

$time_0_1 = date("H");

$sqlUserCount1 = mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousTime <= 200");
$sqlUserCount2 = mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousTime > 200 AND anonymousTime <= 400 ");
$sqlUserCount3 = mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousTime > 400 AND anonymousTime <= 600 ");
$sqlUserCount4 = mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousTime > 600 AND anonymousTime <= 800 ");
$sqlUserCount5 = mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousTime > 800 AND anonymousTime <= 1000 ");
$sqlUserCount6 = mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousTime > 1000 AND anonymousTime <= 1200 ");
$sqlUserCount7 = mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousTime > 1200 AND anonymousTime <= 1400 ");
$sqlUserCount8 = mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousTime > 1400 AND anonymousTime <= 1600 ");
$sqlUserCount9 = mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousTime > 1600 AND anonymousTime <= 1800 ");
$sqlUserCount10 = mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousTime > 1800 AND anonymousTime <= 2000 ");
$sqlUserCount11 = mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousTime > 2000 AND anonymousTime <= 2200 ");
$sqlUserCount12 = mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousTime > 2200");

$max = ceil(max($sqlUserCount1, $sqlUserCount2, $sqlUserCount3, $sqlUserCount4, $sqlUserCount5, $sqlUserCount6, $sqlUserCount7, $sqlUserCount8, $sqlUserCount9, $sqlUserCount10, $sqlUserCount11, $sqlUserCount12) / 10 ) * 10;

?>

<div style="background:rgba(0,0,0,.3); padding:50px 10px 10px 10px; font-size:.7em; text-align:right;">
<table style="text-align:center"><tbody><tr valign="bottom"><td style="height:20px; width:50px;">
<?php echo $max; ?>
<div style="width:7px; background:#FFF; border-radius:1px; height:3px; display:inline-block"></div>
</td><td style="height:20px;">

</td></tr>

<tr valign="bottom"><td style="height:50px; width:20px;">
<?php echo $max/2; ?>
<div style="width:5px; background:#FFF; border-radius:1px; height:3px; display:inline-block"></div>
</td><td style="height:150px; width:250px;" rowspan="2" align="center">
<div style="width:2%; background:#FFF; border-radius:1px; height:<?php 

echo (mysqli_num_rows($sqlUserCount1)/$max) * 100;

?>px; margin:0 2.5%; display:inline-block"></div>
<div style="width:2%; background:#FFF; border-radius:1px; height:<?php 

echo (mysqli_num_rows($sqlUserCount2)/$max) * 100;

?>px; margin:0 2.5%; display:inline-block"></div>
<div style="width:2%; background:#FFF; border-radius:1px; height:<?php 

echo (mysqli_num_rows($sqlUserCount3)/$max) * 100;

?>px; margin:0 2.5%; display:inline-block"></div>
<div style="width:2%; background:#FFF; border-radius:1px; height:<?php 

echo (mysqli_num_rows($sqlUserCount4)/$max) * 100;

?>px; margin:0 2.5%; display:inline-block"></div>
<div style="width:2%; background:#FFF; border-radius:1px; height:<?php 

echo (mysqli_num_rows($sqlUserCount5)/$max) * 100;

?>px; margin:0 2.5%; display:inline-block"></div>
<div style="width:2%; background:#FFF; border-radius:1px; height:<?php 

echo (mysqli_num_rows($sqlUserCount6)/$max) * 100;

?>px; margin:0 2.5%; display:inline-block"></div>
<div style="width:2%; background:#FFF; border-radius:1px; height:<?php 

echo (mysqli_num_rows($sqlUserCount7)/$max) * 100;

?>px; margin:0 2.5%; display:inline-block"></div>
<div style="width:2%; background:#FFF; border-radius:1px; height:<?php 

echo (mysqli_num_rows($sqlUserCount8)/$max) * 100;

?>px; margin:0 2.5%; display:inline-block"></div>
<div style="width:2%; background:#FFF; border-radius:1px; height:<?php 

echo (mysqli_num_rows($sqlUserCount9)/$max) * 100;

?>px; margin:0 2.5%; display:inline-block"></div>
<div style="width:2%; background:#FFF; border-radius:1px; height:<?php 

echo (mysqli_num_rows($sqlUserCount10)/$max) * 100;

?>px; margin:0 2.5%; display:inline-block"></div>
<div style="width:2%; background:#FFF; border-radius:1px; height:<?php 

echo (mysqli_num_rows($sqlUserCount11)/$max) * 100;

?>px; margin:0 2.5%; display:inline-block"></div>
<div style="width:2%; background:#FFF; border-radius:1px; height:<?php 

echo (mysqli_num_rows($sqlUserCount12)/$max) * 100;

?>px; margin:0 2.5%; display:inline-block"></div>
</td></tr>

<tr valign="bottom"><td style="height:50px; width:20px">
<div style="width:3px; background:#FFF; border-radius:1px; height:3px; display:inline-block"></div>
</td></tr>

<tr valign="top"><td style="height:20px; width:20px">
</td><td style="height:20px;" align="center">
<div style="width:2%; background:#F22; border-radius:1px; height:3px; margin:0 2.5%; margin-bottom:5px; display:inline-block"></div>
<div style="width:2%; background:#F22; border-radius:1px; height:3px; margin:0 2.5%; margin-bottom:5px; display:inline-block"></div>
<div style="width:2%; background:#F22; border-radius:1px; height:3px; margin:0 2.5%; margin-bottom:5px; display:inline-block"></div>
<div style="width:2%; background:#F22; border-radius:1px; height:3px; margin:0 2.5%; margin-bottom:5px; display:inline-block"></div>
<div style="width:2%; background:#F22; border-radius:1px; height:3px; margin:0 2.5%; margin-bottom:5px; display:inline-block"></div>
<div style="width:2%; background:#F22; border-radius:1px; height:3px; margin:0 2.5%; margin-bottom:5px; display:inline-block"></div>
<div style="width:2%; background:#F22; border-radius:1px; height:3px; margin:0 2.5%; margin-bottom:5px; display:inline-block"></div>
<div style="width:2%; background:#F22; border-radius:1px; height:3px; margin:0 2.5%; margin-bottom:5px; display:inline-block"></div>
<div style="width:2%; background:#F22; border-radius:1px; height:3px; margin:0 2.5%; margin-bottom:5px; display:inline-block"></div>
<div style="width:2%; background:#F22; border-radius:1px; height:3px; margin:0 2.5%; margin-bottom:5px; display:inline-block"></div>
<div style="width:2%; background:#F22; border-radius:1px; height:3px; margin:0 2.5%; margin-bottom:5px; display:inline-block"></div>
<div style="width:2%; background:#F22; border-radius:1px; height:3px; margin:0 2.5%; margin-bottom:5px; display:inline-block"></div>
</td></tr></tbody></table>
</div>

<?php
$sql_users = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser "))*1;
$sql_pages = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM anonymouser "))*1;
$sql_device = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousDevice FROM anonymouser "))*1;
$sql_mobile = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM anonymouser WHERE anonymousPlatform = 'mobile' "))*1;
$sql_desktop = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM anonymouser WHERE anonymousPlatform = 'desktop' "))*1;
$sql_morning = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousTime < '1200' "))*1;
$sql_afternoon = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousTime > '1200' AND anonymousTime < '1900' "))*1;
$sql_night = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousTime > '1900' "))*1;
$sql_seller = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM seller "))*1;
$sql_posts_active = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM poster WHERE postStatus = 'Live' "))*1;
$sql_posts_review = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM poster WHERE postStatus = 'Under Review' "))*1;
$sql_posts_inactive_sold = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM poster WHERE postStatus = 'Live' "))*1;
$sql_device_android = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousDevice = 'Android' "))*1;
$sql_device_ios = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousDevice = 'iOS' "))*1;
$sql_device_windows = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousDevice = 'Windows' "))*1;
$sql_device_meego = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousDevice = 'MeeGo' "))*1;
$sql_device_linux = mysqli_num_rows(mysqli_query($cxn, "SELECT DISTINCT anonymousIP FROM anonymouser WHERE anonymousDevice = 'Linux' "))*1;

?>

<table style=" text-align:center;"><tr><td style="width:25%">
<div style="background:rgba(0,0,0,.2); margin:10px; padding:10px">
<h1><?php echo $sql_seller ?></h1>
Sellers
</div></td><td style="width:25%">
<div style="background:rgba(0,0,0,.2); margin:10px; padding:10px">
<h1><?php echo $sql_posts_review ?></h1>
Review<br>
</div></td><td style="width:25%">
<div style="background:rgba(0,0,0,.2); margin:10px; padding:10px">
<h1><?php echo $sql_posts_active ?></h1>
Active<br>
</div></td><td style="width:25%">
<div style="background:rgba(0,0,0,.2); margin:10px; padding:10px">
<h1><?php echo $sql_posts_inactive_sold ?></h1>
Inactive/Sold<br>
</div></td></tr></table>


<table style=" text-align:center;"><tr><td style="width:33.3%">
<div style="background:rgba(0,0,0,.2); margin:10px; padding:10px">
<h1><?php echo $sql_users ?></h1>
Users
</div></td><td style="width:33.3%">
<div style="background:rgba(0,0,0,.2); margin:10px; padding:10px">
<h1><?php echo $sql_pages ?></h1>
Pages<br>
</div></td><td style="width:33.3%">
<div style="background:rgba(0,0,0,.2); margin:10px; padding:10px">
<h1><?php echo $sql_device ?></h1>
Devices<br>
</div></td></tr></table>


<table style=" text-align:center;"><tr><td style="width:20%">
<div style="background:rgba(0,0,0,.2); margin:10px; padding:10px;">
<div style="display:inline-block; width:15%">
<b><h1><?php echo $sql_device ?></h1>
Devices</b>
</div>
<div style="display:inline-block; width:15%">
<h1><?php echo $sql_device_android ?></h1>
Android
</div>
<div style="display:inline-block; width:15%">
<h1><?php echo $sql_device_windows ?></h1>
Windows<br>
</div>
<div style="display:inline-block; width:15%">
<h1><?php echo $sql_device_ios ?></h1>
iOS<br>
</div>
<div style="display:inline-block; width:15%">
<h1><?php echo $sql_device_linux ?></h1>
Linux<br>
</div>
<div style="display:inline-block; width:15%">
<h1><?php echo $sql_device_meego ?></h1>
MeeGo<br>
</div>
</div></td></tr></table>

<table style=" text-align:left;"><tr><td>
<div style="background:rgba(0,0,0,.2); margin:10px; padding:10px">
<center>Platform</center>
<div style="width:<?php echo ($sql_mobile/($sql_mobile+$sql_desktop))*100 ?>%; background:#F33; padding:5px; border-radius:5px; display:inline-block"></div> <br>Mobile - <?php echo $sql_mobile ?> (<?php echo ceil(($sql_mobile/($sql_mobile+$sql_desktop))*1000)/10 ?>%)
<br>
<div style="width:<?php echo ($sql_desktop/($sql_desktop+$sql_mobile))*100 ?>%; background:#F33; padding:5px; border-radius:5px; display:inline-block"></div> <br>Desktop - <?php echo $sql_desktop ?> (<?php echo ceil(($sql_desktop/($sql_desktop+$sql_mobile))*1000)/10 ?>%)
</div></td></tr></table>

<table style=" text-align:center;"><tr><td style="width:33.3%">
<div style="background:rgba(0,0,0,.2); margin:10px; padding:10px">
<div>Time</div>
<div style="width:29%; display:inline-block;">
<h1><?php echo $sql_morning ?></h1>
Morning
</div>
<div style="width:29%; display:inline-block;">
<h1><?php echo $sql_afternoon ?></h1>
Afternoon 
</div>
<div style="width:29%; display:inline-block;">
<h1><?php echo $sql_night ?></h1>
Night
</div></div></td></tr></table>

<?php if(!$isMobile){?>

</div>
</td></tr></tbody></table>

<?php } ?>





<?php if(!$isMobile){?><script src="../script/res_d_admin.js"></script><?php }?>
</body>
</html>