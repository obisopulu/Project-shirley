<?php 
include("xsis.php");

$sql_all = mysqli_query($cxn, "SELECT * FROM rater WHERE ratingPost = '$x1' ") or die();

if(mysqli_num_rows($sql_all) < 1){
	$sql_all = mysqli_query($cxn, "INSERT INTO rater(ratingID, ratingUser, ratingIP, ratingPost, ratingAmount, dateUpdated) VALUES ( NULL, '$sessionName', '$userIP', '$x1', '$x2', '$dateUpdated')");
}else{
	if($sessionName){
	mysqli_query($cxn, "UPDATE rater SET ratingAmount = '$x2' WHERE ratingPost = '$x1' AND (ratingUser = '$sessionName' OR ratingIP = '$userIP' )") or die('xxx');
	}else{
	mysqli_query($cxn, "UPDATE rater SET ratingAmount = '$x2' WHERE ratingPost = '$x1' AND ratingIP = '$userIP' ") or die('xxx');
	}
}

$sql_average = mysqli_query($cxn, "SELECT AVG(ratingAmount) as averaged FROM rater WHERE ratingPost = '$x1' ");
$row_average = mysqli_fetch_assoc($sql_average);
$average = round($row_average['averaged']);

$sql_all = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM rater WHERE ratingPost = '$x1' ")) * 1;
?>

        <div onClick="rate('1')" style="background:url(img/rating<?php if($average <1 )echo "-not"; ?>.png) center no-repeat; background-size:cover; width:20px; height:20px; display:inline-block"></div>
        <div onClick="rate('2')" style="background:url(img/rating<?php if($average <2 )echo "-not"; ?>.png) center no-repeat; background-size:cover; width:20px; height:20px; display:inline-block"></div>
        <div onClick="rate('3')" style="background:url(img/rating<?php if($average <3 )echo "-not"; ?>.png) center no-repeat; background-size:cover; width:20px; height:20px; display:inline-block"></div>
        <div onClick="rate('4')" style="background:url(img/rating<?php if($average <4 )echo "-not"; ?>.png) center no-repeat; background-size:cover; width:20px; height:20px; display:inline-block"></div>
        <div onClick="rate('5')" style="background:url(img/rating<?php if($average <5 )echo "-not"; ?>.png) center no-repeat; background-size:cover; width:20px; height:20px; display:inline-block"></div>
        <span style="font-size:.7em">(<?php echo $sql_all; ?>)</span>