<?php 
include("xsis.php");
$sql = mysqli_query($cxn, "UPDATE poster SET postRequestContactDetails = postRequestContactDetails + 1 WHERE postID = $x1 ") or die('sds');
?>