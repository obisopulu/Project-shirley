//JavaScriptDocument
window.onscroll=function(){
	if(window.scrollY < 400 ){
		_("nav2div").style.top = "-200px";
	}else{
		_("nav2div").style.top = "0";
	}
}
if (window.innerHeight > 600){
	_("nav2").style.height = "70px";
}else{
	_("nav2").style.height = "50px";
}
window.onresize = function(){
	if (window.innerHeight > 600){
		_("nav2").style.height = "70px";
	}else{
		_("nav2").style.height = "50px";
	}
}

_("floater_search").onclick = function(){
	if(_("searcher").style.display != "block"){
		_("searcher").style.display = "block";
		_("search").focus();
	}else{
		_("searcher").style.display = "none";
	}
}