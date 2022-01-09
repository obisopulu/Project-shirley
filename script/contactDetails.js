_("sellerContact").onclick = function(){

	if(_("sellerContactDetails").style.display != "block"){
		_("sellerContactDetails").style.display = "block";
		
		if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {}
		};
		xmlhttp.open("GET","services/contactDetails.php?x1="+_("jsPostID").innerHTML);
		xmlhttp.send();
		
	}else{
		_("sellerContactDetails").style.display = "none";
	}
}