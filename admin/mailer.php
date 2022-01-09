<?php include("../services/xsis.php");

if ($sessionAdminer != "on"){
		header("Location: index.php");
}

if((is_int($deleter) || is_numeric($deleter)) && $deleter){ 
$sql_update = mysqli_query($cxn, "DELETE FROM knowledgebaser WHERE knowledgebaseID = '$deleter' LIMIT 1 ") or die("xxx");
header("Location: knowledgebase.php");
}


if($act == "Mail"){
	
	if($email){
		
		$to = $email;
		$subject = $subject;

		$headers = "Organisation: Breeders Nigeria\r\n";	
		$headers .= "From: support@breeders.ng\r\n";
		$headers .= "Reply-To: support@breeders.ng\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$headers .= "X-Priority: 3\r\n";
		$headers .= "X-Mailer: PHP ".phpversion()."\r\n";
	
		$message = "
		<html>
		<body style='padding:0;margin:0;font-size:.8em;background:#23356C;font-family:Tahoma, Geneva, sans-serif;color:#FFF;border-collapse:collapse;font-weight:100;text-align:center'>
		
		<div style='background:rgba(0,0,0,.4); padding:50px 10px'><a href='index.php' style='text-decoration:none;'>
		<h1 style='margin:0; color:#FFF; font-weight:100'>
			breeders.ng
		</h1>
		</a>
		<h4 style='display:inline-block; padding:5px 10px; background:#0C9BBB; margin:2px 0; border-radius:2px; font-weight:100'>$topic
		</h4>
		</div>
		
		<div style='margin:10px; text-align:left'>
		$salutation,
		</div>
		
		<div style='margin:10px; padding:10px; background:rgba(0,0,0,.3);'>
			$content1<br><br>$content2<br><br>
		</div>
		
			<a href='https://www.breeders.ng/knowledgebase.php' style='text-decoration:none;'>			
		<div style='height:20px;background:#0C9BBB;padding:10px;margin:20px;display:inline-block'>$link</div>
		</a>
		
		<div style='margin:10px; text-align:left; font-size:.8em'>
		$note
		</div>
					
		<div style='font-size:.7em;background:rgba(0,0,0,.3);padding:20px'>2018 All Rights Reserved. breeders.ng</div>
		</body>
		</html>";
		
		mail($to, $subject, $message, $headers);



	}else if($mailinglist == "on"){



		$sql_poster = mysqli_query($cxn, "SELECT * FROM seller WHERE sellerMailingList = '1'");
		while($row_poster=mysqli_fetch_assoc($sql_poster)){extract($row_poster);
		
			$to = $sellerEmail;
			$subject = $subject;

			$headers = "Organisation: Breeders Nigeria\r\n";	
			$headers .= "From: support@breeders.ng\r\n";
			$headers .= "Reply-To: support@breeders.ng\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$headers .= "X-Priority: 3\r\n";
			$headers .= "X-Mailer: PHP ".phpversion()."\r\n";
		
			$message = "
			<html>
			<body style='padding:0; margin:0; font-size:.8em; background:#23356C; font-family:Tahoma, Geneva, sans-serif; color:#FFF; border-collapse:collapse; font-weight:100; text-align:center'>
			
			<div style='background:rgba(0,0,0,.4); padding:50px 10px'><a href='index.php' style='text-decoration:none;'>
			<h1 style='margin:0; color:#FFF; font-weight:100'>
				breeders.ng
			</h1>
			</a>
			<h4 style='display:inline-block; padding:5px 10px; background:#0C9BBB; margin:2px 0; border-radius:2px; font-weight:100'>$topic
			</h4>
			</div>
			
			<div style='margin:10px; text-align:left'>
			$salutation,
			</div>
			
			<div style='margin:10px; padding:10px; background:rgba(0,0,0,.3);'>
				$content1<br><br>$content2<br><br>
			</div>
			
			<a href='https://www.breeders.ng/knowledgebase.php' style='text-decoration:none;'>			
			<div style='height:20px;background:#0C9BBB;padding:10px;margin:20px;display:inline-block'>$link</div>
			</a>
			
			<div style='margin:10px; text-align:left; font-size:.8em'>
			$note
			</div>
						
			<div style='font-size:.7em;background:rgba(0,0,0,.3);padding:20px'>2018 All Rights Reserved. breeders.ng</div>
			</body>
			</html>";
			
			mail($to, $subject, $message, $headers);
			
		}
	}
}

?>
<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta charset="utf-8">
<title>Mailer</title>
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
        Mailer
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
                Mailer
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

<?php if(!$status){$status = "Compose";} ?>
<table style="height:50px; background:rgba(0,0,0,.3); text-align:center"><tr>
<td style="width:33.33%; <?php if($status == "Compose" ){echo "background:#0C9BBB";}?>"><a href="mailer.php?status=Compose">Compose</a></td>
<td style="width:33.33%; <?php if($status == "View" ){echo "background:#0C9BBB";}?>"><a href="mailer.php?status=View">View</a></td>
</tr></table>



<?php if($status == "Compose"){ ?>

<div style="margin:10px; background:rgb(0,0,0,.3)" align="right">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
<span style="font-size:.8em; font-weight:700">Email</span>
<input type="email" required name="email" value="<?php echo $email ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<div align="center">
<span style="font-size:.8em; font-weight:700">MAILING LIST</span>
<input align="bottom" type="checkbox" name="mailinglist"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:20px"><br>
</div></div>

<div style="margin:10px; background:rgb(0,0,0,.3)" align="right">
<span style="font-size:.8em; font-weight:700">SUBJECT</span>
<input type="text" required name="subject" value="<?php echo $subject ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">TOPIC</span>
<input type="text" required name="topic" value="<?php echo $topic ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">SALUTATION</span>
<input type="text" name="salutation" value="<?php echo $salutation ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">CONTENT 1</span>
<input type="text" required name="content1" value="<?php echo $content1 ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">CONTENT 2</span>
<input type="text" name="content2" value="<?php echo $content2 ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">LINK</span>
<input type="text" required name="link" value="<?php echo $link ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">LINKER</span>
<input type="text" required name="linker" value="<?php echo $linker ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%"><br>
<span style="font-size:.8em; font-weight:700">NOTE</span>
<input type="text" name="note" value="<?php echo $note ?>"  style="background:rgba(0,0,0,.2); border:none; height:20px; padding:10px 10px 10px 5px; margin:10px; width:65%">
</div><br>
<center>
<input type="submit" name="act" value="Mail" style="width:200px; height:50px; background:#0C9BBB; font-size:1em; border:none">
</center>
</form>
<br><br>



<?php }else{
if ( is_int($p) || is_numeric($p) ){$current_page = $p;}else{$current_page = 1;}

$sql_poster = mysqli_query($cxn, "SELECT * FROM feedbacker");
$count_post = mysqli_num_rows($sql_poster);
$count_page = ceil($count_post/20) * 1;

?>
<div style="background:rgba(0,0,0,.2); margin:10px; padding:10px; text-align:left">
<h1><?php echo $count_post ?></h1>
Feedbacks
</div>
<?php

$counter = 1;
$pageno = ($current_page - 1) * 20;
$sql_poster = mysqli_query($cxn, "SELECT * FROM feedbacker ORDER BY feedbackID ASC LIMIT $pageno, 20");

while($row_poster=mysqli_fetch_assoc($sql_poster)){
	extract($row_poster);
?>

<div style=' <?php if(!$isMobile){echo "width:42%; display:inline-block";}?>; padding:10px; margin:10px; background:rgba(0,0,0,.2)'>
<table style="height:120px; border-bottom:solid thin rgba(0,0,0,.1)"><!--feed-->
  <tr valign="top">
    <td style="padding:10px 0">
    	<h3><?php echo $feedbackTopic; ?></h3>
    	<h3><?php echo $feedbackName; ?></h3>
        <h5><?php echo $feedbackEmail; ?></h5>
        <h5><?php echo $feedbackMessage; ?></h5>
        <h5><?php echo date("D M jS, Y", strtotime($dateUpdated));?></h5>
    </td>
  </tr><tr><td>
	<div align="center" style="margin-top:10px">
        <a href="mailer.php?email=<?php echo $feedbackEmail ?>&status=Compose"><div style="width:45%" id="post_buttons">Reply</div></a>
        <a href="mailer.php?delete=<?php echo $feedbackID ?>"><div id="post_buttons" style="width:45%; background:#F33">Delete</div></a>
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





<?php if(!$isMobile){?>

</div>
</td></tr></tbody></table>

<?php } ?>





<?php if(!$isMobile){?><script src="../script/res_d_admin.js"></script><?php }?>
</body>
</html>