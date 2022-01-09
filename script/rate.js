function rate(x){
		if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				_("rater").innerHTML = this.responseText;
				_("rated").innerHTML = "rated! You can always change your rating";
			}
		};
		xmlhttp.open("GET","services/rate.php?x1="+_("jsPostID").innerHTML+"&x2=" + x);
		xmlhttp.send();
}