<?php include("xsis.php");

unlink('../sitemap.xml');
$result1=mysqli_query($cxn, "SELECT postID,dateUpdated FROM poster ORDER BY postID DESC ");
$result2=mysqli_query($cxn, "SELECT knowledgebaseID,dateUpdated FROM knowledgebaser ORDER BY knowledgebaseID DESC ");

$xml = new DOMDocument("1.0","UTF-8");
$xml->formatOutput=true;

	$urlset = $xml->createElementNS("http://www.sitemaps.org/schemas/sitemap/0.9", "urlset"); 
	$xml -> appendChild($urlset);

while($row1=mysqli_fetch_array($result1)){
	extract($row1);
		$url = $xml -> createElement("url");
		$urlset -> appendChild($url);
		
			$loc = $xml -> createElement("loc", "https://www.breeders.ng/post-".$postID);
			$url -> appendChild($loc);
			
			$lastmod = $xml -> createElement("lastmod", $dateUpdated);
			$url -> appendChild($lastmod);

			$changefreq = $xml -> createElement("changefreq","weekly");
			$url -> appendChild($changefreq);
			
			$priority = $xml -> createElement("priority","1");
			$url -> appendChild($priority);
}
while($row2=mysqli_fetch_array($result2)){
	extract($row2);
		$url = $xml -> createElement("url");
		$urlset -> appendChild($url);
																																															
			$loc = $xml -> createElement("loc", "https://www.breeders.ng/article-".$knowledgebaseID);
			$url -> appendChild($loc);
			
			$lastmod = $xml -> createElement("lastmod", $dateUpdated);
			$url -> appendChild($lastmod);

			$changefreq = $xml -> createElement("changefreq","weekly");
			$url -> appendChild($changefreq);
			
			$priority = $xml -> createElement("priority","1");
			$url -> appendChild($priority);
}
echo "<xmp>".$xml -> saveXML()."</xmp>";
$xml -> save("../sitemap.xml");



?>